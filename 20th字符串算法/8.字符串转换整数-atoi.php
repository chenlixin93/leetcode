<?php
/*
 * @lc app=leetcode.cn id=8 lang=php
 *
 * [8] 字符串转换整数 (atoi)
 * 
 * https://leetcode-cn.com/problems/string-to-integer-atoi/
 */

// @lc code=start
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $str = ltrim($str);
        $stra = str_split($str);
        $i = 0;
        while ($i<count($stra)) {
            if (preg_match ("/^[a-z]/", $stra[$i])) {
                $stra = array_slice($stra,0,$i);
                break;
            }
            $i++;
        }
        if (count($stra) == 0) {
            return 0;
        }else {
            $str = implode($stra);
            if ($str>=pow(2, 31)) {
                return pow(2, 31)-1;
            }elseif($str< -pow(2, 31)){
                return -pow(2, 31);
            }
            return intval($str);
        }
    }
}

// Accepted
// 1079/1079 cases passed (8 ms)
// Your runtime beats 83.33 % of php submissions
// Your memory usage beats 33.33 % of php submissions (15 MB)
// @lc code=end

