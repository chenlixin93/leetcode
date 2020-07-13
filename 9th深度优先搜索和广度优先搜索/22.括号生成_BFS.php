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
        
        if($n == 0) return [];

        $res = [];
        $queue = [];

        array_push($queue, ["", $n, $n]);

        // BFS 广度优先遍历
        while (!empty($queue)) {
            
            $cur = array_shift($queue);
            $str = $cur[0];
            $left = $cur[1];
            $right = $cur[2];

            if($left == 0 && $right == 0) {
                $res[] = $str;
                continue;
            }

            if($left > 0) {
                array_push($queue, [$str."(", $left - 1, $right]);
            }

            if($right > 0 && $left < $right) {
                array_push($queue, [$str.")", $left, $right - 1]);
            }

        }

        return $res;
    }
}

// Accepted
// 8/8 cases passed (28 ms)
// Your runtime beats 7.65 % of php submissions
// Your memory usage beats 100 % of php submissions (16.1 MB)
// 效率很低？？
// @lc code=end

