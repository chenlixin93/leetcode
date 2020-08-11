<?php
/*
 * @lc app=leetcode.cn id=26 lang=php
 *
 * [26] 删除排序数组中的重复项
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {

        $p = 0;
        $q = 1;

        while ($q < count($nums)) {
            
            if($nums[$p] != $nums[$q]){
                // 两个指针值不相等时，将q赋值给p+1，
                // p右移一位，q右移一位
                $nums[$p+1] = $nums[$q];
                $p++;
            }

            // 两个指针值不相等时，q右移一位
            $q++;
        }

        return $p+1;
    }
}
// @lc code=end