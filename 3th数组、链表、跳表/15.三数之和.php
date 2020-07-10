<?php
/*
 * @lc app=leetcode.cn id=15 lang=php
 *
 * [15] 三数之和
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {

        $result = array();
        // 边界
        if(empty($nums) || count($nums) < 3){
            return $result;
        }

        // 排序
        sort($nums);
        for ($i=0; $i < count($nums)-2; $i++) {

            // 去重
            if($i>0 && $nums[$i] == $nums[$i-1]) continue;

            // 头尾指针
            $head = $i+1;
            $tail = count($nums)-1; 

            while ($head < $tail) {
                $sum = -($nums[$head] + $nums[$tail]);

                if($sum == $nums[$i]){
                    $result[] = [$nums[$i], $nums[$head], $nums[$tail]];

                    while ($head < $tail && $nums[$head] == $nums[$head+1]) {
                        $head++;
                    }

                    while ($head < $tail && $nums[$tail] == $nums[$tail-1]) {
                        $tail--;
                    }
                }

                $sum >= $nums[$i] ? $head++ : $tail--;
            }
        }

        return $result;
    }
}
// @lc code=end