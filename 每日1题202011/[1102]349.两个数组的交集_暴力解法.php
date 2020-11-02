<?php
/*
 * @lc app=leetcode.cn id=349 lang=php
 *
 * [349] 两个数组的交集
 * 
 * https://leetcode-cn.com/problems/intersection-of-two-arrays
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $n1 = count($nums1);
        $n2 = count($nums2);

        $ans = [];
        $nums = [];
        if ($n1 > $n2) {
            $nums = array_unique($nums2);
            foreach ($nums as $v) {
                if (in_array($v, $nums1)) {
                    $ans[] = $v;
                }
            }
        } else {
            $nums = array_unique($nums1);
            foreach ($nums as $v) {
                if (in_array($v, $nums2)) {
                    $ans[] = $v;
                }
            }
        }

        return $ans;
    }
}

// Accepted
// 60/60 cases passed (16 ms)
// Your runtime beats 66.67 % of php submissions
// Your memory usage beats 18.94 % of php submissions (15.3 MB)
// @lc code=end

