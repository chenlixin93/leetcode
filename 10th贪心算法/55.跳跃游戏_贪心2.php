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

        // 初始化当前能到达最远的位置
        $max_i = 0;

        // i为当前位置，jump是当前位置的跳数
        foreach($nums as $i => $jump) {

            // 如果当前位置能到达，并且当前位置+跳数>最远位置
            if($max_i >= $i && $i + $jump > $max_i) {
                $max_i = $i + $jump;
            }
        }

        return $max_i >= $i;
    }
}

// Accepted
// 75/75 cases passed (28 ms)
// Your runtime beats 75.43 % of php submissions
// Your memory usage beats 100 % of php submissions (18.1 MB)
// @lc code=end

