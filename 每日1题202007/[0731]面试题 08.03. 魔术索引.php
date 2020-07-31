<?php
// 面试题 08.03. 魔术索引
// https://leetcode-cn.com/problems/magic-index-lcci/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMagicIndex($nums) {

        if($nums == null || count($nums) == 0) {
            return -1;
        }

        if($nums[0] == 0){
            return 0;
        }

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == $i) {
                return $i;
            }
        }

        return -1;
    }
}