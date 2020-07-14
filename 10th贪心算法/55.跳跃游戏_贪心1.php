<?php
/*
 * @lc app=leetcode.cn id=55 lang=php
 *
 * [55] 跳跃游戏
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {

        if($nums == null || count($nums) == 0) return false;

        // 从最后一步开始
        $enableIndex = count($nums) - 1;

        for ($i= $enableIndex - 1; $i >= 0; $i--) { 

            if($i + $nums[$i] >= $enableIndex) {
                $enableIndex = $i;
            }
        }

        return $enableIndex == 0;
    }
}

// Accepted
// 75/75 cases passed (28 ms)
// Your runtime beats 75.43 % of php submissions
// Your memory usage beats 100 % of php submissions (18.4 MB)
// @lc code=end

