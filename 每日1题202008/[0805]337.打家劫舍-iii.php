<?php
/*
 * @lc app=leetcode.cn id=337 lang=php
 *
 * [337] 打家劫舍 III
 * 
 * https://leetcode-cn.com/problems/house-robber-iii/
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
     * @return Integer
     */
    function rob($root) {
        $root_status = $this->dfs($root);
        return max($root_status[0], $root_status[1]);
    }

    // dfs
    function dfs($node) {
        if ($node == null) return [0,0];

        $l = $this->dfs($node->left);
        $r = $this->dfs($node->right);

        // 选择当前节点时，子节点都不可以选择
        $selected = $node->val + $l[0] + $r[0];

        // 不选当前节点时，子节点都可以选择
        $not_selected = max($l[0], $l[1]) + max($r[0], $r[1]);

        return [$not_selected, $selected];
    }
}

// Accepted
// 124/124 cases passed (16 ms)
// Your runtime beats 76.47 % of php submissions
// Your memory usage beats 100 % of php submissions (17 MB)
// @lc code=end

