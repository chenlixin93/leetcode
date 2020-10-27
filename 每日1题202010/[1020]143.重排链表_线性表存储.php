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
        if ($head == null) {
            return null;
        }

        $list = [];
        while ($head != null) {
            $list[] = $head;
            $head = $head->next;
        }

        $i = 0;
        $j = count($list) - 1;
        while ($i < $j) {
            $list[$i]->next = $list[$j]; // 例如: L(0)->next = L(N) 
            $i++;
            // 偶数个节点的情况，会提前相遇
            if ($i == $j) {
                break;
            }
            $list[$j]->next = $list[$i]; // i++，此时 L(0)->L(N)->next = L(1)
            $j--;
        }

        $list[$i]->next = null;
    }
}

// Accepted
// 13/13 cases passed (44 ms)
// Your runtime beats 14.14 % of php submissions
// Your memory usage beats 41.05 % of php submissions (25.1 MB)
// @lc code=end

