<?php
/*
 * @lc app=leetcode.cn id=167 lang=php
 *
 * [167] 两数之和 II - 输入有序数组
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {

        $result = [];
        foreach ($numbers as $k => $v) {

            if(isset($result[$target - $v])){
                return [$result[$target - $v], $k+1];
            }

            $result[$v] = $k+1;
        }
    }
}


// @lc code=end

