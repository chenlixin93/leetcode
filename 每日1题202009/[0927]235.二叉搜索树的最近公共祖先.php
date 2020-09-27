<?
/*
 * @lc app=leetcode.cn id=235 lang=php
 *
 * [235] 二叉搜索树的最近公共祖先
 * 
 * https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-search-tree/
 * 参考题解 https://zxi.mytechroad.com/blog/tree/leetcode-235-lowest-common-ancestor-of-a-binary-search-tree/
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
        // 二叉搜索树的特征，左子树节点值 <= 中间节点值 <= 右子树节点值

        // 如果两者都小于根节点的值，那么搜索它的左子树
        if ($p->val < $root->val && $q->val < $root->val) {
            return $this->lowestCommonAncestor($root->left, $p, $q);
        }

        // 如果两者都大于根节点的值，那么搜索它的右子树
        if ($p->val > $root->val && $q->val > $root->val) {
            return $this->lowestCommonAncestor($root->right, $p, $q);
        }

        // 一大一小、一大于一相等、一小于一相等，那么返回当前根节点
        return $root;
    }
}

// Accepted
// 27/27 cases passed (32 ms)
// Your runtime beats 97.62 % of php submissions
// Your memory usage beats 32.61 % of php submissions (18.1 MB)
// @lc code=end

