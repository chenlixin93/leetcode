<?php
/*
 * @lc app=leetcode.cn id=1143 lang=php
 *
 * [1143] 最长公共子序列
 * 
 * https://leetcode-cn.com/problems/longest-common-subsequence/
 * 视频讲解 https://www.bilibili.com/video/BV1iE411Y7fy?from=search&seid=11907390432490932326
 */

// @lc code=start
class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {

        $m = strlen($text1);
        $n = strlen($text2);
        $dp[0][0] = 0;

        for ($i=1; $i <= $m; $i++) { 
            $dp[0][$i] = 0;
        }

        for ($i=1; $i <= $n; $i++) { 
            $dp[$i][0] = 0;
        }

        for ($i=0; $i < $m; $i++) { 
            for ($j=0; $j < $n; $j++) { 
                if($text1[$i] == $text2[$j]) {
                    $dp[$i + 1][$j + 1] = $dp[$i][$j] + 1;
                }else{
                    $dp[$i + 1][$j + 1] = max($dp[$i + 1][$j], $dp[$i][$j + 1]);
                }
            }
        }

        return $dp[$m][$n];
    }
}

// Accepted
// 43/43 cases passed (128 ms)
// Your runtime beats 51.32 % of php submissions
// Your memory usage beats 100 % of php submissions (47.3 MB)
// @lc code=end

