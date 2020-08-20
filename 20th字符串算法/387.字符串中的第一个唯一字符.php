<?php
/*
 * @lc app=leetcode.cn id=387 lang=php
 *
 * [387] 字符串中的第一个唯一字符
 * 
 * https://leetcode-cn.com/problems/first-unique-character-in-a-string/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {

        $n = strlen($s);
        $ss = [];

        // 先统计个数
        for ($i=0; $i < $n; $i++) {
            if (!array_key_exists($s[$i], $ss)) {
                $ss[$s[$i]] = 1;
            } else {
                $ss[$s[$i]] += 1;
            }
        }

        // 遍历查找索引位置
        for ($i=0; $i < $n; $i++) { 
            if ($ss[$s[$i]] == 1) {
                return $i;
            }
        }

        return -1;
    }
}

// Accepted
// 104/104 cases passed (56 ms)
// Your runtime beats 45.45 % of php submissions
// Your memory usage beats 63.64 % of php submissions (15.2 MB)
// @lc code=end

