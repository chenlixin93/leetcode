<?php
/*
 * @lc app=leetcode.cn id=151 lang=php
 *
 * [151] 翻转字符串里的单词
 * 
 * https://leetcode-cn.com/problems/reverse-words-in-a-string/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {

        if(trim($s) === "") return "";

        $str_arr = explode(" ", trim($s));
        $str = "";

        for ($i=count($str_arr) - 1; $i >= 0; $i--) {
            if(trim($str_arr[$i]) == "") continue;
            $str .= trim($str_arr[$i])." ";
        }

        return substr($str, 0, -1);
    }
}

// Accepted
// 25/25 cases passed (8 ms)
// Your runtime beats 88.46 % of php submissions
// Your memory usage beats 100 % of php submissions (15.1 MB)
// @lc code=end

