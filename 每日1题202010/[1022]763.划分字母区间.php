<?php
/*
 * @lc app=leetcode.cn id=763 lang=php
 *
 * [763] 划分字母区间
 * 
 * https://leetcode-cn.com/problems/unique-number-of-occurrences/
 * 参考题解 https://zxi.mytechroad.com/blog/string/leetcode-763-partition-labels/
 */

// @lc code=start
class Solution {

    /**
     * @param String $S
     * @return Integer[]
     */
    function partitionLabels($S) {
        $last_index = [];
        for ($i=0; $i < strlen($S); $i++) { // 先查出每个字符最后的位置
            $last_index[$S[$i]] = $i;
        }

        $ans = [];
        for ($i=0; $i < strlen($S); $i++) { 
            $end = max($end, $last_index[$S[$i]]); // 找到最后一次出现的位置
            if ($i == $end) {
                $ans[] = $end - $start + 1;
                $start = $end + 1;
            }
        }
        
        return $ans;
        
    }
}

// 复杂度分析
// Time complexity: O(n)
// Space complexity: O(26/128)

// Accepted
// 116/116 cases passed (8 ms)
// Your runtime beats 98.88 % of php submissions
// Your memory usage beats 5.75 % of php submissions (15.4 MB)
// @lc code=end