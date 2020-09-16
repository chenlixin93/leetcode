<?php
/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 * 
 * https://leetcode-cn.com/problems/two-sum/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        
        $tmp = [];
        foreach ($nums as $k => $num) {
            
            if (array_key_exists($target - $num, $tmp)) {
                if ($nums[$tmp[$target - $num]] + $num === $target) {
                    return [$tmp[$target - $num], $k];
                }
            } 

            $tmp[$num] = $k;
        }

        return [];
    }
}

// Accepted
// 29/29 cases passed (16 ms)
// Your runtime beats 80.43 % of php submissions
// Your memory usage beats 22.89 % of php submissions (16 MB)
// @lc code=end

