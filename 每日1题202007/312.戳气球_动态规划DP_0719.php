<?php
/*
 * @lc app=leetcode.cn id=312 lang=php
 *
 * [312] 戳气球
 * 
 * https://leetcode-cn.com/problems/burst-balloons/
 * 视频讲解 https://www.bilibili.com/video/av45180542
 */

// @lc code=start
class Solution {

    protected $dp;
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxCoins($nums) {

        $n = count($nums);
        // 根据题目说明，首尾推入1，保证递归有效
        $nums = array_merge([1], $nums);
        $nums[] = 1;
        // 填充二维数组
        $this->dp = array_fill(0, $n+2, array_fill(0, $n+2, 0));
        $res = $this->helper($nums, 1, $n);
        return $res;
    }

    function helper(&$nums, $i, $j) {
        // boundary
        if($i > $j) return 0;
        if($this->dp[$i][$j] > 0) return $this->dp[$i][$j];

        // search
        // 优先戳破左边和右边的气球，再戳破当前气球，可以看出左右两个子问题是独立的，并且只和当前气球关联
        // 每个子问题里，k 的范围是 i => j
        // 定义状态转移方程：dp[i][j] = dp[i][k-1] + dp[k+1][j] + nums[k] * nums[i-1] * nums[j+1]
        for ($k=$i; $k <= $j; $k++) { 
            $left = $this->helper($nums, $i, $k - 1);
            $right = $this->helper($nums, $k + 1, $j);
            $delta = $nums[$k] * $nums[$i - 1] * $nums[$j + 1];
            
            $this->dp[$i][$j] = max($this->dp[$i][$j], $left + $right + $delta);
        }

        return $this->dp[$i][$j];
    }
}

// Accepted
// 70/70 cases passed (288 ms)
// Your runtime beats 84.62 % of php submissions
// Your memory usage beats 100 % of php submissions (16.5 MB)
// @lc code=end

