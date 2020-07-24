<?php
/*
 * @lc app=leetcode.cn id=1025 lang=php
 *
 * [1025] 除数博弈
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $N
     * @return Boolean
     */
    function divisorGame($N) {
        
        if($N == 1) {
            return false;
        }

        return !$this->divisorGame($N - 1);
    }
}

// Accepted
// 40/40 cases passed (4 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.3 MB)
// @lc code=end

