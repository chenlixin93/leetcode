<?php
/*
 * @lc app=leetcode.cn id=75 lang=php
 *
 * [75] 颜色分类
 * 
 * https://leetcode-cn.com/problems/sort-colors/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {

        // 初始次数
        $red = 0;
        $white = 0;
        $blue = 0;
        
        for ($i=0; $i < count($nums); $i++) { 
            if ($nums[$i] == 0) {
                $red++;
            }
            if ($nums[$i] == 1) {
                $white++;
            }
            if ($nums[$i] == 2) {
                $blue++;
            }
        }

        $nums = array_merge(
            array_fill(0, $red, 0), 
            array_fill(0, $white, 1), 
            array_fill(0, $blue, 2)
        );
    }
}

// Accepted
// 87/87 cases passed (12 ms)
// Your runtime beats 37.5 % of php submissions
// Your memory usage beats 26.32 % of php submissions (14.6 MB)
// @lc code=end

