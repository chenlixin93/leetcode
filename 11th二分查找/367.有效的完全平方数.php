<?php
/*
 * @lc app=leetcode.cn id=367 lang=php
 *
 * [367] 有效的完全平方数
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num) {

        $i = 1;
        while($num > 0) {
            $num -= $i;
            $i += 2;
        }

        return $num == 0;
    }
}

// 效率低，但是很秀，
// 1 4=1+3 9=1+3+5 16=1+3+5+7以此类推
// Accepted
// 70/70 cases passed (12 ms)
// Your runtime beats 13.21 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

