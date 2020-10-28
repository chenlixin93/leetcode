<?php
/*
 * @lc app=leetcode.cn id=763 lang=php
 *
 * [763] 划分字母区间
 * 
 * https://leetcode-cn.com/problems/partition-labels/
 * 参考题解 https://zxi.mytechroad.com/blog/string/leetcode-763-partition-labels/
 */

// @lc code=start
class Solution {

    /**
     * @param String $S
     * @return Integer[]
     */
    function partitionLabels($S) {
        // 暴力解法
        $ans = [];
        $start = 0;
        $end = 0;

        for ($i=0; $i < strlen($S); $i++) { 
            $end = max($end, strrpos($S, $S[$i])); // 找到最后一次出现的位置
            if ($i == $end) {
                $ans[] = $end - $start + 1;
                $start = $end + 1;
            }
        }
        
        return $ans;
    }
}
// 复杂度分析
// Time complexity: O(n^2)
// Space complexity: O(1)

// Accepted
// 116/116 cases passed (12 ms)
// Your runtime beats 73.03 % of php submissions
// Your memory usage beats 34.48 % of php submissions (15.3 MB)
// @lc code=end

