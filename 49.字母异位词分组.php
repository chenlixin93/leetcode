<?php
/*
 * @lc app=leetcode.cn id=49 lang=php
 *
 * [49] 字母异位词分组
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {

        $map = [];

        foreach ($strs as $str) {
            $tmp = str_split($str);
            sort($tmp);
            $new_str = implode('', $tmp);
            $result[$new_str][] = $str;
        }

        return $result;
    }
}

// Accepted
// 101/101 cases passed (24 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (21.8 MB)
// @lc code=end

