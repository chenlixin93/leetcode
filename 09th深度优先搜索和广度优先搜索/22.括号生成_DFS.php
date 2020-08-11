<?php
/*
 * @lc app=leetcode.cn id=22 lang=php
 *
 * [22] 括号生成
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {

        $res = [];

        $this->generate(0, 0, $n, "", $res);

        return $res;
    }

    // 递归生成括号
    function generate($left, $right, $n, $s, &$res) {

        // 每次终止条件
        if($left == $n && $right == $n) {
            $res[] = $s;
        }

        // 左括号还没用完
        if($left < $n) {
            $this->generate($left+1, $right, $n, $s."(", $res);
        }
        
        // 右括号小于左口号数量时，+1
        if($right < $left) {
            $this->generate($left, $right+1, $n, $s.")", $res);
        }
    }
}

// Accepted
// 8/8 cases passed (8 ms)
// Your runtime beats 79.59 % of php submissions
// Your memory usage beats 100 % of php submissions (15.6 MB)
// @lc code=end

