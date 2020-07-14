<?php
/*
 * @lc app=leetcode.cn id=122 lang=php
 *
 * [122] 买卖股票的最佳时机 II
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        
        $max_profit = 0;

        for ($i=1; $i < count($prices); $i++) { 
            // 如果今天比昨天高价，就在昨天买进，今天卖出
            if($prices[$i] > $prices[$i-1]) {
                $max_profit += $prices[$i] - $prices[$i-1];
            }
        }

        return $max_profit;
    }
}

// Accepted
// 200/200 cases passed (20 ms)
// Your runtime beats 69.88 % of php submissions
// Your memory usage beats 100 % of php submissions (16.9 MB)
// @lc code=end

