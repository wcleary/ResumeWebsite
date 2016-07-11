/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

package luaguard.obfuscator;

import java.util.HashMap;
import java.util.Random;

/**
 * The class to generate the random string name
 * @author Hanqing
 */
public class RandomName {
    /**
     * 
     * @param length
     * @return a random string with specified length
     */
    private String getRandomString(int length){
        char[] names = new char[length];
        //if lenght is 0 then random default name
    	if(length == 0){
    		names =  ("OTOSOTE" + new Random().nextInt(1000)).toCharArray();
    	}
        if(length >= 1){
        	names[0] = (char) (new Random().nextInt(26) + 'a');
        }
        for(int i = 1; i < names.length; i++){
        	int n = new Random().nextInt(3);
        	switch(n){
        	case 0:
        		names[i] = (char) (new Random().nextInt(26) + 'A');
        		break;
        	case 1:
        		names[i] = (char) (new Random().nextInt(26) + 'a');
        		break;
        	case 2:
        		names[i] = (char) (new Random().nextInt(10) + '0');
        		break;
        	default:
        		System.out.println("Random selection overflow");
        	}
        }
        return new String(names);
    }
    /**
     * Generate a unique value for the key
     * @param map, the hashmap which saves all the identifier
     * @return a unique name which does not exist in the hashmap 
     */
    public String generateVarName(HashMap<String,String> map){
        String name = getRandomString(10);
        while(map.containsKey(name)){
            name = getRandomString(10);
        }
        return name;
    }
}
