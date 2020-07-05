<?php
/*
 * @lc app=leetcode.cn id=264 lang=php
 *
 * [264] 丑数 II
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n) {

        $dp[0] = 1;
        $a = 0;
        $b = 0;
        $c = 0;

        for($i=1; $i<=$n; $i++) {
            
            $dp[$i] = min($dp[$a]*2, $dp[$b]*3, $dp[$c]*5);

            if($dp[$i] == $dp[$a]*2) $a++; 
            if($dp[$i] == $dp[$b]*3) $b++; 
            if($dp[$i] == $dp[$c]*5) $c++; 
        }

        return $dp[$n-1];
    }
}
// @lc code=end

