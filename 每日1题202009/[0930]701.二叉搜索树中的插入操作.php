<?php
/*
 * @lc app=leetcode.cn id=701 lang=php
 *
 * [701] 二叉搜索树中的插入操作
 * 
 * 
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {

        if ($root == null) return new TreeNode($val);

        $this->helper($root, $val);
        return $root;
    }

    function helper(&$root, $val) {

        if ($root->val > $val) {
            if ($root->left == null) {
                $root->left = new TreeNode($val);
                return true;
            }
            $this->helper($root->left, $val);
        }

        if ($root->val < $val) {
            if ($root->right == null) {
                $root->right = new TreeNode($val);
                return true;
            }
            $this->helper($root->right, $val);
        }

    }
}

// Accepted
// 35/35 cases passed (44 ms)
// Your runtime beats 88 % of php submissions
// Your memory usage beats 50 % of php submissions (16.8 MB)
// @lc code=end

