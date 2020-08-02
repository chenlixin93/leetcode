<?php
/*
 * @lc app=leetcode.cn id=114 lang=php
 *
 * [114] 二叉树展开为链表
 * 
 * https://leetcode-cn.com/problems/flatten-binary-tree-to-linked-list/
 * 参考 https://leetcode-cn.com/problems/flatten-binary-tree-to-linked-list/solution/xiang-xi-tong-su-de-si-lu-fen-xi-duo-jie-fa-by--26/
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
     * @return NULL
     */
    function flatten($root) {
        
        while ($root != null) {
            if ($root->left != null) {
                // 找到左子树最右边的节点
                $pre = $root->left;
                while ($pre->right != null) {
                    $pre = $pre->right;
                }

                // 将原来的右子树接到左子树的最右边节点
                $pre->right = $root->right;
                $root->right = $root->left;
                $root->left = null;
            }

            // 考虑下一个节点
            $root = $root->right;
        }
    }
}

// Accepted
// 225/225 cases passed (8 ms)
// Your runtime beats 88.24 % of php submissions
// Your memory usage beats 25 % of php submissions (15.3 MB)
// @lc code=end

