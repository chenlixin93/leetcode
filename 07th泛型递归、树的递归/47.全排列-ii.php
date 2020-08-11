<?php
/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 */

// @lc code=start
class Solution {

    protected $in;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        
        $res = [];
        $visited = [];
        $tmp = [];
        $this->in = [];

        $this->backtrack($res, $nums, $visited, $tmp);
        return $res;
    }

    function backtrack(&$res, $nums, &$visited, &$tmp) {

        if(count($tmp) == count($nums)) {

            $tmp_in = implode('-', $tmp);
            if(!in_array($tmp_in, $this->in)){
                $res[] = $tmp;
                $this->in[] = $tmp_in;
            }
            return true;
        }

        for ($i=0; $i < count($nums); $i++) { 
            // 不能重复
            if($visited[$i] == 1) continue;
            $visited[$i]  = 1;
            $tmp[] = $nums[$i];
            $this->backtrack($res, $nums, $visited, $tmp);
            $visited[$i]  = 0;
            array_pop($tmp);
        }
    }
}

// 直接模仿了46全排列的解法，低效率的剪枝
// Accepted
// 30/30 cases passed (1040 ms)
// Your runtime beats 5.08 % of php submissions
// Your memory usage beats 100 % of php submissions (15.2 MB)
// @lc code=end

