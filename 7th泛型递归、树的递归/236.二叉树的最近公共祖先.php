<?php
/*
 * @lc app=leetcode.cn id=236 lang=php
 *
 * [236] 二叉树的最近公共祖先
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        
        if($root == null || $root==$p || $root==$q) return $root;

        $left = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        // 左右非空，则返回当前节点
        if($left && $right) return $root;

        // 从是否在一颗子树角度想就很好理解，在不同子树时就返回root就好，当p为q的祖先节点时，搜索一侧子树只能返回p，
        // 这时候搜另一边是搜不到q的，但节点又一定在树中，所以一定是p是q的祖先的情况，直接返回p即为答案
        return $left ? $left : $right;
    }
}

// Accepted
// 31/31 cases passed (32 ms)
// Your runtime beats 59.68 % of php submissions
// Your memory usage beats 100 % of php submissions (21.4 MB)
// @lc code=end

