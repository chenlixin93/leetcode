<?php
/*
 * @lc app=leetcode.cn id=234 lang=php
 *
 * [234] 回文链表
 * 
 * https://leetcode-cn.com/problems/palindrome-linked-list/
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
    function isPalindrome($head) {

        if ($head == null) return true;
        
        $tmp = [];
        while ($head != null) {
            $tmp[] = $head->val;
            $head = $head->next;
        }

        $i = 0;
        $j = count($tmp) - 1;
        while ($i < $j) {
            if ($tmp[$i] != $tmp[$j]) {
                return false;
            }
            $i++;
            $j--;
        }

        return true;
    }
}

// Accepted
// 26/26 cases passed (24 ms)
// Your runtime beats 87.57 % of php submissions
// Your memory usage beats 49.16 % of php submissions (27.4 MB)
// @lc code=end

