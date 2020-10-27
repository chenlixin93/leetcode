<?php
/*
 * @lc app=leetcode.cn id=19 lang=php
 *
 * [19] 删除链表的倒数第N个节点
 * 
 * https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/
 * 参考题解 https://zxi.mytechroad.com/blog/list/leetcode-19-remove-nth-node-from-end-of-list/
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
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        if (!$head) return null;

        $nodes = [];
        $cur = $head;
        while ($cur) {
            $nodes[] = $cur;
            $cur = $cur->next;
        }

        // 链表长度 == n
        $size = count($nodes);
        if ($n == $size) return $head->next;

        // 找到需要删除的结点  
        $node_to_remove = $nodes[$size - $n];
        // 找到被删除的结点的前一个节点
        $parent = $nodes[$size - $n - 1];
        // 将 next 指针指向被删除的结点的 next 指针
        $parent->next = $node_to_remove->next;

        return $head;
    }
}

// Accepted
// 208/208 cases passed (8 ms)
// Your runtime beats 71.79 % of php submissions
// Your memory usage beats 30.52 % of php submissions (15 MB)
// @lc code=end

