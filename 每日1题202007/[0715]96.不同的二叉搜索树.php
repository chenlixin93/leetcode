<?php
/*
 * @lc app=leetcode.cn id=96 lang=php
 *
 * [96] 不同的二叉搜索树
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {

        $dp = [];
        $dp[0] = 1;// 空子树
        $dp[1] = 1;

        // 状态转移方程
        for ($i=2; $i <= $n; $i++) {
            $dp[$i] = 0;
            for ($j=1; $j <= $i; $j++) { 
                // BST，左子树的值小于根节点，右子树的值大于根节点
                // 尝试将 $i 范围内每个数都作为根节点，
                // 当前根节点能组成的 BST 数 = 左子树个数 * 右子树个数
                // 将这些结果累加，就得到 $dp[$i] 的结果
                $dp[$i] += $dp[$j - 1] * $dp[$i - $j];
            }
        }
        
        return $dp[$n];
    }
}

// Accepted
// 19/19 cases passed (8 ms)
// Your runtime beats 66.28 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

