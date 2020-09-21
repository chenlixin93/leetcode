<?php
/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 * 
 * https://leetcode-cn.com/problems/permutations-ii/
 */

// @lc code=start
class Solution {

    protected $len;
    protected $res;

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        
        if (count($nums) == 0) { return [];}

        $this->len = count($nums);
        $this->res = [];
        sort($nums);
        $tmp = [];
        $visited = [];

        $this->backtracking($tmp, $visited, $nums);
        return $this->res;
    }

    function backtracking(&$tmp, &$visited, $nums) {

        if (count($tmp) == $this->len) {
            $this->res[] = $tmp;
            return true;
        }

        for ($i=0; $i < $this->len; $i++) {

            if ($visited[$i] == "1") continue;

            // 剪枝
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && !$visited[$i - 1]) continue;

            // 记录状态
            $visited[$i] = "1";
            $tmp[] = $nums[$i];

            $this->backtracking($tmp, $visited, $nums);

            // 恢复回溯前的状态
            $visited[$i] = "0";
            array_pop($tmp);
        }
    }
}

// Accepted
// 30/30 cases passed (16 ms)
// Your runtime beats 91.11 % of php submissions
// Your memory usage beats 21.87 % of php submissions (15.2 MB)
// @lc code=end

