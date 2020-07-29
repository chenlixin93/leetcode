<?php
/*
 * @lc app=leetcode.cn id=53 lang=php
 *
 * [53] 最大子序和
 * 
 * https://leetcode-cn.com/problems/coin-change/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        
        // dp问题
        // 1. 列出方程，dp[i] = max(nums[i], $nums + dp[i - 1])
        // 2. 最大子序列和 = 当前元素最大，或者 包含之前 后最大
        $dp = $nums;
        for ($i=1; $i < count($nums); $i++) { 
            $dp[$i] = max(0, $dp[$i - 1]) + $nums[$i];
        }

        rsort($dp);
        return $dp[0];
    }
}

// Accepted
// 202/202 cases passed (28 ms)
// Your runtime beats 20.06 % of php submissions
// Your memory usage beats 100 % of php submissions (16 MB)
// @lc code=end

