<?php
/*
 * @lc app=leetcode.cn id=70 lang=php
 *
 * [70] 爬楼梯
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        // 想要到达第 n 级台阶，可以 n - 1 时走一步，或者 n - 2 时走两步
        // 即第 n 级台阶的走法 为前两者之和
        // 数学归纳为，非波那契数列
        // f(n) = f(n - 1) +f(n - 2)
        if ($n <= 2) {
            return $n;
        }

        $f1 = 1;
        $f2 = 2;
        for ($i=3; $i <= $n; $i++) { 
            $f3 = $f1 + $f2;
            $f1 = $f2;
            $f2 = $f3;
        }

        return $f3;
    }
}

// Accepted
// 45/45 cases passed (8 ms)
// Your runtime beats 59.4 % of php submissions
// Your memory usage beats 25.81 % of php submissions (14.9 MB)
// @lc code=end

