<?php
/*
 * @lc app=leetcode.cn id=529 lang=php
 *
 * [529] 扫雷游戏
 */

// @lc code=start
class Solution {

    protected $dirs;
    protected $row_len;
    protected $col_len;
    /**
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    function updateBoard(&$board, $click) {
        
        $this->dirs = [[0,1],[0,-1],[1,0],[-1,0],[-1,-1],[-1,1],[1,-1],[1,1]];
        $this->row_len = count($board);
        $this->col_len = count($board[0]);

        $row = $click[0];
        $col = $click[1];

        if($board[$row][$col] == 'M' || $board[$row][$col] == 'X'){
            $board[$row][$col] = 'X';
            return $board;
        }

        $num = 0;
        foreach($this->dirs as $dir) {
            $new_row = $row + $dir[0];
            $new_col = $col + $dir[1];

            if($new_row >= 0 && $new_col >= 0 && $new_row < $this->row_len && $new_col < $this->col_len && $board[$new_row][$new_col] === 'M') {
                $num++;
            }
        }

        if($num > 0) {
            $board[$row][$col] = (string)$num;
            return $board;
        }

        $board[$row][$col] = 'B';

        foreach($this->dirs as $dir) {
            $new_row = $row + $dir[0];
            $new_col = $col + $dir[1];

            if($new_row >= 0 && $new_col >= 0 && $new_row < $this->row_len && $new_col < $this->col_len && $board[$new_row][$new_col] === 'E') {
                $this->updateBoard($board, [$new_row, $new_col]);
            }
        }

        return $board;
    }
}

// Accepted
// 54/54 cases passed (56 ms)
// Your runtime beats 81.82 % of php submissions
// Your memory usage beats 100 % of php submissions (17.5 MB)
// @lc code=end

