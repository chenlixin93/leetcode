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

        // pre记录之前连续0或1，cur记录现在的连续1或0，pre >= cur，
        // 比如现在有1个1，那么之前有1个或者2个、3个0，01、001、0001、
        // 都包含一个符合条件的解01，即满足条件。

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
// @lc code=end

