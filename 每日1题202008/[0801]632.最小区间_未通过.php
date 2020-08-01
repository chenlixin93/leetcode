<?php
/*
 * @lc app=leetcode.cn id=632 lang=php
 *
 * [632] 最小区间
 * 
 * https://leetcode-cn.com/problems/smallest-range-covering-elements-from-k-lists/
 * 视频讲解 https://www.bilibili.com/video/BV1Vt4y1D7vQ?from=search&seid=7831331178458850114
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $nums
     * @return Integer[]
     */
    function smallestRange($nums) {
        
        $n = count($nums);
        $candidate = [];//维护滑动窗口

        // 先取每个数组的最小位
        for ($i=0; $i < $n; $i++) { 
            $Elem = new Elem($i, 0, $nums[$i][0]);
            $candidate[] = $Elem;
        }

        $this->sortCandidate($candidate);

        $range = PHP_INT_MAX;
        $res = [];
        while (count($candidate) == $n) {
            // 如何保证 $candidate 自动有序是关键
            $max = $candidate[$n - 1]->val;
            $min = $candidate[0]->val;

            if ($max - $min < $range) {
                $range = $max - $min;
                $res[0] = $min;
                $res[1] = $max;
            }

            $first = $candidate[0];
            unset($candidate[0]);
            if ($first->idx + 1 < count($nums[$first->list])) {
                $next = new Elem($first->list, $first->idx + 1, $nums[$first->list][$first->idx + 1]);
                $candidate[] = $next;
            }

            $this->sortCandidate($candidate);
            //print_r($candidate);die();
        }

        return $res;
    }

    function sortCandidate(&$candidate) {

        $tmp = [];
        $tmp_val = [];
        // 重新排序
        foreach ($candidate as $can) {
            $tmp["t".$can->val] = $can;
            $tmp_val[] = $can->val;
        }

        $candidate = [];
        sort($tmp_val);

        foreach ($tmp_val as $val) {
            $candidate[] = $tmp["t".$val];
        }
        print_r($candidate);
    }
}

class Elem { 
    public $list; //列表序号
    public $idx; //索引 
    public $val; //具体值

    public function __construct($list, $idx, $val){
        $this->list = $list;
        $this->idx = $idx;
        $this->val = $val;
    }
}

// Wrong Answer
// 64/86 cases passed (N/A)
// @lc code=end

