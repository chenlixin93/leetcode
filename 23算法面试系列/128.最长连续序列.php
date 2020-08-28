<?php
/*
 * @lc app=leetcode.cn id=128 lang=php
 *
 * [128] 最长连续序列
 * 
 * https://leetcode-cn.com/problems/longest-consecutive-sequence/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
    
        $nums = array_unique($nums); // 去重
        $longestStreak = 0; // 初始长度

        foreach ($nums as $val) {
            // 剪掉 x - 1 的无意义查询
            if (!in_array($val - 1, $nums)) { // 值查询
                $currentNum = $val;
                $currentStreak = 1;

                while (in_array($currentNum + 1, $nums)) {
                    $currentNum += 1;
                    $currentStreak += 1;
                }

                $longestStreak = max($longestStreak, $currentStreak);
            }
        }

        return $longestStreak;
    }
}

// Accepted
// 68/68 cases passed (124 ms)
// Your runtime beats 10.87 % of php submissions
// Your memory usage beats 14.29 % of php submissions (16.6 MB)
// 比键查询慢很多
// @lc code=end



