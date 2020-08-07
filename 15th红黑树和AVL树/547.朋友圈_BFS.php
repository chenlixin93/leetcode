<?php
/*
 * @lc app=leetcode.cn id=547 lang=php
 *
 * [547] 朋友圈
 * 
 * https://leetcode-cn.com/problems/friend-circles/
 * 参考 https://www.cnblogs.com/grandyang/p/6686983.html
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $M
     * @return Integer
     */
    function findCircleNum($M) {

        $n = count($M);
        $res = 0;

        $visited = array_fill(0, $n, 0);
        $queue = [];

        for ($i=0; $i < $n; $i++) { 
            if ($visited[$i]) continue;

            array_push($queue, $i);
            while (!empty($queue)) {
                $t = array_shift($queue);
                $visited[$t] = 1;

                for ($j=0; $j < $n; $j++) { 
                    if ($M[$t][$j] == 0 || $visited[$j]) continue;

                    array_push($queue, $j);
                }
            }

            $res++;
        }

        return $res;
    }
}

// Accepted
// 113/113 cases passed (176 ms)
// Your runtime beats 11.76 % of php submissions
// Your memory usage beats 100 % of php submissions (17.1 MB)
// @lc code=end