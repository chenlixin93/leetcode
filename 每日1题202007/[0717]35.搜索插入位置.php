<?php
/*
 * @lc app=leetcode.cn id=35 lang=php
 *
 * [35] 搜索插入位置
 * 
 * https://leetcode-cn.com/problems/search-insert-position/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        
        $start = 0;
        $end = count($nums) - 1;

        if($end < 0) {
            return 0;
        }

        if($nums[$end] < $target){
            return $end + 1;
        }

        while($start < $end) {

            $mid = $start + floor(($end - $start) >> 1);

            // 严格小于 target 的元素一定不是解
            if($nums[$mid] < $target){
                $start = $mid + 1;
            }else{
                $end = $mid;
            }
        }

        return $start;
    }
}

// Accepted
// 62/62 cases passed (16 ms)
// Your runtime beats 60.71 % of php submissions
// Your memory usage beats 100 % of php submissions (15.6 MB)
// @lc code=end

