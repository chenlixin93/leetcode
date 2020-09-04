<?php
/*
 * @lc app=leetcode.cn id=257 lang=php
 *
 * [257] 二叉树的所有路径
 * 
 * https://leetcode-cn.com/problems/binary-tree-paths/
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

    protected $arr;
    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {

        if ($root == null) return []; 

        $this->dfs($root, "");
        return $this->arr;
    }

    function dfs($root, $tmp) {

        if ($root != null) {
            $tmp = ($tmp == "") ? (string)$root->val : $tmp."->".$root->val;
            if ($root->left == null && $root->right == null) {
                $this->arr[] = $tmp;
            } else {
                $this->dfs($root->left, $tmp);
                $this->dfs($root->right, $tmp);
            }
        }
    }
}

// Accepted
// 209/209 cases passed (12 ms)
// Your runtime beats 17.14 % of php submissions
// Your memory usage beats 7.14 % of php submissions (15.1 MB)
// @lc code=end

