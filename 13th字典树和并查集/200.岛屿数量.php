<?php
/*
 * @lc app=leetcode.cn id=200 lang=php
 *
 * [200] 岛屿数量
 * 
 * https://leetcode-cn.com/problems/number-of-islands/
 */

// @lc code=start
class Solution {
    protected $m;
    protected $n;

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {

        if (count($grid) == 0 || count($grid[0]) == 0) {
            return 0;
        }

        $this->m = count($grid);
        $this->n = count($grid[0]);
        $count = 0;

        for ($i=0; $i < $this->m; $i++) { 
            for ($j=0; $j < $this->n; $j++) { 
                if ($grid[$i][$j] == '1') { // 当前为1的话，将其改为0，遍历相邻的四个点，遇到0退出，遇到1，dfs重复前面过程
                    $count++;
                    $this->dfs($grid, $i, $j);
                }
            }
        }

        return $count;
    }

    function dfs(&$grid, $i, $j) {

        if ($i < 0 || $i >= $this->m || $j < 0 || $j >= $this->n || $grid[$i][$j] == '0') {
            return true;
        }

        $grid[$i][$j] = '0';
        $this->dfs($grid, $i + 1, $j);
        $this->dfs($grid, $i - 1, $j);
        $this->dfs($grid, $i, $j - 1);
        $this->dfs($grid, $i, $j + 1);
    }
}

// Accepted
// 47/47 cases passed (52 ms)
// Your runtime beats 58.33 % of php submissions
// Your memory usage beats 88.89 % of php submissions (22.2 MB)
// @lc code=end

