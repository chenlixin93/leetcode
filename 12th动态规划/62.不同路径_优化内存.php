<?php
/*
 * @lc app=leetcode.cn id=62 lang=php
 *
 * [62] 不同路径
 * 
 * https://leetcode-cn.com/problems/unique-paths/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        
        // m 为列长
        // 初始化第一行的路径数
        $cur = array_fill(0, $m, 1);

        // 从第二行开始计算
        for ($i=1; $i < $n; $i++) { 
            for ($j=1; $j < $m; $j++) { 
                // 当前 $cur[$j] 实际上就是二维解法时的 $dp[$i - 1][$j]
                // 当前 $cur[$j - 1] 则是 $dp[$i][$j - 1]
                $cur[$j] = $cur[$j] + $cur[$j - 1];
            }
        }

        return $cur[$m - 1];
    }
}

// 不太靠谱的运行结果，有时候比正常DP的解法还慢
// Accepted
// 62/62 cases passed (4 ms)
// Your runtime beats 88.76 % of php submissions
// Your memory usage beats 100 % of php submissions (14.7 MB)
// @lc code=end

