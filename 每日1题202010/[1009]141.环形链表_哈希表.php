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
        $visited = [];
        
        while ($head != null) {
            if (in_array($head, $visited)) { // listNode 也可以这样查找
                return true;
            }
            $visited[] = $head;
            $head = $head->next;
        }
        return false;
    }
}

// Accepted
// 17/17 cases passed (2064 ms)
// Your runtime beats 10.94 % of php submissions
// Your memory usage beats 37.08 % of php submissions (17.3 MB)
// @lc code=end

