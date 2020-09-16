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
    
        $num_set = [];
        foreach ($nums as $val) { // 去重
            $num_set[$val] = 1;
        }

        $longestStreak = 0; // 初始长度

        foreach ($num_set as $key => $val) {
            // 剪掉 x - 1 的无意义查询
            if (!array_key_exists($key - 1, $num_set)) { // 键查询更快
                $currentNum = $key;
                $currentStreak = 1;

                while (array_key_exists($currentNum + 1, $num_set)) {
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
// 68/68 cases passed (24 ms)
// Your runtime beats 22.46 % of php submissions
// Your memory usage beats 57.14 % of php submissions (15.9 MB)
// @lc code=end

