<?php
/*
 * @lc app=leetcode.cn id=205 lang=php
 *
 * [205] 同构字符串
 * 
 * https://leetcode-cn.com/problems/isomorphic-strings/
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {

        // 验证 s -> t 、t -> s 两个方向，均为同构才为真
        // 例如 s = "ab"、t = "aa"
        return $this->helper($s, $t) && $this->helper($t, $s);
    }

    function helper($s, $t) {

        $len = strlen($s);
        $map = [];
        for ($i=0; $i < $len; $i++) { 
            if (array_key_exists($s[$i], $map)) {
                if ($map[$s[$i]] != $t[$i]) return false;
            } else {
                $map[$s[$i]] = $t[$i];
            }
        }

        return true;
    }
}

// Accepted
// 32/32 cases passed (12 ms)
// Your runtime beats 68 % of php submissions
// Your memory usage beats 87.5 % of php submissions (14.8 MB)
// @lc code=end

