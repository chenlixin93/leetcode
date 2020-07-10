<?php
/*
 * @lc app=leetcode.cn id=46 lang=php
 *
 * [46] 全排列
 */

// @lc code=start
class Solution {
    
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        
        $res = [];
        $visited = [];
        $tmp = [];

        $this->backtrack($res, $nums, $visited, $tmp);
        return $res;
    }

    function backtrack(&$res, $nums, &$visited, &$tmp) {

        if(count($tmp) == count($nums)) {
            $res[] = $tmp;
            return true;
        }

        for ($i=0; $i < count($nums); $i++) { 
            // 不能重复
            if($visited[$i] == 1) continue;
            $visited[$i]  = 1;
            $tmp[] = $nums[$i];
            $this->backtrack($res, $nums, $visited, $tmp);
            $visited[$i]  = 0;
            array_pop($tmp);
        }
    }
}

// Accepted
// 25/25 cases passed (4 ms)
// Your runtime beats 98.8 % of php submissions
// Your memory usage beats 100 % of php submissions (15.4 MB)
// @lc code=end

