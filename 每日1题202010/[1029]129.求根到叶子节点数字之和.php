<?php
/*
 * @lc app=leetcode.cn id=129 lang=php
 *
 * [129] 求根到叶子节点数字之和
 * 
 * https://leetcode-cn.com/problems/sum-root-to-leaf-numbers/
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

    protected $ans;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root) {

        if ($root == null) return 0;

        $this->ans = 0;
        $this->helper($root, 0);
        return $this->ans;
    }

    function helper($t, $num) {

        if ($t == null) return true;

        $num = 10 * $num + $t->val; // 1->2->3 == 123
        if ($t->left == null && $t->right == null) { // 叶子节点时退出
            $this->ans += $num;
        } else {
            $this->helper($t->left, $num); 
            $this->helper($t->right, $num);
        }
    }
}

// Accepted
// 110/110 cases passed (8 ms)
// Your runtime beats 64.71 % of php submissions
// Your memory usage beats 25 % of php submissions (15.6 MB)
// @lc code=end

