<?php
/*
 * @lc app=leetcode.cn id=347 lang=php
 *
 * [347] 前 K 个高频元素
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
        foreach ($nums as $val) {
            $res[$val] = isset($res[$val]) ? $res[$val]+1 : 1; 
        }

        arsort($res);

        $new_res = [];
        $i = 0;
        foreach ($res as $key => $val) {

            $new_res[] = $key;
            if(++$i == $k) break;
        }

        return $new_res;
    }
}
// @lc code=end

