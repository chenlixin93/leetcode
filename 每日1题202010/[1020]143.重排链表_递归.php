<?php
/*
 * @lc app=leetcode.cn id=143 lang=php
 *
 * [143] 重排链表
 * 
 * https://leetcode-cn.com/problems/reorder-list/
 * 参考题解 https://leetcode-cn.com/problems/reorder-list/solution/xiang-xi-tong-su-de-si-lu-fen-xi-duo-jie-fa-by-34/
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
     * @return NULL
     */
    function reorderList($head) {

        if ($head == null  && $head->next == null && $head->next->next == null){
            return null;
        }

        $len = 0;
        $h = $head;
        while ($h != null) {
            $len++;
            $h = $h->next;
        }

        $this->helper($head, $len);
    }

    // 返回当前头元素对应的尾元素
    // L1->Ln->L2->Ln-1 ....
    // ==>
    // L1->Ln-> reorderList(L2, ... Ln-1)
    function helper($head, $len) {

        if ($len == 1) {
            $out_tail = $head->next;
            $head->next = null;
            return $out_tail;
        }

        if ($len == 2) {
            $out_tail = $head->next->next;
            $head->next->next = null;
            return $out_tail;
        }

        // 例子1->2->3->4->5
        // 看最内层和倒数第二层
        $tail = $this->helper($head->next, $len - 2); // 最内层返回 4
        $sub_head = $head->next; // 中间链表的头结点 // 3
        $head->next = $tail; // 2->4

        $out_tail = $tail->next; // 5
        $tail->next = $sub_head; // 4->3
        return $out_tail; // 5
    }
}

// Accepted
// 13/13 cases passed (32 ms)
// Your runtime beats 68.69 % of php submissions
// Your memory usage beats 5.27 % of php submissions (28.5 MB)
// @lc code=end

