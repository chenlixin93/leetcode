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
        // 二维数组用来保存状态
        $this->rows = array_fill(0, 9, array_fill(0, 10, 0));
        $this->cols = array_fill(0, 9, array_fill(0, 10, 0));
        $this->boxes = array_fill(0, 9, array_fill(0, 10, 0));

        // 先遍历 9 * 9，遇到已有数字标记为 1
        // 解释一下 $by * 3 + $bx 吧，一开始我自己不太理解；
        // $by * 3 + $bx 展开为 floor(i / 3) * 3 + floor(j / 3) ；
        // 假设处于第一个 3 * 3 的范围内，行坐标 0、1、2，列坐标 0、1、2 ；
        // 这样计算出来，第一个 3 * 3 的编号一定是 0，依次类推后面盒子的编号分别就是 1 到 8 了；
        for ($i=0; $i < 9; $i++) { 
            for ($j=0; $j < 9; $j++) { 
                $c =  $board[$i][$j];
                if ($c != '.') {
                    $n = $c - '0';
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

        // 即上一个 y = 8，代表已经遍历完最后一行，可以退出
        if ($y == 9)  return true;

        // 判断下一个坐标点需不需要换行
        $nx = ($x + 1) % 9;
        $ny = ($nx == 0) ? $y + 1 : $y;

        // 遇到数字，继续下一个坐标
        if ($board[$y][$x] != '.') return $this->fill($board, $nx, $ny);

        // 等于 “.” 时，尝试填上 1 - 9，回溯法
        for ($i=1; $i <= 9; $i++) { 
            $bx = floor($x / 3);
            $by = floor($y / 3);
            $box_key = $by * 3 + $bx;

            // 初始二维数据时，没标记过的为0，可以将数字填上
            if (!$this->rows[$y][$i] && !$this->cols[$x][$i] && !$this->boxes[$box_key][$i]) {
                    // 标准回溯模板
                    $this->rows[$y][$i] = 1;
                    $this->cols[$x][$i] = 1;
                    $this->boxes[$box_key][$i] = 1;
                    $board[$y][$x] = (string)$i; // 注意string格式
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
// 6/6 cases passed (76 ms)
// Your runtime beats 76.92 % of php submissions
// Your memory usage beats 26.09 % of php submissions (14.7 MB)
// @lc code=end

