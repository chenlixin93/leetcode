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

        if($board[$row][$col] == 'M' || $board[$row][$col] == 'X'){ // 一个地雷（'M'）被挖出，游戏就结束了- 把它改为 'X'。
            $board[$row][$col] = 'X';
            return $board;
        }

        $num = 0;
        foreach($this->dirs as $dir) { // 统计相邻地雷数
            $new_row = $row + $dir[0];
            $new_col = $col + $dir[1];

            if($new_row >= 0 && $new_col >= 0 && $new_row < $this->row_len && $new_col < $this->col_len && $board[$new_row][$new_col] === 'M') {
                $num++;
            }
        }

        if($num > 0) { // 已挖出的方块相邻的地雷数 > 0， 修改它为数字（'1'到'8'）
            $board[$row][$col] = (string)$num;
            return $board;
        }
        
        $board[$row][$col] = 'B'; // 一个没有相邻地雷的空方块（'E'）被挖出，修改它为（'B'）

        foreach($this->dirs as $dir) { // 检查相邻有没有 E
            $new_row = $row + $dir[0];
            $new_col = $col + $dir[1];

            // 所有和 E 相邻的未挖出方块都应该被递归地揭露
            if($new_row >= 0 && $new_col >= 0 && $new_row < $this->row_len && $new_col < $this->col_len && $board[$new_row][$new_col] === 'E') {
                $this->updateBoard($board, [$new_row, $new_col]); 
            }
        }

        return $board;
    }
}
// @lc code=end

