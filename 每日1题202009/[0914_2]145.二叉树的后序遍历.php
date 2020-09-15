<?php
/*
 * @lc app=leetcode.cn id=145 lang=php
 *
 * [145] 二叉树的后序遍历
 * 
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/
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
     * @return Integer[]
     */
    function postorderTraversal($root) {
        
        // 与中序遍历解法类似，调整了入栈顺序
        $visited = 1;
        $not_visited = 0;
        $stack[] = [$not_visited, $root];
        $res = [];

        while (!empty($stack)) {
            $cur = array_pop($stack);

            if ($cur[1] == null) continue;

            if ($cur[0] == 0) {
                $stack[] = [$visited, $cur[1]];
                $stack[] = [$not_visited, $cur[1]->right];
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
// Your runtime beats 69.84 % of php submissions
// Your memory usage beats 26.41 % of php submissions (15 MB)
// @lc code=end

