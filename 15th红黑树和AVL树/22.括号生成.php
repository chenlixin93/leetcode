<?php
/*
 * @lc app=leetcode.cn id=22 lang=php
 *
 * [22] 括号生成
 * 
 * https://leetcode-cn.com/problems/generate-parentheses/
 */

// @lc code=start
class Solution {

    protected $res;

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {

        $this->res = [];

        $this->dfs(0, 0, $n, "");
        return $this->res;
    }

    function dfs ($left, $right, $n, $s) {

        if ($left == $n && $right == $n) {
            $this->res[] = $s;
        }

        if ($left < $n) {
            $this->dfs($left + 1, $right, $n, $s."(");
        }

        if ($right < $left) {
            $this->dfs($left, $right + 1, $n, $s.")");
        }
    }
}

// Accepted
// 8/8 cases passed (4 ms)
// Your runtime beats 99.3 % of php submissions
// Your memory usage beats 25 % of php submissions (15.5 MB)
// @lc code=end

