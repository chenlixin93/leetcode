<?php
/*
 * @lc app=leetcode.cn id=486 lang=php
 *
 * [486] 预测赢家
 * 
 * https://leetcode-cn.com/problems/predict-the-winner/
 * 视频讲解 https://www.bilibili.com/video/BV1kW411d7R2?from=search&seid=14164385378038574682
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function PredictTheWinner($nums) {
        // 判断玩家1 - 玩家2是否大于等于0
        return $this->getScore($nums, 0, count($nums) - 1) >= 0;
    }

    function getScore($nums, $l, $r) {

        if ($l == $r) return $nums[$l];

        // 求两种情况下的最优解
        // 玩家1选择左端点L，那么玩家2的可选择区间则是[L + 1, R]
        // 玩家1选择右端点R，那么玩家2的可选择区间则是[L, R - 1]
        return max(
            $nums[$l] - $this->getScore($nums, $l + 1, $r),
            $nums[$r] - $this->getScore($nums, $l, $r - 1)
        );
    }
}

// Accepted
// 62/62 cases passed (1340 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// 效率较低
// @lc code=end

