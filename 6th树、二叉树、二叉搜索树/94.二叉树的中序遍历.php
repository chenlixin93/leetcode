<?php
/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
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
     * @return Integer[]
     */
    function inorderTraversal($root) {
        
        $result = [];
        $this->inorder($root, $result);

        return $result;

    }

    function inorder($root, &$result){

        if($root->left != null){
            $this->inorder($root->left, $result);
        }

        $result[] = $root->val;

        if($root->right != null){
            $this->inorder($root->right, $result);
        }
    }
}

// Accepted
// 68/68 cases passed (8 ms)
// Your runtime beats 57.14 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

