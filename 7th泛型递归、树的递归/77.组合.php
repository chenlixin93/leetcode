<?php
/*
 * @lc app=leetcode.cn id=77 lang=php
 *
 * [77] 组合
 */

// @lc code=start
class Solution {

    protected $n; 
    protected $k; 

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {

        $this->n = $n;
        $this->k = $k;
        $res = [];
        $tmp = [];
        $this->helper(1, $tmp, $res);
        return $res;
    }

    function helper($start, &$tmp, &$res) {

        if(count($tmp) == $this->k){
            $res[] = $tmp;
            return true;
        }

        // 从 start 到 n
        for ($i = $start; $i <= $this->n; $i++) { 
            $tmp[] = $i;
            $this->helper($i + 1, $tmp, $res);
            array_pop($tmp);
        }
    }
}

// Accepted
// 27/27 cases passed (144 ms)
// Your runtime beats 50.98 % of php submissions
// Your memory usage beats 100 % of php submissions (19.5 MB)
// @lc code=end

