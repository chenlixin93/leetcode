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

        $map = [];
        // 没有重复元素
        foreach($inorder as $k => $v){
            $map['V_'.$v] = $k;
        }

        return $this->helper($preorder, 0, count($preorder), $inorder, 0, count($inorder), $map);
    }

    function helper($preorder, $p_start, $p_end, $inorder, $i_start, $i_end, $map) {

        // preorder 为空，直接返回 null
        if($p_start == $p_end) {
            return null;
        }

        $root_val = $preorder[$p_start];
        $root = new TreeNode($root_val);

        // 从map中取出根节点下标
        $i_root_index = $map['V_'.$root_val];

        // 左子树的节点数
        $left_num = $i_root_index - $i_start;

        $root->left = $this->helper($preorder, $p_start + 1, $p_start + 1 + $left_num, $inorder, $i_start, $i_root_index, $map);
        $root->right = $this->helper($preorder, $p_start + 1 + $left_num, $p_end, $inorder, $i_root_index + 1, $i_end, $map);

        return $root;
    }
}

// Accepted
// 203/203 cases passed (12 ms)
// Your runtime beats 97.81 % of php submissions
// Your memory usage beats 100 % of php submissions (17.6 MB)
// @lc code=end

