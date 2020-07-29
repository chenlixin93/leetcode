<?php
/*
 * @lc app=leetcode.cn id=343 lang=php
 *
 * [343] 整数拆分
 * 
 * https://leetcode-cn.com/problems/integer-break/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n) {
        if ($n <= 3) {
            return $n - 1;
        }

        $quotient = (int)($n / 3);
        $remainder = (int) ($n % 3);
        if ($remainder == 0) {
            return (int) pow(3, $quotient);
        } elseif ($remainder == 1) {
            return (int) pow(3, $quotient - 1) * 4;
        } else {
            return (int) pow(3, $quotient) * 2; 
        }
    }
}

// 官方数学解法
// Accepted
// 50/50 cases passed (8 ms)
// Your runtime beats 56.52 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

