<?php
/*
 * @lc app=leetcode.cn id=97 lang=php
 *
 * [97] 交错字符串
 * 
 * https://leetcode-cn.com/problems/interleaving-string/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3) {
        
        $len1 = strlen($s1);
        $len2 = strlen($s2);

        if($len1 + $len2 != strlen($s3)) return false;

        // 起始位置设为true
        $dp[0][0] = true;

        // 只取 s1 时
        for ($i=1; $i <= $len1; $i++) {
            // s1 的前 i 位是否能构成 s3 的前 i 位，需要满足以下条件：
            // 前 i−1 位可以构成 s3 的前 i−1 位且 s1 的第 i 位（s1[i−1]）等于 s3 的第 i 位（s3[i−1]）
            $dp[$i][0] = $dp[$i - 1][0] && $s1[$i - 1] == $s3[$i - 1];
        }

        // 只取 s2 时
        for ($j=1; $j <= $len2; $j++) {
            // 同上
            $dp[0][$j] = $dp[0][$j - 1] && $s2[$j - 1] == $s3[$j - 1];
        }

        for ($i=1; $i <= $len1; $i++) {

            for ($j=1; $j <= $len2; $j++) {
                // s1 的前 i 位和 s2 的前 j 位能否组成 s3 的前 i + j 位，取决于两种情况：
                // 1. s1 的前 i 位和 s2 的前 j - 1 位能够组成 s3 的前 i + j - 1 位，
                // 并且 s2 的第 j 位 == s3 的第 i + j 位 即 $s2[$j - 1] == $s3[$i + $j - 1]
                // 2. 反之亦然，只要有一种情况符合要求即可
                $dp[$i][$j] = ($dp[$i][$j - 1] && $s2[$j - 1] == $s3[$i + $j - 1]) || 
                                    ($dp[$i - 1][$j] && $s1[$i - 1] == $s3[$i + $j - 1]);
            }
        }

        return $dp[$len1][$len2];
    }
}

// Accepted
// 101/101 cases passed (4 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.6 MB)
// @lc code=end

