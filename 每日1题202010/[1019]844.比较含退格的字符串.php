<?php
/*
 * @lc app=leetcode.cn id=844 lang=php
 *
 * [844] 比较含退格的字符串
 * 
 * https://leetcode-cn.com/problems/backspace-string-compare/
 */

// @lc code=start
class Solution {

    /**
     * @param String $S
     * @param String $T
     * @return Boolean
     */
    function backspaceCompare($S, $T) {
        return $this->helper($S) == $this->helper($T);
    }

    function helper($str) {
        if (strlen($str) == 1) return $str;
        
        $o = [];
        for ($i=0; $i < strlen($str); $i++) { 
            $c = $str[$i];
            if ($c == '#') {
                if (!empty($o)) {
                    array_pop($o);
                }
            } else {
                array_push($o, $c);
            }
        }

        return implode("", $o);
    }
}

// Accepted
// 110/110 cases passed (4 ms)
// Your runtime beats 97.65 % of php submissions
// Your memory usage beats 71.6 % of php submissions (15.1 MB)
// @lc code=end

