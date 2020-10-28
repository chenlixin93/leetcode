<?php
/*
 * @lc app=leetcode.cn id=925 lang=php
 *
 * [925] 长按键入
 * 
 * https://leetcode-cn.com/problems/long-pressed-name/
 */

// @lc code=start
class Solution {

    /**
     * @param String $name
     * @param String $typed
     * @return Boolean
     */
    function isLongPressedName($name, $typed) {
        // "alex"
        // "aaleex"
        $name_arr = str_split($name);
        $typed_arr = str_split($typed);
        $n_len = count($name_arr);
        $t_len = count($typed_arr);

        $i = 0;
        $j = 0;
        while ($i < $n_len && $j < $t_len) {
            if ($name_arr[$i] == $typed_arr[$j]) { // 相等同时右移一位
                $i++;
                $j++;
            } elseif ($j > 0 && $typed_arr[$j] == $typed_arr[$j - 1]) { // 重复按的情况，type右移一位
                    $j++;
            } else {
                return false;
            }
        }

        // type 还没走完，剩下的都和前面一样
        while ($j < $t_len && $typed_arr[$j] == $typed_arr[$j - 1]) {
            $j++;
        }

        // 两者都走到最后一位，才算匹配
        return $i == $n_len && $j == $t_len;
    }
}

// Accepted
// 84/84 cases passed (4 ms)
// Your runtime beats 96.32 % of php submissions
// Your memory usage beats 77.95 % of php submissions (15.2 MB)
// @lc code=end

