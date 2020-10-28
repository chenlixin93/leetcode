<?php
/*
 * @lc app=leetcode.cn id=1207 lang=php
 *
 * [1207] 独一无二的出现次数
 * 
 * https://leetcode-cn.com/problems/unique-number-of-occurrences/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {

        $tmp = [];
        foreach ($arr as $k => $v) { 
            if (!array_key_exists($v, $tmp)) { // 统计次数
                $tmp[$v] = 1;
            } else {
                $tmp[$v]++;
            }
        }

        sort($tmp); // 排序
        $prev = 0;
        foreach ($tmp as $k1 => $v1) {
            if ($prev > 0 && $prev == $v1) { // 出现相同的返回 false
                return false;
            } else {
                $prev = $v1;
            }
        }

        return true;
    }
}

// Accepted
// 63/63 cases passed (8 ms)
// Your runtime beats 69.57 % of php submissions
// Your memory usage beats 9.52 % of php submissions (15.5 MB)
// @lc code=end

