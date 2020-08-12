<?php
/*
 * @lc app=leetcode.cn id=130 lang=php
 *
 * [130] 被围绕的区域
 * 
 * https://leetcode-cn.com/problems/surrounded-regions/
 * 视频讲解 https://www.bilibili.com/video/BV1EK4y147vQ?from=search&seid=504193870173223285
 * 解题思路
 * 假设有一场洪水，初始时从边界上的 O 开始所搜，相邻为 O 的，设为洪水不可到达 U
 * 最终遍历整个区域，遇到仍然为 O 的，将其淹没为 X；遇到 U 的，将其恢复为 O
 */

// @lc code=start
class Solution {

    protected $dx = [0, 0, -1, 1];
    protected $dy = [1, -1, 0, 0];
    protected $m; // 行数
    protected $n; // 列数

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {

        $this->m = count($board);
        $this->n = count($board[0]);

        // 处理第一列和最后一列
        for ($i=0; $i < $this->m; $i++) { 
            if ($board[$i][0] == 'O') {
                $this->dfs($board, $i, 0);
            }
            if ($board[$i][$this->n - 1] == 'O') {
                $this->dfs($board, $i, $this->n - 1);
            }
        }

        // 处理第一行和最后一行
        for ($j=0; $j < $this->n; $j++) { 
            if ($board[0][$j] == 'O') {
                $this->dfs($board, 0, $j);
            }
            if ($board[$this->m - 1][$j] == 'O') {
                $this->dfs($board, $this->m - 1, $j);
            }
        }

        // 遍历整个二维数组
        for ($i=0; $i < $this->m; $i++) { 
            for ($j=0; $j < $this->n; $j++) { 
                if ($board[$i][$j] == 'O') {
                    $board[$i][$j] = 'X';
                    continue;
                }
                if ($board[$i][$j] == 'U') {
                    $board[$i][$j] = 'O';
                }
            }
        }
    }

    function dfs(&$board, $i, $j) {

        if ($i < 0 || $i >= $this->m || $j < 0 || $j >= $this->n || $board[$i][$j] == 'U' || $board[$i][$j] == 'X') {
            return true;
        }

        $board[$i][$j] = 'U';
        $l = count($this->dx);

        for ($k=0; $k < $l; $k++) { // 搜索上下左右4个位置
            $nx = $i + $this->dx[$k];
            $ny = $j + $this->dy[$k];
            $this->dfs($board, $nx, $ny);
        }
    }
}

// Accepted
// 59/59 cases passed (48 ms)
// Your runtime beats 70.83 % of php submissions
// Your memory usage beats 33.33 % of php submissions (21.4 MB)
// @lc code=end