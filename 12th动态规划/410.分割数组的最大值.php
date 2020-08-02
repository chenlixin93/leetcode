<?php
/*
 * @lc app=leetcode.cn id=410 lang=php
 *
 * [410] 分割数组的最大值
 * 
 * https://leetcode-cn.com/problems/split-array-largest-sum/
 * https://www.bilibili.com/video/BV1rb411T7dR?from=search&seid=7592679090651719205
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $m
     * @return Integer
     */
    function splitArray($nums, $m) {
        
        $n = count($nums);
        $max = 0;
        $sum = 0;

        foreach ($nums as $num) {
            $max = max($num, $max);
            $sum += $num;
        }

        $low = $max; // 划分下界：把每一个数字当成子数组，也就代表最大和的最小值
        $high = $sum; // 划分上界：把整个数组当成子数组，也就是最大和的最小值

        // 找到分割数 == m
        while ($low < $high) {
            $mid = $low + floor(($high - $low) / 2);
            $pieces = $this->split($nums, $mid);
            if($pieces > $m) {
                // 如果分割数过多，mid 值显得比较小，把左边界调高
                $low = $mid + 1;
            }else{
                $high = $mid;
            }
        }

        return $low;
    }

    function split($nums, $largest_sum) {

        $pieces = 1;
        $tmp_sum = 0;
        foreach ($nums as $num) {
            if($tmp_sum + $num > $largest_sum) {
                $tmp_sum = $num;
                $pieces++;
            } else {
                $tmp_sum += $num;
            }
        }

        return $pieces;
    }
}

// Accepted
// 27/27 cases passed (8 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15 MB)
// @lc code=end