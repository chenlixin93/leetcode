<?php
/*
 * @lc app=leetcode.cn id=394 lang=php
 *
 * [394] 字符串解码
 * 
 * https://leetcode-cn.com/problems/decode-string/
 * 视频讲解 https://www.bilibili.com/video/BV1N4411u7ma?from=search&seid=2680718683182352063
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s) {

        $numStack = []; // 数字栈
        $strStack = []; // 字符栈

        $tail = "";
        $n = strlen($s);
        for ($i=0; $i < $n; $i++) { 
            $c = $s[$i];
            if (is_numeric($c)) { // 计算数字大小，入栈
                $num = $c - '0';
                while ($i + 1 < $n && is_numeric($s[$i + 1])) {
                    $num = $num * 10 + $s[$i + 1] - '0';

                    $i++;
                }
                $numStack[] = $num;
            } elseif ($c == '[') { // 遇到左括号，tail入栈，并清空tail
                $strStack[] = $tail;
                $tail = "";
            } elseif ($c == ']') { // 遇到右括号，字符出栈并重复加上tail，再赋给tail
                $tmp = array_pop($strStack);
                $repeatedTimes = array_pop($numStack);

                for ($j=0; $j < $repeatedTimes; $j++) { 
                    $tmp .= $tail;
                }

                $tail = $tmp;
            } else { // 普通字符拼接在tail后面
                $tail .= $c;
            }
        }

        return $tail;
    }
}

// Accepted
// 29/29 cases passed (8 ms)
// Your runtime beats 53.57 % of php submissions
// Your memory usage beats 9.09 % of php submissions (15 MB)
// @lc code=end

