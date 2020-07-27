<?php
/*
 * @lc app=leetcode.cn id=120 lang=php
 *
 * [120] 三角形最小路径和
 * 
 * https://leetcode-cn.com/problems/triangle/description/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {

        // 三角形的层高
        $n = count($triangle);
        // 初始化数组
        $dp = array_fill(0, $n+1, 0);

        for ($i=$n - 1; $i >= 0; $i--) { 
            for ($j=0; $j <= $i; $j++) {
                $dp[$j] = min($dp[$j], $dp[$j + 1]) + $triangle[$i][$j];
            }
        }
        
        return $dp[0];
    }
}

// Accepted
// 43/43 cases passed (12 ms)
// Your runtime beats 99.03 % of php submissions
// Your memory usage beats 100 % of php submissions (16.2 MB)
// @lc code=end

