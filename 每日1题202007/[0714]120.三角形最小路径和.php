<?php
/*
 * @lc app=leetcode.cn id=120 lang=php
 *
 * [120] 三角形最小路径和
 * 
 * https://leetcode-cn.com/problems/triangle/
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

    // Accepted
    // 43/43 cases passed (24 ms)
    // Your runtime beats 30.43 % of php submissions
    // Your memory usage beats 100 % of php submissions (17.9 MB)

    /**
     * 优化内存版本
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal_quick($triangle) {

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

    // Accepted
    // 43/43 cases passed (20 ms)
    // Your runtime beats 68.12 % of php submissions
    // Your memory usage beats 100 % of php submissions (16.4 MB)
}
// @lc code=end

