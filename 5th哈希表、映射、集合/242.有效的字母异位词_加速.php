<?php
/*
 * @lc app=leetcode.cn id=242 lang=php
 *
 * [242] 有效的字母异位词
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        
        $s_tmp = str_split($s);
        $t_tmp = str_split($t);
        sort($s_tmp);
        sort($t_tmp);

        return implode('', $s_tmp) === implode('', $t_tmp);
    }
}

// Accepted
// 34/34 cases passed (68 ms)
// Your runtime beats 13.1 % of php submissions
// Your memory usage beats 100 % of php submissions (21.6 MB)
// 效率更低。。。
// @lc code=end

