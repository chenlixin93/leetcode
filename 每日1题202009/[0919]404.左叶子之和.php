<?php
/*
 * @lc app=leetcode.cn id=404 lang=php
 *
 * [404] 左叶子之和
 * 
 * https://leetcode-cn.com/problems/sum-of-left-leaves/
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
     * @return Integer
     */
    function sumOfLeftLeaves($root) {
        
        if ($root == null) return 0;

        $res = 0;
        $this->dfs($root, $res);
        return $res;
    }

    function dfs($root, &$res) {
        
        if ($root->left != null) {
            $res += $this->isLeafNode($root->left) ? $root->left->val : $this->dfs($root->left, $res);
        }

        if ($root->right != null && !$this->isLeafNode($root->right)) {
            $res += $this->dfs($root->right, $res);
        }
    }

    // 判断是否叶子节点
    function isLeafNode($node) {
        
        if ($node->left == null && $node->right == null) {
            return true;
        }

        return false;
    }
}

// Accepted
// 102/102 cases passed (8 ms)
// Your runtime beats 67.74 % of php submissions
// Your memory usage beats 18.18 % of php submissions (15.2 MB)
// @lc code=end

