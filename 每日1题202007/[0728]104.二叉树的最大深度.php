<?php
/*
 * @lc app=leetcode.cn id=104 lang=php
 *
 * [104] 二叉树的最大深度
 * 
 * https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/
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
    function maxDepth($root) {
        
        if($root == null) {
            return 0;
        }

        if($root->left == null && $root->right == null) {
            return 1;
        }

        if($root->left != null) {
            $left = $this->maxDepth($root->left);
        }

        if($root->right != null) {
            $right = $this->maxDepth($root->right);
        }

        return max($left, $right) + 1;
    }
}
// @lc code=end

