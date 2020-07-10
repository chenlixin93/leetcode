<?php
/*
 * @lc app=leetcode.cn id=70 lang=php
 *
 * [70] 爬楼梯
 */

// @lc code=start
class Solution {

    protected $res = 0;

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        
        if($n <= 2){
            return $n;
        }

        return $this->climbStairs($n-1) + $this->climbStairs($n-2);
    }
}

// Time Limit Exceeded 超时
// 21/45 cases passed (N/A)
// @lc code=end

