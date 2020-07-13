<?php
/*
 * @lc app=leetcode.cn id=102 lang=php
 *
 * [102] 二叉树的层序遍历
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
     * @return Integer[][]
     */
    function levelOrder($root) {
        
        if($root == null) return [];

        $res = [];
        $queue = [];
        array_push($queue, $root);

        while ($n = count($queue)) {

            $tmp = [];

            for ($i=0; $i < $n; $i++) { 

                // 先进先出
                $cur = array_shift($queue);
                $tmp[] = $cur->val;

                if($cur->left != null) array_push($queue, $cur->left);
                if($cur->right != null) array_push($queue, $cur->right);
            }
            
            $res[] = $tmp;
        }

        return $res;
    }
}

// Accepted
// 34/34 cases passed (8 ms)
// Your runtime beats 87.32 % of php submissions
// Your memory usage beats 100 % of php submissions (15.5 MB)
// @lc code=end

