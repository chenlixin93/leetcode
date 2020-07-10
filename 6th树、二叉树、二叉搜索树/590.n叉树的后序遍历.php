<?php
/*
 * @lc app=leetcode.cn id=590 lang=php
 *
 * [590] N叉树的后序遍历
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
    function postorder($root) {

        $res = [];
        $this->backorder($root, $res);
        $res[] = $root->val;
        return $res;
    }

    function backorder($root, &$res) {

        if($root == null) return;

        foreach ($root->children as $child) {
            $this->backorder($child, $res);
            $res[] = $child->val;
        }
    }
}

// Accepted
// 37/37 cases passed (16 ms)
// Your runtime beats 71.43 % of php submissions
// Your memory usage beats 100 % of php submissions (18.6 MB)
// @lc code=end

