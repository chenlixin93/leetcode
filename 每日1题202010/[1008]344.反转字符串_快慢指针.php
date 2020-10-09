<?php
/*
 * @lc app=leetcode.cn id=344 lang=php
 *
 * [344] 反转字符串
 * 
 * https://leetcode-cn.com/problems/reverse-string/
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {

        if ($s == null) return null;
        
        $l = 0;
        $r = count($s) - 1;
        while ($l != $r) {
            $tmp = $s[$l];
            $s[$l] = $s[$r];
            $s[$r] = $tmp;
            if ($r - $l == 1) break;
            $l++;
            $r--;
        }
    }
}

// Accepted
// 478/478 cases passed (100 ms)
// Your runtime beats 7.39 % of php submissions
// Your memory usage beats 12.28 % of php submissions (34.9 MB)

// Accepted
// 478/478 cases passed (68 ms)
// Your runtime beats 49.03 % of php submissions
// Your memory usage beats 21.05 % of php submissions (34.8 MB)
// @lc code=end

