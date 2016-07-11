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
import org.luaj.vm2.ast.Exp;
import org.luaj.vm2.ast.Exp.NameExp;
import org.luaj.vm2.ast.Name;
import org.luaj.vm2.ast.Stat.Assign;
import org.luaj.vm2.ast.Stat.LocalAssign;

/**
 * Obfuscator to modify the variables
 * @author Hanqing & Will
 */
public class VarRenamerObfuscator extends Obfuscator{
    //function name dictionary
    private HashMap<String, String> dict;
    
    /**
     * Constructor of the variable renamer obfuscator
     */
    public VarRenamerObfuscator(){
        dict = new HashMap<String, String>();
    }
    /**
     * Constructor of the variable renamer obfuscator
     * @param blacklist
     */
    public VarRenamerObfuscator(List<String> blacklist){
        dict = new HashMap<>();
        for (String blacklist1  : blacklist) {
            dict.put(blacklist1 , blacklist1 );
        }
    }
    /**
     * If meet a new name than check its name in the hashmap, if it exists,
     * then modify it.
     * @param name ast name node
     */
    @Override
    public void visit(Name name) {
        if(name == null) return;
        String oldName = name.name;
        String tempname = null;
        //if the name is in dictionary
        if(dict.containsKey(oldName)){
            tempname = dict.get(oldName);
            name.name = tempname;
        }else{
            dict.put(oldName,oldName);
        }
        /*if(name.variable != null)
            name.variable.name = tempname;*/
    }
    /**
     * Rename the variable name in local assignment
     * 
     * @param la LocalAssign, the ast node object
     */
    @Override
    public void visit(LocalAssign la){
        //NameResolver nsolver = new NameResolver();
        if(la == null) return;
        //variable
        for(int j = 0; j < la.names.size(); j++){
            String oldName = ((Name)(la.names.get(j))).name; 
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
     * Rename the assign
     * 
     * @param as Assign, the ast node object for assignment
     */
    
    @Override
    public void visit(Assign as){
        
        for(int i =0; i< as.vars.size(); i++){
            if(as.vars.get(i).toString().contains("$NameExp")){
                NameExp name = (NameExp) as.vars.get(i);
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
        visitVars(as.vars);
	visitExps(as.exps);
    }
}
