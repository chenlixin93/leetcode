<?php
/*
 * @lc app=leetcode.cn id=152 lang=php
 *
 * [152] 乘积最大子数组
 * 
 * https://leetcode-cn.com/problems/maximum-product-subarray/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {

        $max_f = $nums[0];
        $min_f = $nums[0];
        $ans = $nums[0];

        for ($i=1; $i < count($nums); $i++) { 
            $mx = $max_f;
            $mn = $min_f;

            // 遇到相隔的负数，相乘后可以反转最小为最大
            $max_f = max($mx * $nums[$i], max($nums[$i], $mn * $nums[$i]));
            $min_f = min($mn * $nums[$i], min($nums[$i], $mx * $nums[$i]));

            $ans = max($max_f, $ans);
        }

        return $ans;
    }
}

// Accepted
// 187/187 cases passed (20 ms)
// Your runtime beats 53.64 % of php submissions
// Your memory usage beats 100 % of php submissions (15.7 MB)
// @lc code=end

