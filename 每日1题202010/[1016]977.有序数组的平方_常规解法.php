<?php
/*
 * @lc app=leetcode.cn id=977 lang=php
 *
 * [977] 有序数组的平方
 * 
 * http://leetcode-cn.com/problems/squares-of-a-sorted-array/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A) {

        $ans = [];

        foreach ($A as $k => $v) {
            $ans[$k] = $v * $v;
        }

        sort($ans);
        return $ans;
    }
}

// Accepted
// 132/132 cases passed (72 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 9.52 % of php submissions (17.9 MB)
// @lc code=end

