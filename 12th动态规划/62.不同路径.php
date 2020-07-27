<?php
/*
 * @lc app=leetcode.cn id=62 lang=php
 *
 * [62] 不同路径
 * 
 * https://leetcode-cn.com/problems/unique-paths/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        
        $dp[0][0] = 0;//起点无意义

        for ($i=0; $i < $m; $i++) { 
            $dp[0][$i] = 1;
        }

        for ($i=0; $i < $n; $i++) { 
            $dp[$i][0] = 1;
        }

        // 假设 dp[i][j] 是到达 i, j 最多路径，则 dp[i][j] 等于它当前坐标的向左一位（的路径和） + 向上一位（的路径和）
        for ($i=1; $i < $n; $i++) { 
            for ($j=1; $j < $m; $j++) { 
                $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
            }
        }

        return $dp[$n-1][$m-1];
    }
}

// Accepted
// 62/62 cases passed (4 ms)
// Your runtime beats 88.76 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

