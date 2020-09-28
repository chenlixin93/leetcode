<?php
/*
 * @lc app=leetcode.cn id=117 lang=php
 *
 * [117] 填充每个节点的下一个右侧节点指针 II
 * 
 * https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node-ii/
 * 参考题解 https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node-ii/solution/bfsjie-jue-zui-hao-de-ji-bai-liao-100de-yong-hu-by/
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if ($root == null) $root;

        $cur = $root;
        // 把每一层看成一个链表，遍历每一层 
        while ($cur != null) {
            $dummy = new Node(0);
            // 下一层节点的前一个节点(虚拟）
            $pre = $dummy;

            // 遍历当前层的链表（从左往右，将下一层串联起来）
            while ($cur != null) {
                if ($cur->left != null) {
                    $pre->next = $cur->left;
                    $pre = $pre->next;
                }
                if ($cur->right != null) {
                    $pre->next = $cur->right;
                    $pre = $pre->next;
                }
                // 继续访问当前层的下一个节点
                $cur = $cur->next;
            }

            // 遍历下一层，下一层节点的首个节点(真实）
            $cur = $dummy->next; 
        }

        return $root;
    }
}

// Accepted
// 55/55 cases passed (8 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 76.92 % of php submissions (17.7 MB)
// @lc code=end

