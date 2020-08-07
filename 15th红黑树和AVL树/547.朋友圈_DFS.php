<?php
/*
 * @lc app=leetcode.cn id=547 lang=php
 *
 * [547] 朋友圈
 * 
 * https://leetcode-cn.com/problems/friend-circles/
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

        for ($i=0; $i < $n; $i++) { 
            if ($visited[$i]) continue;

            $this->dfs($M, $i, $visited);
            $res++;
        }

        return $res;
    }

    function dfs(&$M, $k, &$visited) {

        $visited[$k] = 1;
        for ($i=0; $i < count($M); $i++) { 
            if($M[$k][$i] == 0 || $visited[$i]) continue;
            $this->dfs($M, $i, $visited);
        }
    }
}

// Accepted
// 113/113 cases passed (72 ms)
// Your runtime beats 91.18 % of php submissions
// Your memory usage beats 100 % of php submissions (17.2 MB)
// @lc code=end

