<?php
/*
 * @lc app=leetcode.cn id=63 lang=php
 *
 * [63] 不同路径 II
 * 
 * https://leetcode-cn.com/problems/unique-paths-ii/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {

        if(count($obstacleGrid) == 0 || count($obstacleGrid[0]) == 0) {
            return 0;
        }

        // 判断起点是不是障碍
        if($obstacleGrid[0][0] == 1){
            return 0;
        }

        $n = count($obstacleGrid);
        $m = count($obstacleGrid[0]);

        // 初始化都为0
        $dp = array_fill(0, $n, array_fill(0, $m, 0));
        $dp[0][0] = 1;

        // 初始化左边界，遇到障碍就退出，比如 $obstacleGrid[0][1] == 1 退出了，$dp[0][$i]后续仍保持 0 
        for ($i=1; $i < $m && $obstacleGrid[0][$i] == 0; $i++) { 
            $dp[0][$i] = 1;
        }

        // 初始化上边界
        for ($i=1; $i < $n && $obstacleGrid[$i][0] == 0; $i++) { 
            $dp[$i][0] = 1;
        }

        // 假设 dp[i][j] 是到达 i, j 最多路径，则 dp[i][j] 等于它当前坐标的向左一位（的路径和） + 向上一位（的路径和）
        for ($i=1; $i < $n; $i++) { 
            for ($j=1; $j < $m; $j++) { 
                if ($obstacleGrid[$i][$j] == 0) {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
                }
            }
        }

        return $dp[$n-1][$m-1];
    }
}

// Accepted
// 41/41 cases passed (8 ms)
// Your runtime beats 97.67 % of php submissions
// Your memory usage beats 100 % of php submissions (15.2 MB)
// @lc code=end

