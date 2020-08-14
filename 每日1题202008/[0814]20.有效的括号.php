<?php
/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 * 
 * https://leetcode-cn.com/problems/valid-parentheses/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {

        $arr = [
            '{' => '}',
            '[' => ']',
            '(' => ')',
            '?' => '?'
        ];

        $left = ['{','[','('];
        $stack = ["?"];
        
        for ($i=0; $i < strlen($s); $i++) { 
            if (in_array($s[$i], $left)) { // 如果是左括号，直接入栈
                $stack[] = $s[$i];
            } elseif ($arr[array_pop($stack)] != $s[$i]) { // 如果不在右括号范围内，直接返回结果
                return false;
            }
        }

        return count($stack) == 1;
    }
}

// Accepted
// 76/76 cases passed (8 ms)
// Your runtime beats 79.31 % of php submissions
// Your memory usage beats 70.97 % of php submissions (14.9 MB)
// @lc code=end

