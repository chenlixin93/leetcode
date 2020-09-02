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
        
        $map = [
            "[" => "]",
            "{" => "}",
            "(" => ")",
            "?" => "?"
        ];

        $stack = ["?"];

        for ($i=0; $i < strlen($s); $i++) { 

            if (array_key_exists($s[$i], $map)) { // 左括号入栈
                $stack[] = $s[$i];
            } elseif ($map[array_pop($stack)] != $s[$i]) { // 非左括号出栈判断是否右括号
                return false;
            }
        }

        return count($stack) == 1;
    }
}

// Accepted
// 91/91 cases passed (8 ms)
// Your runtime beats 77.9 % of php submissions
// Your memory usage beats 40.68 % of php submissions (15.1 MB)
// @lc code=end

