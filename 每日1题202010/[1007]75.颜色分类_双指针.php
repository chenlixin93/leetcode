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
        $l = 0;
        $r = count($nums) - 1;

        while ($l <= $r) {
            if ($nums[$l] == 0 || $nums[$r] == 0) {
                if ($nums[$l] == 0 && $nums[$r] == 0 && $l != $r) $red++; 
                $red++;
            }
            if ($nums[$l] == 1 || $nums[$r] == 1) {
                if ($nums[$l] == 1 && $nums[$r] == 1 && $l != $r) $white++; 
                $white++;
            }
            if ($nums[$l] == 2 || $nums[$r] == 2) {
                if ($nums[$l] == 2 && $nums[$r] == 2 && $l != $r) $blue++; 
                $blue++;
            }

            if ($l == $r) break;
            $l++;
            $r--;
        }

        $nums = array_merge(
            array_fill(0, $red, 0), 
            array_fill(0, $white, 1), 
            array_fill(0, $blue, 2)
        );
    }
}

// Accepted
// 87/87 cases passed (4 ms)
// Your runtime beats 96.88 % of php submissions
// Your memory usage beats 13.16 % of php submissions (14.7 MB)
// @lc code=end

