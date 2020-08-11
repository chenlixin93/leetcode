<?php
/*
 * @lc app=leetcode.cn id=191 lang=php
 *
 * [191] 位1的个数
 * 
 * https://leetcode-cn.com/problems/number-of-1-bits/
 */

// @lc code=start
class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {

        // 模拟转二进制
        $count = 0;
        
        while (0 < $n) {
            if($n % 2 == 1){
                $count++;
            }
            $n = $n / 2;
        }

        return $count;
    }
}

// Accepted
// 601/601 cases passed (28 ms)
// Your runtime beats 7.41 % of php submissions
// Your memory usage beats 47.62 % of php submissions (14.8 MB)
// @lc code=end

