<?php
/*
 * @lc app=leetcode.cn id=106 lang=php
 *
 * [106] 从中序与后序遍历序列构造二叉树
 * 
 * https://leetcode-cn.com/problems/construct-binary-tree-from-inorder-and-postorder-traversal/
 * 参考题解 https://zxi.mytechroad.com/blog/tree/leetcode-106-construct-binary-tree-from-inorder-and-postorder-traversal/
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

    protected $pos;
    protected $inorder;
    protected $postorde;

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {

        $this->inorder = $inorder;
        $this->postorder = $postorder;

        $this->pos = [];
        for ($i=0; $i < count($inorder); $i++) { 
            $this->pos[$this->inorder[$i]] = $i;
        }

        return $this->buildTreeHelper(0, count($inorder) - 1, 0, count($postorder) - 1);
    }

    function buildTreeHelper($is, $ie, $ps, $pe) {
        if ($ps > $pe) return null;

        $im = $this->pos[$this->postorder[$pe]];
        $pm = $ps + ($im - $is) - 1;

        $root = new TreeNode($this->postorder[$pe]);
        $root->left = $this->buildTreeHelper($is, $im - 1, $ps, $pm);
        $root->right = $this->buildTreeHelper($im + 1, $ie, $pm + 1, $pe - 1);

        return $root;
    }
}

// Accepted
// 203/203 cases passed (12 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 82.14 % of php submissions (16.8 MB)
// @lc code=end

