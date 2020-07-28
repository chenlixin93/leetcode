<?php
/*
 * @lc app=leetcode.cn id=53 lang=php
 *
 * [53] 最大子序和
 * 
 * https://leetcode-cn.com/problems/maximum-subarray/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        
        $ans = $nums[0];
        $sum = 0;

        foreach ($nums as $num) {

            // 正数有增益效果，负数的话直接舍弃
            $sum = $sum > 0 ? $sum + $num : $num;
            $ans = max($ans, $sum);
        }

        return $ans;
    }
}

// Accepted
// 202/202 cases passed (24 ms)
// Your runtime beats 43.03 % of php submissions
// Your memory usage beats 100 % of php submissions (16.2 MB)
// @lc code=end

