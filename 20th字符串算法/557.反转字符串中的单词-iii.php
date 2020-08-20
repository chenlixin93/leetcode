<?php
/*
 * @lc app=leetcode.cn id=557 lang=php
 *
 * [557] 反转字符串中的单词 III
 * 
 * https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        
        if(trim($s) == "") return "";

        $str_arr = explode(" ", $s);
        $str = "";

        for ($i=0; $i < count($str_arr); $i++) { 
            $str .= strrev($str_arr[$i])." ";
        }

        return substr($str, 0, -1);
    }
}

// Accepted
// 30/30 cases passed (8 ms)
// Your runtime beats 96.08 % of php submissions
// Your memory usage beats 90.91 % of php submissions (15 MB)
// @lc code=end

