<?php
/*
 * @lc app=leetcode.cn id=231 lang=php
 *
 * [231] 2的幂
 * 
 * https://leetcode-cn.com/problems/power-of-two/
 * 参考 https://leetcode-cn.com/problems/power-of-two/solution/power-of-two-er-jin-zhi-ji-jian-by-jyd/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {

        return $n > 0 && ($n & $n - 1) == 0;
    }
}

// Accepted
// 1108/1108 cases passed (24 ms)
// Your runtime beats 7.78 % of php submissions
// Your memory usage beats 88.24 % of php submissions (14.7 MB)
// @lc code=end

