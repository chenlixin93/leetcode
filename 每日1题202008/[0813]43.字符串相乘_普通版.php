<?php
/*
 * @lc app=leetcode.cn id=43 lang=php
 *
 * [43] 字符串相乘
 * 
 * https://leetcode-cn.com/problems/multiply-strings/
 */

// @lc code=start
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        
        if (strlen($num1) == 0 || strlen($num2) == 0 || $num1 == "0" || $num2 == "0") return "0";

        $len1 = strlen($num1);
        $len2 = strlen($num2);

        $res = "0";

        // $num2 逐位与 $num1 相乘
        for ($i=$len2 - 1; $i >= 0; $i--) { 
            $carry = 0;
            $temp = "";
            for ($j=0; $j < $len2 - 1 - $i; $j++) { 
                $temp .= "0";
            }

            $n2 = $num2[$i] - '0';

            for ($j=$len1 - 1; $j >= 0 || $carry != 0; $j--) { 
                $n1 = $j < 0 ? 0 : $num1[$j] - '0';
                $product = ($n1 * $n2 + $carry) % 10;
                // 先计算的先拼接
                $temp .= $product;
                $carry = floor(($n1 * $n2 + $carry) / 10);
            }

            // $temp 此时处于逆序状态，需要翻转得到正确的数
            $res = $this->addStrings($res, strrev($temp));
        }

        return $res;
    }

    // $num2 逐位与 $num1 相加
    function addStrings($num1, $num2) {

        $len1 = strlen($num1);
        $len2 = strlen($num2);

        $build = "";
        $carry = 0;
        $i=$len1 - 1;
        $j=$len2 - 1;
        
        while ($i >= 0 || $j >= 0 || $carry != 0) {

            $x = $i < 0 ? 0 : $num1[$i] - '0';
            $y = $j < 0 ? 0 : $num2[$j] - '0';
            $sum = ($x + $y + $carry) % 10;
            $build .= $sum;
            $carry = floor(($x + $y + $carry) / 10);

            $i--;
            $j--;
        }

        return strrev($build);
    }
}

// Accepted
// 311/311 cases passed (148 ms)
// Your runtime beats 6.25 % of php submissions
// Your memory usage beats 60 % of php submissions (14.9 MB)
// @lc code=end

