<?php
/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
 * 
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/
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
     * @return Integer[]
     */
    function inorderTraversal($root) {
        
        $visited = 1;
        $not_visited = 0;
        $stack[] = [$not_visited, $root];
        $res = [];

        while (!empty($stack)) {
            $cur = array_pop($stack);

            if ($cur[1] == null) continue;

            if ($cur[0] == 0) {
                $stack[] = [$not_visited, $cur[1]->right];
                $stack[] = [$visited, $cur[1]];
                $stack[] = [$not_visited, $cur[1]->left];
            } else {
                $res[] = $cur[1]->val;
            }
        }

        return $res;
    }
}

// Accepted
// 68/68 cases passed (8 ms)
// Your runtime beats 61.32 % of php submissions
// Your memory usage beats 33.62 % of php submissions (15 MB)
// @lc code=end

