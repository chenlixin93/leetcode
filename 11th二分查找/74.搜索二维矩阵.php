<?php
/*
 * @lc app=leetcode.cn id=74 lang=php
 *
 * [74] 搜索二维矩阵
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        
        if(count($matrix) == 0 || count($matrix[0]) == 0) {
            return false;
        }

        //从左下角开始搜
        $row = count($matrix) - 1;
        $col = 0;

        while($row >= 0 && $col < count($matrix[0])) {
            if($matrix[$row][$col] == $target) {
                return true;
            }

            if($matrix[$row][$col] < $target) {
                $col++;
            }else {
                $row--;
            }
        }

        return false;
    }
}

// Accepted
// 136/136 cases passed (24 ms)
// Your runtime beats 76 % of php submissions
// Your memory usage beats 100 % of php submissions (16.7 MB)
// @lc code=end
