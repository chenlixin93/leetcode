<?php
/*
 * @lc app=leetcode.cn id=501 lang=php
 *
 * [501] 二叉搜索树中的众数
 * 
 * https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/
 * 参考题解 https://zxi.mytechroad.com/blog/tree/leetcode-501-find-mode-in-binary-search-tree/
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

    protected $val_; // 记录最近重复的值
    protected $count_; //记录最近重复的值出现次数
    protected $max_count_; // 更新当前重复次数最多
    protected $ans_; // 结果集

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function findMode($root) {

        $this->val_ = 0;
        $this->count_ = 0;
        $this->max_count_ = 0;
        $this->ans_ = [];

        $this->inorder($root);
        return $this->ans_;
    }

    // 中序遍历
    function inorder($root) {
        if ($root == null) return true;

        $this->inorder($root->left);
        $this->visit($root->val);
        $this->inorder($root->right);
    }

    // 统计
    function visit($val) {

        // 统计最近重复的值
        if ($this->count_ >  0 && $val == $this->val_) {
            $this->count_++;
        } else {
            $this->val_ = $val;
            $this->count_ = 1;
        }

        // 如果最近重复次数超过前面记录的最大值，则清空结果集
        if ($this->count_ > $this->max_count_) {
            $this->max_count_ = $this->count_;
            $this->ans_ = [];
        }

        // 如果最近重复次数等于前面记录最大值，则加入结果集
        if ($this->count_ == $this->max_count_) {
            $this->ans_[] = $val;
        }
    }
}

// Accepted
// 25/25 cases passed (24 ms)
// Your runtime beats 93.33 % of php submissions
// Your memory usage beats 76.92 % of php submissions (18 MB)
// @lc code=end