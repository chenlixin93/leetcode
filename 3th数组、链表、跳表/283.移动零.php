<?php
/*
 * @lc app=leetcode.cn id=283 lang=php
 *
 * [283] 移动零
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        
        for ($i=0; $i < count($nums); $i++) { 
            if($nums[$i] == 0){
                unset($nums[$i]);
                $nums[] = 0;
            }
        }
        return $nums;
    }
}
// @lc code=end

