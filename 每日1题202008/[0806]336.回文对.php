<?php
/*
 * @lc app=leetcode.cn id=336 lang=php
 *
 * [336] 回文对
 * 
 * 
 */

// @lc code=start
class Solution {
    protected $wordRev = [];
    protected $indices = [];

    /**
     * @param String[] $words
     * @return Integer[][]
     */
    function palindromePairs($words) {

        $n = count($words);
        foreach ($words as $word) {
            $this->wordRev[] = strrev($word); // 存储翻转结果
        }

        for ($i=0; $i < $n; $i++) { 
            $this->indices[$this->wordRev[$i]] = $i; // 存储翻转结果与原字符索引
        }

        $ret = [];
        for ($i=0; $i < $n; $i++) { 
            $word = $words[$i];
            $m = strlen($word); // 长度
            if ($m == 0) {
                continue;
            }

            for ($j=0; $j <= $m; $j++) { 
                if ($this->isVaild($word, $j, $m - 1)) {
                    $left_id = $this->findWord($word, 0, $j - 1);
                    if ($left_id != -1 && $left_id != $i) {
                        $ret[] = [$i, $left_id];
                    }
                }
                if ($j != 0 && $this->isVaild($word, 0, $j - 1)) {
                    $right_id = $this->findWord($word, $j, $m - 1);
                    if ($right_id != -1 && $right_id != $i) {
                        $ret[] = [$right_id, $i];
                    }
                }
            }
        }

        return $ret;
    }

    function isVaild($s, $left, $right) {

        $len = $right - $left + 1;
        for ($i=0; $i < $len / 2; $i++) { 
            if ($s[$left + $i] != $s[$right - $i]) {
                return false;
            }
        }

        return true;
    }

    function findWord($s, $left, $right) {

        $s = substr($s, $left, $right + 1);
        if (array_key_exists($s, $this->indices)) { 
            return $this->indices[$s];
        }

        return -1;
    }
}

// Accepted
// 134/134 cases passed (268 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (18.5 MB)
// @lc code=end

