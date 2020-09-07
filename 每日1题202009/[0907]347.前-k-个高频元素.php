<?php
/*
 * @lc app=leetcode.cn id=347 lang=php
 *
 * [347] 前 K 个高频元素
 * 
 * https://leetcode-cn.com/problems/top-k-frequent-elements/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {

        $res = [];

        // 统计次数
        foreach ($nums as $val) {
            $res[$val] = isset($res[$val]) ? $res[$val]+1 : 1; 
        }

        // 按照键值进行降序排序
        arsort($res);

        $new_res = [];
        $i = 0;
        foreach ($res as $key => $val) {

            $new_res[] = $key;
            if(++$i == $k) break; // 取前k个
        }

        return $new_res;
    }
}

// Accepted
// 21/21 cases passed (36 ms)
// Your runtime beats 72.04 % of php submissions
// Your memory usage beats 89.74 % of php submissions (19.7 MB)
// @lc code=end

