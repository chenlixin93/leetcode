<?php
/*
 * @lc app=leetcode.cn id=78 lang=php
 *
 * [78] 子集
 * 
 * https://leetcode-cn.com/problems/subsets/
 */

// @lc code=start
class Solution {

    protected $res;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        
        $this->res = [];

        // 控制个数，0到最大递增
        for ($i=0; $i <= count($nums); $i++) { 
            $this->backtracking(0, $i, [], $nums);
        }

        return $this->res;
    }

    function backtracking($first, $k, $cur, $nums) {

        if (count($cur) == $k) {
            $this->res[] = $cur;
            return true;
        }

        for ($i=$first; $i < count($nums); $i++) { 
            $cur[] = $nums[$i];
            $this->backtracking($i + 1, $k, $cur, $nums);
            array_pop($cur);
        }
    }
}

// Accepted
// 10/10 cases passed (12 ms)
// Your runtime beats 37.72 % of php submissions
// Your memory usage beats 34.43 % of php submissions (15.1 MB)
// @lc code=end

