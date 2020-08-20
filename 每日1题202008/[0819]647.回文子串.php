<?php
/*
 * @lc app=leetcode.cn id=647 lang=php
 *
 * [647] 回文子串
 * 
 * https://leetcode-cn.com/problems/palindromic-substrings/
 * 视频讲解 https://www.bilibili.com/video/BV17J411y7Xx?from=search&seid=5290369526891570764
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) {
        
        $n = strlen($s);
        $res = 0;

        // dp[i][j] 代表第 i 个字符到第 j 个字符是不是回文串
        $dp = [];

        // 单字符
        for ($i=0; $i < $n; $i++) { 
            $dp[$i][$i] = true;
            $res++;
        }

        // 题目要求，相邻两数相同可计为一个子串
        for ($i=0; $i < $n - 1; $i++) {
            if($s[$i] == $s[$i + 1]){
                $dp[$i][$i+1] = true;
                $res++;
            }
        }

        // 从长度为3开始判断“常规的回文串”
        for ($len=3; $len <= $n; $len++) { 
            for ($i=0; $i + $len <= $n; $i++) { 
                // 当前长度的最后一位数的索引
                $j = $i + $len - 1;
                if ($s[$i] == $s[$j]) {
                    // i == j 时，取决于中间部分 [i+1][j-1] 是否为回文串
                    $dp[$i][$j] = $dp[$i + 1][$j - 1];
                    if($dp[$i][$j]){
                        $res++;
                    }
                }
            }
        }

        return $res;
    }
}

// Accepted
// 130/130 cases passed (216 ms)
// Your runtime beats 47.83 % of php submissions
// Your memory usage beats 100 % of php submissions (42.4 MB)
// @lc code=end

