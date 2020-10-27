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
        // 不使用数组存放节点的做法
        $l = 0;
        $cur = $head;
        while ($cur) {
            $l++;
            $cur = $cur->next;
        }

        if ($n == $l) {
            return $head->next;
        }

        $l = $l - $n;
        $cur = $head;
        while (--$l) {
            $cur = $cur->next; // 需要删除结点的前一个
        }
        $node = $cur->next; // 需要删除的结点
        $cur->next = $node->next; // 需要删除的结点的后一个
        return $head;
    }
}

// Accepted
// 208/208 cases passed (12 ms)
// Your runtime beats 27.11 % of php submissions
// Your memory usage beats 16.07 % of php submissions (15.3 MB)
// @lc code=end

