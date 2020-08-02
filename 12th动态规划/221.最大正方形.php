<?php
/*
 * @lc app=leetcode.cn id=221 lang=php
 *
 * [221] 最大正方形
 * 
 * https://leetcode-cn.com/problems/maximal-square/
 * 视频讲解 https://www.bilibili.com/video/BV1oe411s7k8?from=search&seid=9609900843388172626
 */

// @lc code=start
class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) {

        if (count($matrix) == 0 || count($matrix[0]) == 0) {
            return 0;
        }

        $m = count($matrix);
        $n = count($matrix[0]);

        // dp[i][i] 表示以 $matrix[i][j] 为右下角的正方形边长
        $dp = array_fill(0, $m, array_fill(0, $n, 0));
        $max = 0;

        for ($i=0; $i < $m; $i++) { 
            $dp[$i][0] = ($matrix[$i][0] == '1') ? 1 : 0;
            $max = max($max, $dp[$i][0]);// 第一行出现1的话
        }

        for ($i=0; $i < $n; $i++) { 
            $dp[0][$i] = ($matrix[0][$i] == '1') ? 1 : 0;
            $max = max($max, $dp[0][$i]);// 第一列出现1的话
        }

        for ($i=1; $i < $m; $i++) { 
            for ($j=1; $j < $n; $j++) { 
                if ($matrix[$i][$j] == '1') {
                    // 从左方、上方、左上方找最小边长，能构成正方形，而不是长方形
                    $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]) + 1;
                    $max = max($max, $dp[$i][$j]);
                }
            }
        }

        return $max * $max;
    }
}

// Accepted
// 73/73 cases passed (68 ms)
// Your runtime beats 90.8 % of php submissions
// Your memory usage beats 100 % of php submissions (25.1 MB)
// @lc code=end

