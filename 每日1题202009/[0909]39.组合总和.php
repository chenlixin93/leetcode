<?php
/*
 * @lc app=leetcode.cn id=39 lang=php
 *
 * [39] 组合总和
 * 
 * https://leetcode-cn.com/problems/combination-sum/
 * 视频讲解 https://www.bilibili.com/video/BV1Jt411H75d?from=search&seid=1354833469870329794
 */

// @lc code=start
class Solution {

    protected $results;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        // 回溯法
        $this->results = [];
        $result = [];
        sort($candidates);
        $this->dfs($result, $candidates, $target, 0);
        return $this->results;
    }

    function dfs($result, $candidates, $target, $level) {

        if ($target == 0) {
            $this->results[] = $result;
            return true;
        }

        for ($i=$level; $i < count($candidates) && $target - $candidates[$i] >= 0; $i++) { 
            array_push($result, $candidates[$i]);
            $this->dfs($result, $candidates, $target - $candidates[$i], $i);
            array_pop($result);
        }
    }
}
// @lc code=end

