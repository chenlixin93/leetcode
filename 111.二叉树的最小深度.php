<?php
/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
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
    function minDepth($root) {
        
        if($root == null) return 0;

        if($root->left == null && $root->right == null) return 1;

        $min_depth  = PHP_INT_MAX;
        if($root->left != null) {
            $min_depth = min($this->minDepth($root->left), $min_depth);
        }
        
        if($root->right != null) {
            $min_depth = min($this->minDepth($root->right), $min_depth);
        }

        return $min_depth + 1;
    }
}
// @lc code=end

