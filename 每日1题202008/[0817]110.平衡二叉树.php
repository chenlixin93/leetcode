<?php
/*
 * @lc app=leetcode.cn id=110 lang=php
 *
 * [110] 平衡二叉树
 * 
 * https://leetcode-cn.com/problems/balanced-binary-tree/
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
     * @return Boolean
     */
    function isBalanced($root) {

        // 自顶向下
        if ($root == null) {
            return true;
        } else {
            return abs($this->height($root->left) - $this->height($root->right)) <= 1 && $this->isBalanced($root->left) && $this->isBalanced($root->right);
        }
    }

    function height($root) {
        if ($root == null) {
            return 0;
        } else {
            return max($this->height($root->left), $this->height($root->right)) + 1;
        }
    }
}

// Accepted
// 227/227 cases passed (24 ms)
// Your runtime beats 19.4 % of php submissions
// Your memory usage beats 69.7 % of php submissions (17 MB)
// @lc code=end

