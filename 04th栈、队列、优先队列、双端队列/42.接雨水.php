<?php
/*
 * @lc app=leetcode.cn id=42 lang=php
 *
 * [42] 接雨水
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        
        // 左右遍历求最高值累加面积，两个面积重合的部分 = 柱子面积 + 积水面积
        $S1 = 0;
        $S2 = 0;

        $left_max = 0;
        $right_max = 0;

        $n = count($height);

        for($i = 0; $i < $n; $i++) {
            if($height[$i] > $left_max){
                $left_max = $height[$i];
            }

            if($height[$n-$i-1] > $right_max){
                $right_max = $height[$n-$i-1];
            }

            $S1 += $left_max;
            $S2 += $right_max;
        }

        return $S1 + $S2 - $left_max*$n - array_sum($height)*1;
    }
}
// @lc code=end

