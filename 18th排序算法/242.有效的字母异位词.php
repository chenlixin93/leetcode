<?php
/*
 * @lc app=leetcode.cn id=242 lang=php
 *
 * [242] 有效的字母异位词
 * 
 * https://leetcode-cn.com/problems/valid-anagram/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {

        if (strlen($s) != strlen($t)) return false;

        $wd = array_fill(0, 26, 0);

        // 先存入 s 各字母出现的次数
        for ($i=0; $i < strlen($s); $i++) { 
            $k = ord($s[$i]) - ord('a');
            $wd[$k] = $wd[$k] + 1;
        }

        // 如果 t 出现不存在或者数量不匹配的字母，长度相同的情况下则会减为负数，直接退出
        for ($i=0; $i < strlen($t); $i++) { 

            if(--$wd[ord($t[$i]) - ord('a')] < 0) return false;
        }

        return true;
    }
}

// Accepted
// 34/34 cases passed (12 ms)
// Your runtime beats 85.45 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

