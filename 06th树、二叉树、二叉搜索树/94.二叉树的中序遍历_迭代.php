<?php
/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
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
        
        $white = 0;
        $gray = 1;
        $stack[] = [$white, $root];
        $res = [];

        while (!empty($stack)) {
            $cur = array_pop($stack);
            
            if($cur[1] == null) continue;
            
            if($cur[0] == 0){
                $stack[] = [$white, $cur[1]->right];
                $stack[] = [$gray, $cur[1]];
                $stack[] = [$white, $cur[1]->left];
            }else{
                $res[] = $cur[1]->val;
            }
        }

        return $res;
    }
}

// Accepted
// 68/68 cases passed (4 ms)
// Your runtime beats 90.59 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

