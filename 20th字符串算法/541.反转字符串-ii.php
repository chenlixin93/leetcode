<?php
/*
 * @lc app=leetcode.cn id=541 lang=php
 *
 * [541] 反转字符串 II
 * 
 * https://leetcode-cn.com/problems/reverse-string-ii/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function reverseStr($s, $k) {
        
        $n = strlen($s);
        $i = 0;
        $ss = [];

        while ($i < $n) {
            if ($n - $i < 2 * $k) {
                if ($n - $i < $k) { // 剩余字符长度不足 k，全部翻转
                    $ss[] = strrev(substr($s, $i));
                } else { // 剩余字符长度大于 k，小于 2k，仅翻转前 k 个
                    $ss[] = strrev(substr($s, $i, $k));
                    $ss[] = substr($s, $i + $k);
                }
            } else { // 普通情况，仅翻转前 k 个
                $ss[] = strrev(substr($s, $i, $k));
                $ss[] = substr($s, $i + $k, $k);
            }
            
            $i = $i + 2 * $k;
        }

        return implode("", $ss);
    }
}

// Accepted
// 60/60 cases passed (8 ms)
// Your runtime beats 86.36 % of php submissions
// Your memory usage beats 35.71 % of php submissions (15.1 MB)
// @lc code=end

