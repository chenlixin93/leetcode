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
        $roots = array_fill(0, $len + 1, 0);
        $sizes = array_fill(0, $len + 1, 1);

        $ans1 = [];
        $ans2 = [];

        foreach ($edges as $k => $edge) {
            $u = $edge[0];
            $v = $edge[1];

            // 一个节点有两个父节点指向它
            if ($parents[$v] > 0) {
                $ans1 = [$parents[$v], $v];
                $ans2 = $edge;

                // 删除最近的一条边
                $edges[$k][0] = -1;
                $edges[$k][1] = -1;
            }

            $parents[$v] = $u;
        }

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];

            // 无效的边（前面步骤已经删除）
            if ($u < 0 || $v < 0) continue;

            if (!$roots[$u]) $roots[$u] = $u;
            if (!$roots[$v]) $roots[$v] = $v;
            $pu = $this->find($u, $roots);
            $pv = $this->find($v, $roots);

            // u 和 v 已存在时
            if ($pu == $pv) {
                return empty($ans1) ? $edge : $ans1;
            }

            // 并查集，总是合并较小的集合到较大的集合
            if ($sizes[$pv] > $sizes[$pu]) {
                $tmp = $pv;
                $pv = $pu;
                $pu = $tmp;
            }

            $roots[$pv] = $pu;
            $sizes[$pu] += $sizes[$pv];
        }

        return $ans2;
    }

    function find($node, &$roots) {
        // 标准 UnionFind 模版
        while ($roots[$node] != $node) {
            $roots[$node] = $roots[$roots[$node]];
            $node = $roots[$node];
        }

        return $node;

    }
}

// Accepted
// 52/52 cases passed (20 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.5 MB)
// @lc code=end

