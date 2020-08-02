<?php
/*
 * @lc app=leetcode.cn id=72 lang=php
 *
 * [72] 编辑距离
 * 
 * https://leetcode-cn.com/problems/edit-distance/
 */

// @lc code=start
class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        
        $m = strlen($word1);
        $n = strlen($word2);

        // dp[i][j] 表示前 i 个字符 == 前 j 个字符最小的操作步数
        $dp = [];
        $dp[0][0] = 0;

        // 代表 word1 删掉 i 个字符才能跟 word2 相等
        for ($i=1; $i <= $m; $i++) { 
            $dp[$i][0] = $i;
        }

        // 同理
        for ($j=1; $j <= $n; $j++) { 
            $dp[0][$j] = $j;
        }

        for ($i=1; $i <= $m; $i++) { 
            for ($j=1; $j <= $n; $j++) { 
                // String的下标是从0开始的，但是dp数组中的下标从一开始
                if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                }else{
                    // 在 word1[i] 后面插入 word2[j] 的字符，则 j 被匹配，word2 前移一位，继续比较
                    $insert = $dp[$i][$j - 1];
                    // 直接删除 word1[i]，word1 前移一位，继续比较
                    $delete = $dp[$i - 1][$j];
                    // 将 word1[i] 替换为 word2[j] 的字符，则两边都往前移动一位，继续比较
                    $replace = $dp[$i - 1][$j - 1];
                    // 取三者里最小操作次数，1代表执行该操作
                    $dp[$i][$j] = min($insert, $delete, $replace) + 1;
                }
            }
        }

        return $dp[$m][$n];
    }
}

// Accepted
// 1146/1146 cases passed (48 ms)
// Your runtime beats 81.08 % of php submissions
// Your memory usage beats 50 % of php submissions (22.8 MB)
// @lc code=end

