<?php
/*
 * @lc app=leetcode.cn id=322 lang=php
 *
 * [322] 零钱兑换
 * 
 * https://leetcode-cn.com/problems/coin-change/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) {

        // 最大值
        $max = $amount + 1;
        // 初始化
        $dp = array_fill(0, $amount + 1, $max);
        // 走到第0级台阶需要0步
        $dp[0] = 0;
        for ($i=0; $i <= $amount; $i++) { 
            for ($j=0; $j < count($coins); $j++) { 
                // i 表示要凑到的面值数
                if($coins[$j] <= $i) {
                    // coins[j] 可用情况下
                    $dp[$i] = min($dp[$i], $dp[$i - $coins[$j]] + 1);
                }
            }
        }

        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }
}

// 1. 暴力：递归、指数级
// 2. BFS
// 3. DP array: f(n) = min{f(n - k), for k in [1, 2, 5]} + 1

// Accepted
// 182/182 cases passed (368 ms)
// Your runtime beats 42.31 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end