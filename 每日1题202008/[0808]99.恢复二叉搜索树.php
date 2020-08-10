<?php
/*
 * @lc app=leetcode.cn id=99 lang=php
 *
 * [99] 恢复二叉搜索树
 * 
 * https://leetcode-cn.com/problems/recover-binary-search-tree/
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

    protected $t1;
    protected $t2;
    protected $pre;

    /**
     * @param TreeNode $root
     * @return NULL
     */
    function recoverTree($root) {

        // 中序遍历，左根右一定是从小到大，出现前者比后者大的时候，记录该位置，最终交换两个点
        $this->inorder($root);

        $temp = $this->t1->val;
        $this->t1->val = $this->t2->val;
        $this->t2->val = $temp;
    }

    function inorder($root) {

        if ($root == null) return true;

        $this->inorder($root->left);

        if ($this->pre != null && $this->pre->val > $root->val) {
            if ($this->t1 == null) {
                $this->t1 = $this->pre;
            }
            $this->t2 = $root;
        }

        $this->pre = $root;
        $this->inorder($root->right);
    }
}

// Accepted
// 1917/1917 cases passed (24 ms)
// Your runtime beats 66.67 % of php submissions
// Your memory usage beats 100 % of php submissions (15.4 MB)
// @lc code=end

