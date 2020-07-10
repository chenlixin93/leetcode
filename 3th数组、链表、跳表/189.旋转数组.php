<?php
/*
 * @lc app=leetcode.cn id=189 lang=php
 *
 * [189] 旋转数组
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {

        $k %= count($nums);
        $this->reverse($nums, 0, count($nums)-1);
        $this->reverse($nums, 0, $k-1);
        $this->reverse($nums, $k, count($nums)-1);

        return $nums;
    }

    function reverse(&$nums, $start, $end) {

        while ($start < $end) {
            $temp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $temp;
            $start++;$end--;
        }
    }
}
// @lc code=end

