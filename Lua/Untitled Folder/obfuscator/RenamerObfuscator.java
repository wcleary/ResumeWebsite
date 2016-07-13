/*
 * Copyright 2014 Joshua Stein.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package luaguard.obfuscator;
import java.util.HashMap;
import java.util.List;
import org.apache.log4j.LogManager;
import org.apache.log4j.Logger;
import org.luaj.vm2.ast.Exp;
import org.luaj.vm2.ast.Exp.NameExp;
import org.luaj.vm2.ast.Name;
import org.luaj.vm2.ast.Stat;
import org.luaj.vm2.ast.Stat.FuncDef;
import org.luaj.vm2.ast.Stat.LocalFuncDef;

/**
 * Renamer obufscator obfuscates all the variable names and function names
 * @author Will and Hanqing
 */
public class RenamerObfuscator extends Obfuscator {
    
    Logger logger = LogManager.getLogger("GLOBAL");
    private HashMap<String,String> dict;
    /**
     * Constructor of the renamer obfuscator
     */
    RenamerObfuscator(){
        dict = new HashMap<>();
    }
    
    /**
     * Constructor of obfuscator by considering a blacklist which are words do not obfuscate.
     * @param blacklist, a list of key word which do not obfuscating
     */
    RenamerObfuscator(List<String> blacklist) {
        dict = new HashMap<>();
        for (String blacklist1  : blacklist) {
            dict.put(blacklist1 , blacklist1 );
        }
    }
    
    /**
     * Renames function definition
     * @param fd, function definition node 
     */
    @Override
    public void visit(FuncDef fd){
        String oldname = fd.name.name.name;
        String tempname;
        if(dict.containsKey(oldname)){
            tempname = dict.get(oldname);
        }
        else{
            tempname = new RandomName().generateVarName(dict);
            dict.put(oldname, tempname);
        }
        fd.name.name.name = tempname;
        fd.body.accept(this);
    }

    /**
     * Renames the name node
     * @param nm, the name node
     */
    @Override
    public void visit(Name nm){
            String oldname = nm.name;
            String tempname = oldname;
            if(dict.containsKey(oldname)){
                tempname = dict.get(oldname);
            }
            nm.name = tempname;
    }
    /**
     * Renames local assignment 
     * @param la, local assign node
     */
    @Override
    public void visit(Stat.LocalAssign la){
        //NameResolver nsolver = new NameResolver();
        if(la == null) return;
        //variable
        for(int j = 0; j < la.names.size(); j++){
            String oldName = ((Name)(la.names.get(j))).name; 
            //nsolver.resolveNameReference(((Name)(la.names.get(j))));
            
            String tempname;
            //if the name is in dictionary
            if(dict.containsKey(oldName)){
                tempname = dict.get(oldName);
            }else{
                //create new entry
                tempname = new RandomName().generateVarName(dict);
                //put the new hashmap entry
                dict.put(oldName, tempname);
            }
            ((Name)(la.names.get(j))).name = tempname;
            //Variable v = ((Name)(la.names.get(j))).variable;
           // if(v == null) return;
           // v.name = tempname;
        }
        //check the right side
        if (null != la.values ) {
            // Expressions
            for (int i = 0; i < la.values.size(); i++) {
                ((Exp) la.values.get(i)).accept(this);
            }
        }
    }
    
    /**
     * Rename the variable name in local assignment
     * @param stat, statement node
     */
    @Override
    public void visit(Stat.Assign stat){
        for(int i =0; i< stat.vars.size(); i++){
            if(stat.vars.get(i).toString().contains("$NameExp")){
                NameExp name = (NameExp) stat.vars.get(i);
                String oldname = name.name.name;
                String tempname;
                if(dict.containsKey(oldname)){
                    tempname = dict.get(oldname);
                }
                else{
                    tempname = oldname;
                    dict.put(oldname,tempname);
                }
                name.name.name = tempname;
            }
        }
        visitVars(stat.vars);
	visitExps(stat.exps);
    }
    
    
    /**
     * Renames local function definitions
     *@param stat, local function definition node
     */
    @Override
    public void visit(LocalFuncDef stat){
        String oldname = stat.name.name;
        String tempname;
        if(dict.containsKey(oldname)){
            tempname = dict.get(oldname);
        }
        else{
            tempname = new RandomName().generateVarName(dict);
            dict.put(oldname, tempname);
        }
        stat.name.name = tempname;
	visit(stat.name);
	stat.body.accept(this);
    }
}
    
