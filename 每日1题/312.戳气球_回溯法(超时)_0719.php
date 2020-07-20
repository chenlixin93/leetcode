<?php
/*
 * @lc app=leetcode.cn id=312 lang=php
 *
 * [312] 戳气球
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxCoins($nums) {

        $res = 0;
        $this->helper($nums, 0, $res);
        return $res;
    }

    function helper(&$nums, $coins, &$res) {
        $len = count($nums);

        // boundary
        if($len == 0) {
            $res = max($res, $coins);
            return true;
        }

        // search
        // 每一层可选择戳破的气球数
        for ($i=0; $i < $len; $i++) { 
            $delta = $nums[$i] * ($i - 1 < 0 ? 1 : $nums[$i-1]) * 
                        ($i + 1 > $len - 1 ? 1 : $nums[$i+1]);
            
            $nums_copy = $nums;
            unset($nums_copy[$i]);
            $nums_copy = array_merge($nums_copy, []);
            $this->helper($nums_copy, $coins + $delta, $res);
        }
    }

    // function array_insert($arr, $value, $position = 0) {

    //     $fore = ($position == 0) ? array() : array_splice($arr, 0, $position);
    //     $fore[] = $value;
    //     $ret = array_merge($fore, $arr);

    //     return $ret;
    // }
}

// 回溯法，超时
// Time Limit Exceeded
// 20/70 cases passed (N/A)

// Time Limit Exceeded
// 24/70 cases passed (N/A)
// @lc code=end

