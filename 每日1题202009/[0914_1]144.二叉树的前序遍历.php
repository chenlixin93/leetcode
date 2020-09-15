<?php
/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
 * 
 * https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
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
    function preorderTraversal($root) {

        // 与中序遍历解法类似，调整了入栈顺序
        $visited = 1;
        $not_visited = 0;
        $stack[] = [$not_visited, $root];
        $res = [];

        while (!empty($stack)) {
            $cur = array_pop($stack);

            if ($cur[1] == null) continue;

            if ($cur[0] == 0) {
                $stack[] = [$not_visited, $cur[1]->right];
                $stack[] = [$not_visited, $cur[1]->left];
                $stack[] = [$visited, $cur[1]];
            } else {
                $res[] = $cur[1]->val;
            }
        }

        return $res;
    }
}

// Accepted
// 68/68 cases passed (4 ms)
// Your runtime beats 96.91 % of php submissions
// Your memory usage beats 56.43 % of php submissions (14.9 MB)
// @lc code=end

