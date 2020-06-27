<?php
/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        
        $arr = ["{"=>"}","("=>")","["=>"]","?"=>"?"];
        $left_arr = ["{","(","["];
        $stack = ["?"];

        for ($i=0; $i < strlen($s); $i++) { 

            if(in_array($s[$i], $left_arr)){
                $stack[] = $s[$i];
            }elseif($arr[array_pop($stack)] != $s[$i]){
                return false;
            }   
        }

        return count($stack) == 1;
    }
}
// @lc code=end

