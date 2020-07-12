<?php
/*
 * @lc app=leetcode.cn id=50 lang=php
 *
 * [50] Pow(x, n)
 */

// @lc code=start
class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        
        if($x == 0) return 0;
        
        if($n < 0) {
            $x = 1 / $x;
            $n = - $n;
        }

        return $this->fastPow($x, $n);
    }

    function fastPow($x, $n) {

        if($n == 0) {
            return 1.0;
        }elseif($n == 1){
            return $x;
        }

        $half = $this->fastPow($x, $n/2);

        return $n%2 == 0 ? $half * $half : $half * $half * $x;
    }
}

// Accepted
// 304/304 cases passed (16 ms)
// Your runtime beats 25.65 % of php submissions
// Your memory usage beats 100 % of php submissions (15.4 MB)
// @lc code=end

