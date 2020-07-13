<?php
/*
 * @lc app=leetcode.cn id=200 lang=php
 *
 * [200] 岛屿数量
 */

// @lc code=start
class Solution {

    protected $row;
    protected $col;

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {

        if($grid == null || count($grid) == 0) return 0;

        $count = 0;

        $this->row = count($grid);
        $this->col = count($grid[0]);

        for ($i=0; $i < $this->row; $i++) { 
            
            for ($j=0; $j < $this->col; $j++) { 

                if($grid[$i][$j] == '1'){
                    $count++;
                    $this->dfs($grid, $i, $j);
                }
            }
        }

        return $count;
    }

    function dfs(&$grid, $i, $j) {

        if($i < 0 || $j < 0 || $i >= $this->row || $j >= $this->col || $grid[$i][$j] == '0') {
            return true;
        }

        $grid[$i][$j] = '0';
        $this->dfs($grid, $i - 1, $j);
        $this->dfs($grid, $i + 1, $j);
        $this->dfs($grid, $i, $j - 1);
        $this->dfs($grid, $i, $j + 1);
    }
}

// Accepted
// 47/47 cases passed (56 ms)
// Your runtime beats 51.2 % of php submissions
// Your memory usage beats 100 % of php submissions (22.6 MB)
// @lc code=end

