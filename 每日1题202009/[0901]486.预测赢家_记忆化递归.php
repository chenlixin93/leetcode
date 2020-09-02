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

    protected $m;
    protected $size;
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function PredictTheWinner($nums) {
        // 关于记忆化：用例 [1,5,233,7]
        // 玩家1拿走1，玩家2拿走7；玩家1拿走7，玩家2拿走1；
        // 剩下的子问题都是 [5,233]，只计算一次就好

        $this->size = count($nums);
        // 存储重叠的子问题解
        $this->m = array_fill(0, $this->size * $this->size, 0);

        // 判断玩家1 - 玩家2是否大于等于0
        return $this->getScore($nums, 0, count($nums) - 1) >= 0;
    }

    function getScore($nums, $l, $r) {

        if ($l == $r) return $nums[$l];

        $k = $l * $this->size + $r;
        if ($this->m[$k] > 0) return $this->m[$k];

        // 求两种情况下的最优解
        // 玩家1选择左端点L，那么玩家2的可选择区间则是[L + 1, R]
        // 玩家1选择右端点R，那么玩家2的可选择区间则是[L, R - 1]
        $this->m[$k] =  max(
            $nums[$l] - $this->getScore($nums, $l + 1, $r),
            $nums[$r] - $this->getScore($nums, $l, $r - 1)
        );

        return $this->m[$k];
    }
}

// Accepted
// 62/62 cases passed (12 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

