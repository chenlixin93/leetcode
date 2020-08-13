<?php
/*
 * @lc app=leetcode.cn id=56 lang=php
 *
 * [56] 合并区间
 * 
 * https://leetcode-cn.com/problems/merge-intervals/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {

        $res = [];
        // 先排序二维数组的第一位
        sort($intervals);
        
        $i = 0;
        $len = count($intervals);
        // 双指针
        while ($i < $len) {
            $t = $intervals[$i][1];
            $j = $i + 1;

            // 当前区间重点大于等于后面区间起点，即可合并
            while ($j < $len && $intervals[$j][0] <= $t) {
                $t = max($t, $intervals[$j][1]);
                $j++;
            }

            $res[] = [$intervals[$i][0], $t];
            $i = $j;
        }

        return $res;
    }
}

// Accepted
// 169/169 cases passed (40 ms)
// Your runtime beats 70.72 % of php submissions
// Your memory usage beats 47.83 % of php submissions (23.6 MB)
// @lc code=end

