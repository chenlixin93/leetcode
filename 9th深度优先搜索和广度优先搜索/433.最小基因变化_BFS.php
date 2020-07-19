<?php
/*
 * @lc app=leetcode.cn id=433 lang=php
 *
 * [433] 最小基因变化
 */

// @lc code=start
class Solution {

    /**
     * @param String $start
     * @param String $end
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($start, $end, $bank) {

        if(!in_array($end, $bank)) return -1;

        $change = [
            'A' => "CGT",
            'C' => "AGT",
            'G' => "ACT",
            'T' => "ACG",
        ];

        // 初始入队
        $queue = [
            [$start, 0],
        ];

        while ($n = count($queue)) {

            $cur = array_shift($queue);
            $str = $cur[0];
            $step = $cur[1];

            if($str == $end) return $step;

            for ($i=0; $i < strlen($str); $i++) {

                $gen = $change[$str[$i]];

                for ($j=0; $j < strlen($gen); $j++) {

                    $new = substr($str, 0, $i).$gen[$j].substr($str, $i+1);

                    if(in_array($new, $bank)){
                        array_push($queue, [$new, $step + 1]);
                        // 剪枝，避免重复
                        //unset($bank[array_search($bank)]);
                    }
                }
            }
        }

        return -1;
    }
}

// Accepted
// 14/14 cases passed (8 ms)
// Your runtime beats 68.75 % of php submissions
// Your memory usage beats 100 % of php submissions (15 MB)
// @lc code=end

