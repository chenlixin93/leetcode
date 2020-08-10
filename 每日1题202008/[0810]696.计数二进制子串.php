<?php
/*
 * @lc app=leetcode.cn id=696 lang=php
 *
 * [696] 计数二进制子串
 * 
 * https://leetcode-cn.com/problems/count-binary-substrings/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countBinarySubstrings($s) {

        // 计数条件：相同数量的0和1、且所有0和1都分别组合在一起
        // pre 记录之前连续 0 或 1，cur 记录现在的连续 1 或 0，pre >= cur，n++ 是什么意思呢？
        // 假设有一个数 000111，从头开始遍历，到达 1 时，0 的计数时，pre 计数可以达到 3
        // 当出现 0001 时，cur == 1，pre > cur，包含 01 子串，符合条件，n++；
        // 当出现 00011 时，cur == 2，pre > cur，包含 0011 子串，符合条件，n++；
        // 当出现 000111 时，cur == 3，pre == cur，包含 000111 子串，符合条件，n++；
        // 当 1 后面开始出现 0 时，同理。

        $n = 0;
        $pre = 0;
        $cur = 1;
        $len = strlen($s) - 1;

        for ($i=0; $i < $len; $i++) { 
            if ($s[$i] == $s[$i+1]) {
                $cur++;
            } else {
                $pre = $cur;
                $cur = 1;
            }

            if ($pre >= $cur) {
                $n++;
            }
        }

        return $n;
    }
}

// Accepted
// 90/90 cases passed (48 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15 MB)
// @lc code=end

