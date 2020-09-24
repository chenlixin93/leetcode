<?php
/*
 * @lc app=leetcode.cn id=501 lang=php
 *
 * [501] 二叉搜索树中的众数
 * 
 * https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/
 * 参考题解 https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/solution/er-cha-sou-suo-shu-zhong-de-zhong-shu-by-leetcode-/
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

    protected $base;
    protected $count;
    protected $maxCount;
    protected $answer;

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function findMode($root) {

        $this->base = 0;
        $this->count = 0;
        $this->maxCount = 0;
        $this->answer = [];

        $cur = $root;
        $pre = null;

        while ($cur != null) {
            if ($cur->left == null) {
                $this->update($cur->val);
                $cur = $cur->right;
                continue;
            }

            $pre = $cur->left;
            while ($pre->right != null && $pre->right != $cur) {
                $pre = $pre->right;
            }

            if ($pre->right == null) {
                $pre->right = $cur;
                $cur = $cur->left;
            } else {
                $pre->right = null;
                $this->update($cur->val);
                $cur = $cur->right;
            }
        }

        $mode = array_fill(0, count($this->answer), 0);
        for ($i=0; $i < count($this->answer); $i++) { 
            $mode[$i] = $this->answer[$i];
        }
        return $mode;
    }

    function update($x) {

        if ($x == $this->base) {
            $this->count++;
        } else {
            $this->count = 1;
            $this->base = $x;
        }

        if ($this->count == $this->maxCount) {
            $this->answer[] = $this->base;
        }

        if ($this->count > $this->maxCount) {
            $this->maxCount = $this->count;
            $this->answer = [];
            $this->answer[] = $this->base;
        }
    }
}

// Accepted
// 25/25 cases passed (24 ms)
// Your runtime beats 93.33 % of php submissions
// Your memory usage beats 38.46 % of php submissions (18.3 MB)
// @lc code=end

