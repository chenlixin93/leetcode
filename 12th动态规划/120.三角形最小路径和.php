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

        // 三角形的层高/二维数组的行数
        $n = count($triangle);
        // 初始化二维数组
        $dp = array_fill(0, $n+1, array_fill(0, $n+1, 0));

        for ($i=$n - 1; $i >= 0; $i--) { 
            for ($j=0; $j <= $i; $j++) {
                // 当前坐标的最小路径和 = 下一层的同坐标和相邻坐标（较小值） + 当前坐标值
                $dp[$i][$j] = min($dp[$i + 1][$j], $dp[$i + 1][$j + 1]) + $triangle[$i][$j];
            }
        }
        
        return $dp[0][0];
    }
}

// Accepted
// 43/43 cases passed (16 ms)
// Your runtime beats 91.3 % of php submissions
// Your memory usage beats 100 % of php submissions (17.6 MB)
// @lc code=end

