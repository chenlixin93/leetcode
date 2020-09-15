<?php
/*
 * @lc app=leetcode.cn id=37 lang=php
 *
 * [37] 解数独
 * 
 * https://leetcode-cn.com/problems/sudoku-solver/
 * 视频讲解 https://www.bilibili.com/video/BV1Tt41137Xr?from=search&seid=10617534967571621582
 */

// @lc code=start
class Solution {

    protected $rows;
    protected $cols;
    protected $boxes;

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        $this->rows = array_fill(0, 9, array_fill(0, 10, 0));
        $this->cols = array_fill(0, 9, array_fill(0, 10, 0));
        $this->boxes = array_fill(0, 9, array_fill(0, 10, 0));

        for ($i=0; $i < 9; $i++) { 
            for ($j=0; $j < 9; $j++) { 
                $c =  $board[$i][$j];
                if ($c != '.') {
                    $n = floor($c - '0');
                    $bx = floor($j / 3);
                    $by = floor($i / 3);
                    $this->rows[$i][$n] = 1;
                    $this->cols[$j][$n] = 1;
                    $this->boxes[$by * 3 + $bx][$n] = 1;
                }
            }
        }

        $this->fill($board, 0, 0);
    }

    function fill(&$board, $x, $y) {

        if ($y == 9)  return true;

        $nx = ($x + 1) % 9;
        $ny = ($nx == 0) ? $y + 1 : $y;

        if ($board[$y][$x] != '.') return $this->fill($board, $nx, $ny);

        for ($i=1; $i <= 9; $i++) { 
            $bx = floor($x / 3);
            $by = floor($y / 3);
            $box_key = $by * 3 + $bx;

            if (!$this->rows[$y][$i] && !$this->cols[$x][$i] && 
                !$this->boxes[$box_key][$i]) {
                    $this->rows[$y][$i] = 1;
                    $this->cols[$x][$i] = 1;
                    $this->boxes[$box_key][$i] = 1;
                    $board[$y][$x] = (string)$i;
                    if($this->fill($board, $nx, $ny)) return true;
                    $this->rows[$y][$i] = 0;
                    $this->cols[$x][$i] = 0;
                    $this->boxes[$box_key][$i] = 0;
                    $board[$y][$x] = '.';
            }
        }

        return false;
    }
}

// Accepted
// 6/6 cases passed (68 ms)
// Your runtime beats 82.05 % of php submissions
// Your memory usage beats 56.52 % of php submissions (14.9 MB)
// @lc code=end

