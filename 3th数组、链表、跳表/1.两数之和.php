<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {

        //$result = [];

        foreach ($nums as $k => $v) {
            
            if(isset($result[$target-$v]) && $nums[$result[$target-$v]] + $v === $target){
                return [$result[$target-$v], $k];
            }

            $result[$v] = $k;
        }
    }
}
// @lc code=end

