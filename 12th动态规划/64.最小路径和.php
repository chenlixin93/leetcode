<?php
/*
 * @lc app=leetcode.cn id=64 lang=php
 *
 * [64] 最小路径和
 * 
 * https://leetcode-cn.com/problems/minimum-path-sum/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        
        $m = count($grid);
        $n = count($grid[0]);
        if($grid == null || $m == 0 || $n ==0) {
            return 0;
        }

        $dp[0][0] = $grid[0][0];

        // 初始化边界
        for ($i=1; $i < $m; $i++) { 
            $dp[$i][0]  = $dp[$i - 1][0] + $grid[$i][0];
        }

        for ($j=1; $j < $n; $j++) { 
            $dp[0][$j]  = $dp[0][$j - 1] + $grid[0][$j];
        }

        // 状态转移方程
        for ($i=1; $i < $m; $i++) { 
            for ($j=1; $j < $n; $j++) {
                // 从上往下走或者从左往右走，选出较小的一条路径
                $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1]) + $grid[$i][$j];
            }
        }

        return $dp[$m-1][$n-1];
    }
}

// Accepted
// 61/61 cases passed (28 ms)
// Your runtime beats 96.05 % of php submissions
// Your memory usage beats 100 % of php submissions (18.6 MB)
// @lc code=end

