<?php
/*
 * @lc app=leetcode.cn id=589 lang=php
 *
 * [589] N叉树的前序遍历
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        
        $res = [$root->val];
        $this->backorder($root, $res);
        return $res;
    }

    function backorder($root, &$res) {

        if($root == null) return;

        foreach ($root->children as $child) {
            $res[] = $child->val;
            $this->backorder($child, $res);
        }
    }
}

// Accepted
// 37/37 cases passed (16 ms)
// Your runtime beats 73.61 % of php submissions
// Your memory usage beats 100 % of php submissions (18.7 MB)
// @lc code=end

