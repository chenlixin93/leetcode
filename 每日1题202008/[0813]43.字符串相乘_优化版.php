<?php
/*
 * @lc app=leetcode.cn id=43 lang=php
 *
 * [43] 字符串相乘
 * 
 * https://leetcode-cn.com/problems/multiply-strings/
 * 参考 https://leetcode-cn.com/problems/multiply-strings/solution/you-hua-ban-shu-shi-da-bai-994-by-breezean/
 */

// @lc code=start
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {

        // 该算法是通过两数相乘时，乘数某位与被乘数某位相乘，与产生结果的位置的规律来完成。具体规律如下：
        // 乘数 num1 位数为 MM，被乘数 num2 位数为 NN， num1 x num2 结果 res 最大总位数为 M+N
        // num1[i] x num2[j] 的结果为 tmp(位数为两位，"0x","xy"的形式)，其第一位位于 res[i+j]，第二位位于 res[i+j+1]。

        if (strlen($num1) == 0 || strlen($num2) == 0 || $num1 == "0" || $num2 == "0") return "0";

        $len1 = strlen($num1);
        $len2 = strlen($num2);

        $res = array_fill(0, $len1 + $len2, 0);
        for ($i=$len1 - 1; $i >= 0; $i--) { 
            $n1 = $num1[$i] - '0';
            for ($j=$len2 - 1; $j >= 0; $j--) { 
                $n2 = $num2[$j] - '0';

                $sum = floor($res[$i + $j + 1] + $n1 * $n2);
                $res[$i + $j + 1] = floor($sum % 10);
                $res[$i + $j] = floor($res[$i + $j] + $sum / 10);
            }
        }

        $result = "";
        for ($i=0; $i < count($res); $i++) { 
            if ($i == 0 && $res[$i] == 0) continue;
            $result .= $res[$i];
        }

        return $result;
    }
}

// Accepted
// 311/311 cases passed (48 ms)
// Your runtime beats 39.58 % of php submissions
// Your memory usage beats 80 % of php submissions (14.8 MB)
// @lc code=end

