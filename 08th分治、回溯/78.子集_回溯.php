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

        $res = [];
        for ($i=0; $i <= count($nums); $i++) { 

            // i 控制每次终结长度
            $this->backtrack(0, $i, [], $nums, $res);
        }

        return $res;
    }

    function backtrack($first, $k, $cur, $nums, &$res) {

        if(count($cur) == $k) {
            $res[] = $cur;
            return;
        }

        for ($i=$first; $i < count($nums); $i++) { 

            $cur[] = $nums[$i];

            $this->backtrack($i + 1, $k, $cur, $nums, $res);

            array_pop($cur);
        }

    }
}

// Accepted
// 10/10 cases passed (4 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (15.4 MB)
// @lc code=end

