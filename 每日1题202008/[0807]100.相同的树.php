<?php
/*
 * @lc app=leetcode.cn id=100 lang=php
 *
 * [100] 相同的树
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        
        if($p == null && $q == null) return true;
        if($p == null || $q == null) return false;
        if($q->val != $p->val) return false;

        return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}

// Accepted
// 59/59 cases passed (4 ms)
// Your runtime beats 92.77 % of php submissions
// Your memory usage beats 8.33 % of php submissions (15.2 MB)
// @lc code=end

