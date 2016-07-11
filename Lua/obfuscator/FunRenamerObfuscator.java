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
import org.luaj.vm2.ast.Name;
import org.luaj.vm2.ast.Stat.FuncDef;
import org.luaj.vm2.ast.Stat.LocalFuncDef;


/**
 * Rename the function name
 * @author Will and Hanqing
 */
public class FunRenamerObfuscator extends Obfuscator {
    
    Logger logger = LogManager.getLogger("GLOBAL");
    //dictionary of map name and obfuscated name
    private HashMap<String,String> dict;
    
    /**
     * Constructor of dictionary of renamer.
     */
    FunRenamerObfuscator(){
        dict = new HashMap<>();
    }
    /**
     * Constructor of obfuscator by considering a blacklist which are words do not obfuscate.
     * @param blacklist, a list of key word which do not obfuscating
     */
    FunRenamerObfuscator(List<String> blacklist) {
        dict = new HashMap<>();
        for (String blacklist1  : blacklist) {
            dict.put(blacklist1 , blacklist1 );
        }
    }
    /**
     * Renames function definition
     * @param fd, a node of function definition
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
     * Renames names that have already been defined
     * @param nm, a name node in luaj
     */
    @Override
    public void visit(Name nm){
        String oldname = nm.name;
        String tempname = oldname;
        if(dict.containsKey(oldname)){
            tempname = dict.get(oldname);
        }
        else{
            dict.put(oldname,oldname);
        }
        nm.name = tempname;
    }
    
    /**
     * Renames Local Function Definitions
     * @param stat, statement node
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
    
