<?php
/*
 * @lc app=leetcode.cn id=917 lang=php
 *
 * [917] 仅仅反转字母
 * 
 * https://leetcode-cn.com/problems/reverse-only-letters/
 */

// @lc code=start
class Solution {

    protected $char = [
        'a' => 1,'b' => 1,'c' => 1,'d' => 1,'e' => 1,'f' => 1,'g' => 1,
        'h' => 1,'i' => 1,'j' => 1,'k' => 1,'l' => 1,'m' => 1,'n' => 1,
        'o' => 1,'p' => 1,'q' => 1,'r' => 1,'s' => 1,'t' => 1,
        'u' => 1,'v' => 1,'w' => 1,'x' => 1,'y' => 1,'z' => 1,
        'A' => 1,'B' => 1,'C' => 1,'D' => 1,'E' => 1,'F' => 1,'G' => 1,
        'H' => 1,'I' => 1,'J' => 1,'K' => 1,'L' => 1,'M' => 1,'N' => 1,
        'O' => 1,'P' => 1,'Q' => 1,'R' => 1,'S' => 1,'T' => 1,
        'U' => 1,'V' => 1,'W' => 1,'X' => 1,'Y' => 1,'Z' => 1,
    ];

    /**
     * @param String $S
     * @return String
     */
    function reverseOnlyLetters($S) {

        if (trim($S) === "") return "";

        $stack = [];
        for ($i=0; $i < strlen($S); $i++) { 
            if (array_key_exists($S[$i], $this->char)) {
                array_push($stack, $S[$i]);
            }
        }

        $str = "";
        for ($i=0; $i < strlen($S); $i++) { 
            if (array_key_exists($S[$i], $this->char)) {
                $str .= array_pop($stack);
            } else {
                $str .= $S[$i];
            }
        }

        return $str;
    }
}

// Accepted
// 116/116 cases passed (8 ms)
// Your runtime beats 80.95 % of php submissions
// Your memory usage beats 66.67 % of php submissions (14.7 MB)
// @lc code=end

