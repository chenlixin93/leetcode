<?php
/*
 * @lc app=leetcode.cn id=121 lang=php
 *
 * [121] 买卖股票的最佳时机
 * 
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/
 * 
 * 通用状态转移方程：
 * i 代表第几天，k 代表交易次数， 0、1代表没有股票、持有股票
 * 当前没有股票，可能是前一天没有股票，或者前一天有股票，但是今天卖出
 * 当前有股票，可能是前一天持有股票，或者前一天没有股票，但是今天买入
 * dp[i][k][0] = max(dp[i-1][k][0], dp[i-1][k][1] + prices[i])
 * dp[i][k][1] = max(dp[i-1][k][1], dp[i-1][k-1][0] - prices[i])
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {

        $n = count($prices);
        if($n == 0) return 0;

        $dp = [];
        $dp[0][0] = 0;//没有股票，也没有利润
        $dp[0][1] = -$prices[0];//买入股票，负利润

        for ($i=1; $i < $n; $i++) { 
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], -$prices[$i]);
        }

        return $dp[$n - 1][0];
    }
}

// Accepted
// 200/200 cases passed (12 ms)
// Your runtime beats 98.95 % of php submissions
// Your memory usage beats 33.33 % of php submissions (25.8 MB)
// @lc code=end

