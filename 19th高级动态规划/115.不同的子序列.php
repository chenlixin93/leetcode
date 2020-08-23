<?php
/*
 * @lc app=leetcode.cn id=115 lang=php
 *
 * [115] 不同的子序列
 * 
 * https://leetcode-cn.com/problems/distinct-subsequences/
 * 视频讲解 https://www.bilibili.com/video/BV1EW411d7PC?from=search&seid=14147502338216644722
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function numDistinct($s, $t) {
        
        $lt = strlen($t); // 短串
        $ls = strlen($s); // 长串

        // 加一位，方便递推输出结果
        $dp = array_fill(0, $lt + 1, array_fill(0, $ls + 1, 0));

        // 初始化
        for ($i=0; $i < $ls + 1; $i++) { 
            $dp[0][$i] = 1; // 表示当 T 为空字符串时，无论 S 长度多少，构成 T 都只有一种情况
        }

        for ($i=1; $i < $lt + 1; $i++) { 
            for ($j=1; $j < $ls + 1; $j++) { 
                if ($t[$i - 1] == $s[$j - 1]) {
                    // 当前两个字符相等时，可以选择使用第 j 位字符去匹配 i, 那么接下来就需要 S 的前 j - 1 位去匹配 T 的前 i - 1 位
                    // 也可以选择不使用第 j 位字符去匹配 i，那么它只能用S 的前 j - 1 位去匹配 T 的前 i 位
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + $dp[$i][$j - 1];
                } else {
                    // 当前两个字符不等时，只能是舍弃 S 的第 j 位，使用前 j - 1位去匹配 T 的前 i 位
                    $dp[$i][$j] = $dp[$i][$j - 1];
                }
            }
        }

        return $dp[$lt][$ls];
    }
}

// Accepted
// 63/63 cases passed (48 ms)
// Your runtime beats 80 % of php submissions
// Your memory usage beats 100 % of php submissions (31.9 MB)
// @lc code=end

