<?php
/*
 * @lc app=leetcode.cn id=17 lang=php
 *
 * [17] 电话号码的字母组合
 */

// @lc code=start
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {

        if($digits == null) {
            return [];
        }

        $map = [
            '2' => 'abc',
            '3' => 'def',
            '4' => 'ghi',
            '5' => 'jkl',
            '6' => 'mno',
            '7' => 'pqrs',
            '8' => 'tuv',
            '9' => 'wxyz'
        ];

        $res = [];
        $this->helper("", $digits, 0, $res, $map);

        return $res;
    }

    function helper($s, $digits, $i, &$res, $map) {

        if(strlen($s) == strlen($digits)) {
            $res[] = $s;
            return true;
        }

        $letters = $map[$digits[$i]];
        for ($j=0; $j < strlen($letters); $j++) { 
            
            $this->helper($s.$letters[$j], $digits, $i+1, $res, $map);
        }
    }
}

// Accepted
// 25/25 cases passed (4 ms)
// Your runtime beats 91.45 % of php submissions
// Your memory usage beats 100 % of php submissions (14.8 MB)
// @lc code=end

