<?php
/*
 * @lc app=leetcode.cn id=95 lang=php
 *
 * [95] 不同的二叉搜索树 II
 * 
 * https://leetcode-cn.com/problems/unique-binary-search-trees-ii/
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function generateTrees($n) {

        $tree = new TreeNode();
        if($n == 0) return [];

        $ans = $this->helper(1, $n);
        return $ans;
    }

    function helper($start, $end) {
        $res = [];

        // 没有数字
        if($start > $end) {
            $res[] = null;
            return $res;
        }

        // 只有一个数字
        if($start == $end) {
            $tree = new TreeNode($start);
            $res[] = $tree;
            return $res;
        }

        // 将每个数字作为根节点
        for ($i=$start; $i <= $end; $i++) { 
            // 得到所有可能的左子树
            $left = $this->helper($start, $i - 1);
            // 得到所有可能的右子树
            $right = $this->helper($i + 1, $end);

            foreach ($left as $l) {
                foreach ($right as $r) {
                    $tree = new TreeNode($i);
                    $tree->left = $l;
                    $tree->right = $r;

                    $res[] = $tree;
                }
            }
        }

        return $res;
    }
}

// Accepted
// 9/9 cases passed (8 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (16.6 MB)
// @lc code=end

