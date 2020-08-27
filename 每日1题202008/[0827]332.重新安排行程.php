<?php
/*
 * @lc app=leetcode.cn id=332 lang=php
 *
 * [332] 重新安排行程
 * 
 * https://leetcode-cn.com/problems/reconstruct-itinerary/
 * 视频讲解 https://www.bilibili.com/video/BV14J411h7W1?from=search&seid=1301487221452829034
 */

// @lc code=start
class Solution {

    /**
     * @param String[][] $tickets
     * @return String[]
     */
    function findItinerary($tickets) {

        $g = [];
        $this->buildGraph($tickets, $g); // 构建图

        $stack = [];
        $this->dfs($g, $stack, "JFK"); // 深度优先搜索
        
        return array_reverse($stack);
    }

    function buildGraph($tickets, &$g) {

        foreach ($tickets as $ticket) {
            $from = $ticket[0];
            $to = $ticket[1];

            if (!array_key_exists($from, $g)) {
                $g[$from] = [];
            }

            $g[$from][] = $to;
        }

        foreach ($g as $from => $tos) {
            sort($g[$from]);
        }
    }

    function dfs(&$g, &$stack, $from) {

        while (!empty($g[$from])) {
            $to = array_shift($g[$from]);
            $this->dfs($g, $stack, $to); // 前一个目的地作为新的起点
        }
        
        array_push($stack, $from);
    }
}

// Accepted
// 80/80 cases passed (32 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.3 MB)
// @lc code=end

