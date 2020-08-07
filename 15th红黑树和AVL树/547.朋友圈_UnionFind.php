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
        $res = $n;
        $root = array_fill(0, $n, 0);
        for ($i=0; $i < $n; $i++) { 
            $root[$i] = $i;
        }

        for ($i=0; $i < $n; $i++) { 
            for ($j=$i+1; $j < $n; $j++) { 
                if ($M[$i][$j] == 1) {
                    $p1 = $this->getRoot($root, $i);
                    $p2 = $this->getRoot($root, $j);
                    if ($p1 != $p2) {
                        $res--;
                        $root[$p2] = $p1;
                    }
                }
            }
        }

        return $res;
    }

    function getRoot(&$root, $i) {
        while ($i != $root[$i]) {
            $root[$i] = $root[$root[$i]];
            $i = $root[$i];
        }

        return $i;
    }
}

// Accepted
// 113/113 cases passed (80 ms)
// Your runtime beats 64.71 % of php submissions
// Your memory usage beats 100 % of php submissions (17.1 MB)
// @lc code=end

