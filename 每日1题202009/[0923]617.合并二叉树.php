<?php
/*
 * @lc app=leetcode.cn id=617 lang=php
 *
 * [617] 合并二叉树
 * 
 * https://leetcode-cn.com/problems/merge-two-binary-trees/
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
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees($t1, $t2) {

        if ($t1 == null) return $t2;
        if ($t2 == null) return $t1;

        $root = $t1;
        $root->val += $t2->val;

        $root->left = $this->mergeTrees($t1->left, $t2->left);
        $root->right = $this->mergeTrees($t1->right, $t2->right);

        return $root;
    }
}

// Accepted
// 183/183 cases passed (24 ms)
// Your runtime beats 89.86 % of php submissions
// Your memory usage beats 81.58 % of php submissions (15.2 MB)
// @lc code=end