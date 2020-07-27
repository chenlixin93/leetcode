<?php
/*
 * @lc app=leetcode.cn id=392 lang=php
 *
 * [392] 判断子序列
 * 
 * https://leetcode-cn.com/problems/is-subsequence/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {

        $m = strlen($s);
        $n = strlen($t);
        $i = 0;
        $j = 0;

        while($i < $m && $j < $n) {
            // s == t 则两者向右移动一位，如果 s != t，则 t 往右移动一位
            if($s[$i] == $t[$j]) {
                $i++;
            }
            $j++;
        }
        
        return $i == $m;
    }
}

// Accepted
// 15/15 cases passed (4 ms)
// Your runtime beats 94.74 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

