<?php
/*
 * @lc app=leetcode.cn id=226 lang=php
 *
 * [226] 翻转二叉树
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
     * @return TreeNode
     */
    function invertTree($root) {

        if($root == null) return null;

        $right = $this->invertTree($root->right);
        $left = $this->invertTree($root->left);

        $root->right = $left;
        $root->left = $right;

        return $root;
    }
}
// @lc code=end

