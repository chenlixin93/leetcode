<?php
/*
 * @lc app=leetcode.cn id=977 lang=php
 *
 * [977] 有序数组的平方
 * 
 * http://leetcode-cn.com/problems/squares-of-a-sorted-array/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A) {

        $n = count($A);
        $ans = array_fill(0, $n, 0);
        $i=0; $j = $n - 1; $pos = $n - 1;
        while ($i <= $j) { // 左右端点取较大的填入结果集最后的位置，最终形成递增数组
            if ($A[$i] * $A[$i] > $A[$j] * $A[$j]) {
                $ans[$pos] = $A[$i] * $A[$i];
                $i++;
            } else {
                $ans[$pos] = $A[$j] * $A[$j];
                $j--;
            }
            $pos--;
        }
        return $ans;
    }
}

// Accepted
// 132/132 cases passed (76 ms)
// Your runtime beats 97.06 % of php submissions
// Your memory usage beats 9.52 % of php submissions (18 MB)
// @lc code=end

