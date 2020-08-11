<?php
/*
 * @lc app=leetcode.cn id=51 lang=php
 *
 * [51] N皇后
 */

// @lc code=start
class Solution {

    protected $cols;
    protected $pie;
    protected $na;

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {

        if($n < 1) {
            return [];
        }

        // 存放皇后攻击的列、左对角线、右对角线
        $this->cols = [];
        $this->pie = [];
        $this->na = [];

        $res = [];
        $this->dfs($n, 0, [], $res);

        return $this->generate($res, $n);
    }

    function dfs($n, $row, $cur, &$res) {

        if($row == $n){
            $res[] = $cur;
            return true;
        }

        for ($col=0; $col < $n; $col++) { 

            // 剪枝（当前列、左、右对角线已存在，跳过）
            if(in_array($col, $this->cols) || in_array($row + $col, $this->pie) || in_array($row - $col, $this->na)) {
                continue;
            }

            $this->cols[] = $col;
            $this->pie[] = $row + $col;
            $this->na[] = $row - $col;

            // $cur 不能受当前层的影响
            $this->dfs($n, $row + 1, array_merge($cur, [$col]), $res);

            array_pop($this->cols);
            array_pop($this->pie);
            array_pop($this->na);
        }
    }

    function generate($arrs, $n) {
        
        $res = [];
        foreach ($arrs as $arr) {

            $tmp = [];
            foreach ($arr as $k => $v) {
                $tmp[] = str_repeat(".", $v)."Q".str_repeat(".", $n - $v - 1);
            }

            $res[] = $tmp;
        }

        return $res;
    }
}

// Accepted
// 9/9 cases passed (16 ms)
// Your runtime beats 91.3 % of php submissions
// Your memory usage beats 100 % of php submissions (16 MB)
// @lc code=end

