<?php
/*
 * @lc app=leetcode.cn id=198 lang=php
 *
 * [198] 打家劫舍
 * 
 * https://leetcode-cn.com/problems/house-robber/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {

        if ($nums == null || count($nums) == 0) {
            return 0;
        }

        $n = count($nums);
        $a = array_fill(0, $n, array_fill(0, 2, 0));
        //$a[0][0] = 0;
        $a[0][1] = $nums[0];


        for ($i=1; $i < $n; $i++) { 
            // 当前一天不偷
            $a[$i][0] = max($a[$i - 1][0], $a[$i - 1][1]);
            // 当前一天偷盗
            $a[$i][1] = $a[$i - 1][0] + $nums[$i];
        }

        return max($a[$n - 1][0], $a[$n - 1][1]);
    }
}

// Accepted
// 69/69 cases passed (8 ms)
// Your runtime beats 68.56 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

