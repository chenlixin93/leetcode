<?php
/*
 * @lc app=leetcode.cn id=1122 lang=php
 *
 * [1122] 数组的相对排序
 * 
 * https://leetcode-cn.com/problems/relative-sort-array/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        // 哈希 + 排序
        $count = [];

        foreach ($arr1 as $num1) { // 统计 arr1 数字出现的次数
            $count[$num1] = isset($count[$num1]) ? $count[$num1] + 1 : 1;    
        }

        $i = 0;
        foreach ($arr2 as $num2) { // 将 arr2 先插入 arr1
            if (isset($count[$num2])) {
                while($count[$num2] > 0) {
                    $arr1[$i++] = $num2;
                    $count[$num2] -= 1;
                }
            }
        }

        ksort($count); // 剩下的数排好序
        foreach ($count as $num1 => $n) { // 顺序插入 arr1 
            while ($n > 0) {
                $arr1[$i++] = $num1;
                $n--;
            }
        }

        return $arr1;
    }
}

// Accepted
// 16/16 cases passed (8 ms)
// Your runtime beats 78.57 % of php submissions
// Your memory usage beats 14.29 % of php submissions (15.1 MB)
// @lc code=end

