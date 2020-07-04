<?php
/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
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

        $white = 0;
        $gray = 1;
        $stack[] = [$white, $root];
        $res = [];

        while (!empty($stack)) {
            $cur = array_pop($stack);
            
            if($cur[1] == null) continue;
            
            if($cur[0] == $white){
                $stack[] = [$white, $cur[1]->right];
                $stack[] = [$white, $cur[1]->left];
                $stack[] = [$gray, $cur[1]];
            }else{
                $res[] = $cur[1]->val;
            }
        }

        return $res;
    }
}

// Accepted
// 68/68 cases passed (4 ms)
// Your runtime beats 95.18 % of php submissions
// Your memory usage beats 100 % of php submissions (14.6 MB)
// @lc code=end

