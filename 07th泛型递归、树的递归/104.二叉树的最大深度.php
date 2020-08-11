<?php
/*
 * @lc app=leetcode.cn id=104 lang=php
 *
 * [104] 二叉树的最大深度
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

        $left = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);

        return max($left, $right) + 1;
    }
}

// Accepted
// 39/39 cases passed (16 ms)
// Your runtime beats 39.45 % of php submissions
// Your memory usage beats 100 % of php submissions (16.9 MB)
// @lc code=end

