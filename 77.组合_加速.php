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

        for ($i=$start; $i <= ($this->n - ($this->k - count($tmp)) + 1); $i++) { 
            $tmp[] = $i;
            $this->helper($i + 1, $tmp, $res);
            array_pop($tmp);
        }
    }
}

// Accepted
// 27/27 cases passed (32 ms)
// Your runtime beats 80.39 % of php submissions
// Your memory usage beats 100 % of php submissions (19.4 MB)
// @lc code=end

