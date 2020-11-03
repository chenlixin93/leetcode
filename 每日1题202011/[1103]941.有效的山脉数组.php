<?php
/*
 * @lc app=leetcode.cn id=941 lang=php
 *
 * [941] 有效的山脉数组
 * 
 * https://leetcode-cn.com/problems/valid-mountain-array/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function validMountainArray($A) {

        if (count($A) == 0) return false; // 空数组不符合条件
        
        $large = 0;
        $less = 0;
        $cur = $A[0];

        for ($i=1; $i < count($A); $i++) { 
            if ($cur > $A[$i]) {
                if ($large == 2) return false;  // 上坡后下坡，不允许再次上坡
                if ($large == 1 && $less == 1) $large = 2;
                $large = 1;
            } elseif ($cur < $A[$i]) {
                if ($large == 1) return false; // 不允许出现凹型
                $less = 1;
            } else {
                return false; // 前后不可以出现相等
            }
            $cur = $A[$i];
        }
        
        if ($large == 0 || $less == 0) return false; // 持续上坡、持续下坡都不符合条件
        return true;
    }
}

// Accepted
// 51/51 cases passed (76 ms)
// Your runtime beats 46.67 % of php submissions
// Your memory usage beats 14.29 % of php submissions (16.5 MB)
// @lc code=end

