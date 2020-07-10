<?php
/*
 * @lc app=leetcode.cn id=239 lang=php
 *
 * [239] 滑动窗口最大值
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {
        
        $result = [];
        for ($i = 0; $i < count($nums)-($k-1); $i++) { 
            $temp_max = max(array_slice($nums, $i, $k));
            $result[] = $temp_max;
        }

        return $result;
    }
}
// @lc code=end

