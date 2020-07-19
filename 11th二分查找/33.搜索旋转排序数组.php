<?php
/*
 * @lc app=leetcode.cn id=33 lang=php
 *
 * [33] 搜索旋转排序数组
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        
        $start = 0;
        $end = count($nums) - 1;

        while($start <= $end) {
            $mid = $start + (($end - $start) >> 1);

            if($nums[$mid] == $target) {
                return $mid;
            }
            
            if($nums[$start] <= $nums[$mid]) {
                // 左半边有序
                if($nums[$start] <= $target && $target < $nums[$mid]){
                    // 目标值落在有序区间时，搜索有序区间，否则搜索无序区间
                    $end = $mid - 1;
                }else{
                    $start = $mid + 1;
                }
            }else{
                // 右半边有序
                if($nums[$mid] < $target && $target <= $nums[$end]){
                    $start = $mid + 1;
                }else{
                    $end = $mid - 1;
                }
            }
        }

        return -1;
    }
}

// Accepted
// 196/196 cases passed (16 ms)
// Your runtime beats 34.91 % of php submissions
// Your memory usage beats 100 % of php submissions (15 MB)
// @lc code=end

