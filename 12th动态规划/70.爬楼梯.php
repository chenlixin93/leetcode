<?php
/*
 * @lc app=leetcode.cn id=70 lang=php
 *
 * [70] 爬楼梯
 * 
 * https://leetcode-cn.com/problems/climbing-stairs/description/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {

        if($n <= 2){
            return $n;
        }

        $f1 = 1;
        $f2 = 2;
        for ($i=3; $i <= $n; $i++) { 
            $f3 = $f2 + $f1;
            $f1 = $f2;
            $f2 = $f3;
        }

        return $f3;
    }
}

// Accepted
// 45/45 cases passed (8 ms)
// Your runtime beats 59.76 % of php submissions
// Your memory usage beats 100 % of php submissions (14.5 MB)
// @lc code=end

