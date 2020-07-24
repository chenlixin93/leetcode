<?php
/*
 * @lc app=leetcode.cn id=350 lang=php
 *
 * [350] 两个数组的交集 II
 * 
 * https://leetcode-cn.com/problems/intersection-of-two-arrays-ii/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        
        sort($nums1);
        sort($nums2);

        $idx1 = 0;
        $idx2 = 0;
        $res = [];

        while($idx1 < count($nums1) && $idx2 < count($nums2)) {

            if($nums1[$idx1] == $nums2[$idx2]) {
                $res[] = $nums1[$idx1];
                $idx1++;
                $idx2++;
                continue;
            }

            if($nums1[$idx1] > $nums2[$idx2]) {
                $idx2++;
            }else{
                $idx1++;
            }
        }

        return $res;
    }
}

// Accepted
// 61/61 cases passed (16 ms)
// Your runtime beats 74.03 % of php submissions
// Your memory usage beats 50 % of php submissions (15.3 MB)
// @lc code=end

