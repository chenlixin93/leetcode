<?php
/*
 * @lc app=leetcode.cn id=685 lang=php
 *
 * [685] 冗余连接 II
 * 
 * https://leetcode-cn.com/problems/redundant-connection-ii/
 * 视频讲解 https://www.bilibili.com/video/av59777261
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantDirectedConnection($edges) {

        $len = count($edges);
        $parents = array_fill(0, $len + 1, 0);

        $ans1 = [];
        $ans2 = [];

        $dup_parents = false;

        foreach ($edges as $k => $edge) {
            $u = $edge[0];
            $v = $edge[1];

            // 一个节点有两个父节点指向它
            if ($parents[$v] > 0) {
                $ans1 = [$parents[$v], $v];
                $ans2 = $edge;
                $dup_parents = true;
                // 删除最近的一条边
                $edges[$k][0] = -1;
                $edges[$k][1] = -1;
            } else {
                $parents[$v] = $u;
            }
        }

        // 重置
        $parents = array_fill(0, $len + 1, 0);

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];

            // 无效的边（前面步骤已经删除）
            if ($u < 0 || $v < 0) continue;

            $parents[$v] = $u;

            if ($this->cycle($v, $parents)) {
                return $dup_parents ? $ans1 : $edge;
            }
        }

        return $ans2;
    }

    function cycle($v, &$parents) {
        $u = $parents[$v];
        while ($u) {
            if ($u == $v) return true;
            $u = $parents[$u];
        }
        return false;
    }
}

// Accepted
// 52/52 cases passed (16 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.9 MB)
// @lc code=end
