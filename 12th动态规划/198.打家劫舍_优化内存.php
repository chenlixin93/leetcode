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
        if ($n == 1) {
            return $nums[0];
        }

        $a[0] = $nums[0];
        $a[1] = max($nums[0], $nums[1]);
        $res = max($a[0], $a[1]);

        // a[i] 表示 0 到 i 天，且第 i 天必偷的最大值
        for ($i=2; $i < $n; $i++) { 
            // i 偷得话，i - 2必偷
            $a[$i] = max($a[$i - 1], $a[$i - 2] + $nums[$i]);
            $res = max($res, $a[$i]);
        }

        return $res;
    }
}

// Accepted
// 69/69 cases passed (4 ms)
// Your runtime beats 89.96 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

