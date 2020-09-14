<?php
/*
 * @lc app=leetcode.cn id=107 lang=php
 *
 * [107] 二叉树的层次遍历 II
 * 
 * https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii/
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root) {

        // 使用辅助队列，先进先出
        $queue = [];
        array_push($queue, [0, $root]);
        $res = [];

        while (!empty($queue)) {
            $cur = array_shift($queue);

            if ($cur[1] == null) continue;
            $res[$cur[0]][] = $cur[1]->val;

            array_push($queue, [$cur[0] + 1, $cur[1]->left]);
            array_push($queue, [$cur[0] + 1, $cur[1]->right]);
        }

        return array_reverse($res);
    }
}

// Accepted
// 34/34 cases passed (8 ms)
// Your runtime beats 87.5 % of php submissions
// Your memory usage beats 39.03 % of php submissions (15.7 MB)
// @lc code=end

