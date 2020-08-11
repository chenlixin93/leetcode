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

        // 利用后序遍历与前序遍历结果类似，顺序入栈子节点v1 v2 v3，出栈的时候v3 v2 v1
        // 最后结果反转还是保持 v1 v2 v3

        $res = [];
        $stack = [$root];

        while (!empty($stack)) {
            $root = array_pop($stack);

            if($root != null){
                $res[] = $root->val;
            }

            foreach ($root->children as $child) {
                $stack[] = $child;
            }
        }

        return array_reverse($res);
    }
}

// Accepted
// 37/37 cases passed (12 ms)
// Your runtime beats 92.86 % of php submissions
// Your memory usage beats 100 % of php submissions (18.6 MB)
// @lc code=end

