<?php
/*
 * @lc app=leetcode.cn id=40 lang=php
 *
 * [40] 组合总和 II
 * 
 * https://leetcode-cn.com/problems/combination-sum-ii/
 * 视频讲解 https://www.bilibili.com/video/BV1Pb411u7Yd?from=search&seid=13642324053212144492
 */

// @lc code=start
class Solution {

    protected $results;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        // 回溯法
        $this->results = [];
        $result = [];
        sort($candidates); // 排序方便剪枝
        $this->dfs($result, $candidates, $target, 0);
        return $this->results;
    }

    function dfs($result, $candidates, $target, $level) {

        if ($target == 0) {
            $this->results[] = $result;
            return true;
        }

        for ($i=$level; $i < count($candidates); $i++) {

            if ($candidates[$i] > $target) return true;  // 剪枝
            if ($i > $level && $candidates[$i] == $candidates[$i - 1]) continue; // 大于 level 证明不是第一个数，可以对比前一个数，相同则跳过

            array_push($result, $candidates[$i]);
            $this->dfs($result, $candidates, $target - $candidates[$i], $i + 1);
            array_pop($result);
        }
    }
}

// Accepted
// 172/172 cases passed (8 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 33.33 % of php submissions (14.9 MB)
// @lc code=end

