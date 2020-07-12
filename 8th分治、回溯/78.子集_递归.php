<?php
/*
 * @lc app=leetcode.cn id=78 lang=php
 *
 * [78] 子集
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        
        // 从空集合开始
        $res = [
            [],
        ];

        foreach ($nums as $val) {

            $sub = [];
            // 将已有结果取出加入新数
            foreach ($res as $val2) {
                $val2[] = $val;
                $sub[] = $val2;
            }

            // 把所有新结果推入结果集
            foreach ($sub as $val3) {
                $res[] = $val3;
            }
        }

        return $res;
    }
}

// Accepted
// 10/10 cases passed (4 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.2 MB)
// @lc code=end

