<?php
/*
 * @lc app=leetcode.cn id=51 lang=php
 *
 * [51] N皇后
 * 
 * https://leetcode-cn.com/problems/n-queens/
 */

// @lc code=start
class Solution {

    protected $cols;
    protected $pie;
    protected $na;
    protected $res;

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

        $this->res = [];
        $this->dfs($n, 0, []);

        return $this->generate($this->res, $n);
    }

    // $row 外层控制每一行，$col 每层控制每一列
    function dfs($n, $row, $cur) {

        if($row == $n){
            $this->res[] = $cur;
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
            $this->dfs($n, $row + 1, array_merge($cur, [$col]));

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
// 9/9 cases passed (20 ms)
// Your runtime beats 72.88 % of php submissions
// Your memory usage beats 50 % of php submissions (15.9 MB)
// @lc code=end

