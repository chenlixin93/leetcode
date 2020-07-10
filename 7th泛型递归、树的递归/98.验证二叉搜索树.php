<?php
/*
 * @lc app=leetcode.cn id=98 lang=php
 *
 * [98] 验证二叉搜索树
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
     * @return Boolean
     */
    function isValidBST($root) {

        if($root == null) {
            return true;
        }

        // 初始标志
        $flag = true;
        // 初始父节点值
        $last = PHP_INT_MIN;
        return $this->helper($root, $flag, $last);
    }

    function helper($root, &$flag, &$last) {

        if($flag && $root->left) {
            $this->helper($root->left, $flag, $last);
        }

        // 遍历完左子树，得到上一个节点
        if($root->val <= $last){
            $flag = false;
        }

        // 当前符合条件，更新last
        $last = $root->val;

        // 遍历右子树是否符合条件
        if($flag && $root->right) {
            $this->helper($root->right, $flag, $last);
        }

        return $flag;
    }
}

// Accepted
// 75/75 cases passed (16 ms)
// Your runtime beats 65.8 % of php submissions
// Your memory usage beats 100 % of php submissions (17.7 MB)
// @lc code=end

