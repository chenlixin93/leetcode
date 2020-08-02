<?php
/*
 * @lc app=leetcode.cn id=32 lang=php
 *
 * [32] 最长有效括号
 * 
 * https://leetcode-cn.com/problems/longest-valid-parentheses/
 * 视频讲解 https://www.bilibili.com/video/BV1Ct4y197M3?from=search&seid=7250467796583559575
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        
        $n = strlen($s);
        // dp[i] 代表以当前字符结尾构成有效括号子串的长度是多少
        $dp = array_fill(0, $n, 0);
        $max = 0;

        for ($i=1; $i < $n; $i++) { 
            // 以左括号结尾肯定不是有效子串，跳过
            if ($s[$i] == ')') {
                // 上一个子串有效的条件
                if ($i - $dp[$i - 1] > 0 && $s[$i - $dp[$i - 1] - 1] == '(') {
                    $dp[$i] = 2 + $dp[$i - 1] + ($i - $dp[$i - 1] - 2 > -1 ? $dp[$i - $dp[$i - 1] - 2] : 0);
                }
            }

            $max = max($max, $dp[$i]);
        }

        return $max;
    }
}

// Accepted
// 230/230 cases passed (12 ms)
// Your runtime beats 87.5 % of php submissions
// Your memory usage beats 100 % of php submissions (15.3 MB)
// @lc code=end

