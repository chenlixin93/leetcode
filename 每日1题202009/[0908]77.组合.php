<?php
/*
 * @lc app=leetcode.cn id=77 lang=php
 *
 * [77] 组合
 * 
 * https://leetcode-cn.com/problems/combinations/
 * 参考题解 https://leetcode-cn.com/problems/combinations/solution/hui-su-suan-fa-jian-zhi-python-dai-ma-java-dai-ma-/
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

        // 搜索起点的上界 + 接下来要选择的元素个数 - 1 = n
        // 搜索起点的上界 = n - (k - path.size()) + 1
        for ($i=$start; $i <= ($this->n - ($this->k - count($tmp)) + 1); $i++) { 
            $tmp[] = $i;
            $this->helper($i + 1, $tmp, $res);
            array_pop($tmp);
        }
    }
}

// Accepted
// 27/27 cases passed (24 ms)
// Your runtime beats 97.6 % of php submissions
// Your memory usage beats 59.54 % of php submissions (19.7 MB)
// @lc code=end

