<?php
/*
 * @lc app=leetcode.cn id=455 lang=php
 *
 * [455] 分发饼干
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        
        sort($g);
        sort($s);

        $g_len = count($g);
        $s_len = count($s);
        $i = 0;
        $j = 0;
        $res = 0;

        while ($i < $g_len && $j < $s_len) {
            // 排序后，对比最小饼干是否满足当前最小胃口
            if($g[$i] <= $s[$j]) {
                $i++;
                $j++;
                $res++;
            } else{
                $j++;
            }
        }

        return $res;
    }
}

// Accepted
// 21/21 cases passed (72 ms)
// Your runtime beats 83.78 % of php submissions
// Your memory usage beats 100 % of php submissions (16.6 MB)
// @lc code=end

