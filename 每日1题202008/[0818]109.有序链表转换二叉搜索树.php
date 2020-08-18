<?php
/*
 * @lc app=leetcode.cn id=109 lang=php
 *
 * [109] 有序链表转换二叉搜索树
 * 
 * https://leetcode-cn.com/problems/convert-sorted-list-to-binary-search-tree/
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head) {
        if ($head == null) {
            return null;
        }

        if ($head->next == null) {
            return new TreeNode($head->val);
        }

        $slow = $head;
        $fast = $head;
        $pre = null;
        while ($fast != null && $fast->next != null) { 
            // 快指针是慢指针的两倍速率，所以快指针达到尾结点时，慢指针到达中间节点
            $pre = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // 断开链表
        $pre->next = null;

        // 以升序链表的中间元素作为根节点 root，递归的构建 root 的左子树与右子树
        $root = new TreeNode($slow->val);
        $root->left = $this->sortedListToBST($head);
        $root->right = $this->sortedListToBST($slow->next);

        return $root;
    }
}

// Accepted
// 32/32 cases passed (28 ms)
// Your runtime beats 73.17 % of php submissions
// Your memory usage beats 94.74 % of php submissions (21 MB)
// @lc code=end

