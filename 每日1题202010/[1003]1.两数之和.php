<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 * 
 * https://leetcode-cn.com/problems/two-sum/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {

        $visited = [];
        foreach ($nums as $k => $num) {
            if (array_key_exists($target - $num, $visited)) {
                if ($nums[$visited[$target - $num]] + $num === $target) {
                    return [$visited[$target - $num], $k];
                }
            }

            $visited[$num] = $k;
        }
    }
}

// Accepted
// 29/29 cases passed (16 ms)
// Your runtime beats 80.91 % of php submissions
// Your memory usage beats 32.61 % of php submissions (15.6 MB)
// @lc code=end

