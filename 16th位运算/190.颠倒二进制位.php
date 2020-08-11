<?php
/*
 * @lc app=leetcode.cn id=190 lang=php
 *
 * [190] 颠倒二进制位
 * 
 * https://leetcode-cn.com/problems/reverse-bits/
 */

// @lc code=start
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {

        $ans = 0;
        $i = 32;
        while ($i--) {
            $ans = ($ans << 1) + ($n & 1);
            $n = $n >> 1;
        }

        return $ans;
    }
}

// Accepted
// 600/600 cases passed (4 ms)
// Your runtime beats 98.21 % of php submissions
// Your memory usage beats 57.14 % of php submissions (14.7 MB)
// @lc code=end

