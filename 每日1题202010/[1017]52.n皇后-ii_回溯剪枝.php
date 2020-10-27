<?php
/*
 * @lc app=leetcode.cn id=52 lang=php
 *
 * [52] N皇后 II
 * 
 * https://leetcode-cn.com/problems/n-queens-ii/
 * 参考题解：https://leetcode-cn.com/problems/n-queens/solution/hui-su-fa-phpjian-ji-xie-fa-by-jasper-33/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {

        if($n < 1) {
            return 0;
        }

        // 存放皇后攻击的列、左对角线、右对角线
        $this->cols = [];
        $this->pie = [];
        $this->na = [];

        $res = [];
        $this->dfs($n, 0, [], $res);

        return count($res);
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
            $this->pie[] = $row + $col; // 左对角线的值一致
            $this->na[] = $row - $col; // 右对角线的值一致

            // $cur 不能受当前层的影响
            $this->dfs($n, $row + 1, array_merge($cur, [$col]), $res);

            array_pop($this->cols);
            array_pop($this->pie);
            array_pop($this->na);
        }
    }
}

// Accepted
// 9/9 cases passed (20 ms)
// Your runtime beats 58.11 % of php submissions
// Your memory usage beats 8.33 % of php submissions (15.4 MB)
// @lc code=end

