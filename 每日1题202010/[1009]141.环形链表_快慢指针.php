<?php
/*
 * @lc app=leetcode.cn id=141 lang=php
 *
 * [141] 环形链表
 * 
 * https://leetcode-cn.com/problems/linked-list-cycle/
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if ($head == null || $head->next == null) {
            return false;
        }

        // 快指针走两步，慢指针走一步，如果能够相遇则该链表有环
        $slow = $head;
        $fast = $head->next->next;
        while ($fast != $slow) {
            if ($slow == null || $fast == null) {
                return false;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return true;
    }
}

// Accepted
// 17/17 cases passed (16 ms)
// Your runtime beats 70.94 % of php submissions
// Your memory usage beats 65.56 % of php submissions (17.2 MB)
// @lc code=end

