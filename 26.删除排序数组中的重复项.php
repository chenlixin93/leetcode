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
                $nums[$p+1] = $nums[$q];
                $p++;
            }
            $q++;
        }
        return $p+1;
    }
}
// @lc code=end