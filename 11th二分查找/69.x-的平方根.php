<?php
/*
 * @lc app=leetcode.cn id=69 lang=php
 *
 * [69] x 的平方根
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {

        if($x<2) return $x;

        $left = 2;
        $right = floor($x/2);

        while($left <= $right){

            $mid = floor($left + ($right - $left) / 2);
            $num = $mid * $mid;
            if($num > $x){
                $right = $mid - 1;
            } else if($num < $x) {
                $left = $mid + 1;
            } else {
                return $mid;
            }
        }

        return $right;
    }
}

// Accepted
// 1017/1017 cases passed (8 ms)
// Your runtime beats 90.3 % of php submissions
// Your memory usage beats 100 % of php submissions (14.7 MB)
// @lc code=end

