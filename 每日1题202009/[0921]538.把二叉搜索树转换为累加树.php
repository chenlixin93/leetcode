<?php
/*
 * @lc app=leetcode.cn id=538 lang=php
 *
 * [538] 把二叉搜索树转换为累加树
 * 
 * https://leetcode-cn.com/problems/convert-bst-to-greater-tree/
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

    public $sum;

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function convertBST($root) {
        
        // 中序遍历是递增序列，反向中序就是递减序列，最小的值就能累加到前面大于子集的数
        if ($root != null) {
            $this->convertBST($root->right);
            $this->sum += $root->val;
            $root->val = $this->sum;
            $this->convertBST($root->left);
        }

        return $root;
    }
}

// Accepted
// 212/212 cases passed (28 ms)
// Your runtime beats 69.23 % of php submissions
// Your memory usage beats 8.82 % of php submissions (18.3 MB)
// @lc code=end

