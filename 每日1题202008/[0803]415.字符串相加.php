<?php
/*
 * @lc app=leetcode.cn id=415 lang=php
 *
 * [415] 字符串相加
 * 
 * https://leetcode-cn.com/problems/add-strings/
 */

// @lc code=start
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function addStrings($num1, $num2) {
        
        $len = strlen($num1);
        $len2 = strlen($num2);

        // 特殊情况判断
        if($len == 0) {
            return $num2;
        }

        // 特殊情况判断
        if($len2 == 0) {
            return $num1;
        }

        $res = "";
        $m = 0; // 是否需要进位
        $j = $len2 - 1; // num2 的最后一位

        for ($i=$len - 1; $i >= 0; $i--) {
            if ($j >= 0) {
                $t = $num1[$i] + $num2[$j] + $m;
                $j--;
            } else {
                $t = $num1[$i] + $m;
            }

            if ($t >= 10) {
                $t = $t - 10;
                $m = 1;
            }else{
                $m = 0;// 重置进位
            }

            $res = $t.$res;
        }

        if ($j >= 0) {
            //num2 比 num1 长的情况
            $left = substr($num2, 0, $j + 1);
            if($m == 1) {
                // 避免 left 过大，相加后变成科学计数法，会报错
                $left = $this->addStrings($left, "1");
            }
            $res =  $left.$res;
        }else{
            // num1 较长时
            $res = $m == 1 ? $m.$res : $res;
        }

        return $res;
    }
}

// Accepted
// 315/315 cases passed (8 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (14.7 MB)
// @lc code=end

