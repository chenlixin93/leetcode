<?php
/*
 * @lc app=leetcode.cn id=105 lang=php
 *
 * [105] 从前序与中序遍历序列构造二叉树
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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {

        return $this->helper($preorder, 0, count($preorder), $inorder, 0, count($inorder));
    }

    function helper($preorder, $p_start, $p_end, $inorder, $i_start, $i_end) {

        // preorder 为空，直接返回 null
        if($p_start == $p_end) {
            return null;
        }

        $root_val = $preorder[$p_start];
        $root = new TreeNode($root_val);

        // 在中序遍历中找到根节点的位置
        $i_root_index = 0;
        for ($i=$i_start; $i < $i_end; $i++) { 
            if($root_val == $inorder[$i]){
                $i_root_index = $i;
                break;
            }
        }

        // 左子树的节点数
        $left_num = $i_root_index - $i_start;

        $root->left = $this->helper($preorder, $p_start + 1, $p_start + 1 + $left_num, $inorder, $i_start, $i_root_index);
        $root->right = $this->helper($preorder, $p_start + 1 + $left_num, $p_end, $inorder, $i_root_index + 1, $i_end);

        return $root;
    }
}

// Accepted
// 203/203 cases passed (72 ms)
// Your runtime beats 59.85 % of php submissions
// Your memory usage beats 100 % of php submissions (17.9 MB)
// @lc code=end

