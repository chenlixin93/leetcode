<?php
/*
 * @lc app=leetcode.cn id=300 lang=php
 *
 * [300] 最长上升子序列
 * 
 * https://leetcode-cn.com/problems/longest-increasing-subsequence/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {

        $len = count($nums);
        if ($len < 2) {
            return $len;
        }

        $dp = array_fill(0, $len, 1);
        for ($i=1; $i < $len; $i++) { 
            for ($j=0; $j < $i; $j++) { 
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }

        // $res = 0;
        // for ($i=0; $i < $len; $i++) { 
        //     $res = max($dp[$i], $res);
        // }
        // return $res;

        sort($dp);
        return $dp[$len - 1];
    }
}

// Accepted
// 24/24 cases passed (416 ms)
// Your runtime beats 6.25 % of php submissions
// Your memory usage beats 71.43 % of php submissions (15.2 MB)
// @lc code=end

