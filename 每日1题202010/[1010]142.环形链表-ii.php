<?php
/*
 * @lc app=leetcode.cn id=142 lang=php
 *
 * [142] 环形链表 II
 * 
 * https://leetcode-cn.com/problems/linked-list-cycle-ii/
 * 视频讲解 https://www.bilibili.com/video/BV1kb411g7DZ?from=search&seid=8569978395467114887
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
     * @return ListNode
     */
    function detectCycle($head) {
        // 快指针走两步，慢指针走一步，如果能够相遇则该链表有环
        $slow = $head;
        $fast = $head;
        while (true) {
            if ($slow == null || $fast == null) return null;

            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow == $fast) break;
        }

        // 快指针回到链表起点，与慢指针保持速度相同
        $fast = $head;
        while ($slow != $fast) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        // 再次相遇即环的起点(数学推导)
        return $fast;
    }
}

// 数学推导过程：
// 假设 a 为环的起点，b为从环的起点到相遇的距离，c 为相遇位置回到环起点的距离，即 b + c 为环的长度
// 相遇时，慢指针走了 a + b 的距离，快指针速率为慢指针的两倍，由此得到下面的式子：

// 2(a + b) = a + b + n(b + c)
// => a + b = n(b + c)
// => a = (n - 1)(b + c) + c

// 结论是，当n = 1时，也就是快指针走完一次环的长度之后，
// 快指针回到起点，用一倍速率走 a 的距离 == 慢指针从相遇点走完 c 的距离，
// 最终它们会在环的起点相遇

// Accepted
// 16/16 cases passed (12 ms)
// Your runtime beats 95.61 % of php submissions
// Your memory usage beats 11.05 % of php submissions (18.4 MB)
// @lc code=end

