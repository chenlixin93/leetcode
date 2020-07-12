<?php
/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        
        $res = [];
        $visited = [];
        $tmp = [];
        sort($nums);

        $this->backtrack($res, $nums, $visited, $tmp);
        return $res;
    }

    function backtrack(&$res, $nums, &$visited, &$tmp) {

        if(count($tmp) == count($nums)) {
            $res[] = $tmp;
            return true;
        }

        for ($i=0; $i < count($nums); $i++) { 
            // 不能重复
            if($visited[$i] == 1) continue;

            // 剪枝条件：$i > 0 是为了保证 $nums[$i - 1] 有意义
            // 写 !$visited[$i - 1] 是因为 $nums[$i - 1] 在深度优先遍历的过程中刚刚被撤销选择
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && !$visited[$i - 1]) continue;

            $visited[$i]  = 1;
            $tmp[] = $nums[$i];

            $this->backtrack($res, $nums, $visited, $tmp);

            $visited[$i]  = 0;
            array_pop($tmp);
        }
    }
}

// Accepted
// 30/30 cases passed (28 ms)
// Your runtime beats 50.85 % of php submissions
// Your memory usage beats 100 % of php submissions (15.5 MB)
// @lc code=end

