<?php
/*
 * @lc app=leetcode.cn id=1002 lang=php
 *
 * [1002] 查找常用字符
 * 
 * https://leetcode-cn.com/problems/find-common-characters/
 */

// @lc code=start
class Solution {

    protected $map = [
        0 => 'a',
        1 => 'b',
        2 => 'c',
        3 => 'd',
        4 => 'e',
        5 => 'f',
        6 => 'g',
        7 => 'h',
        8 => 'i',
        9 => 'j',
        10 => 'k',
        11 => 'l',
        12 => 'm',
        13 => 'n',
        14 => 'o',
        15 => 'p',
        16 => 'q',
        17 => 'r',
        18 => 's',
        19 => 't',
        20 => 'u',
        21 => 'v',
        22 => 'w',
        23 => 'x',
        24 => 'y',
        25 => 'z',
    ];

    /**
     * @param String[] $A
     * @return String[]
     */
    function commonChars($A) {
        
        if (count($A) == 0) return [];

        $hash = array_fill(0, 26, 0); // 统计所有字符串里字符出现的最小频率
        for ($i=0; $i < strlen($A[0]); $i++) { // 初始化
            $hash[ord($A[0][$i]) - ord('a')]++;
        }

        for ($i=1; $i < count($A); $i++) { // 从第二个字符串开始统计
            $hash_other_str = array_fill(0, 26, 0);
            for ($j=0; $j < strlen($A[$i]); $j++) { 
                $hash_other_str[ord($A[$i][$j]) - ord('a')]++;
            }

            for ($k=0; $k < 26; $k++) { // 与 hash 比较，保留较小频率的次数
                $hash[$k] = min($hash[$k], $hash_other_str[$k]);
            }
        }

        // 输出
        $result = [];
        for ($i=0; $i < 26; $i++) { 
            while ($hash[$i] != 0) {
                $result[] = $this->map[$i];
                $hash[$i]--;
            }
        }

        return $result;
    }
}

// Accepted
// 83/83 cases passed (24 ms)
// Your runtime beats 41.18 % of php submissions
// Your memory usage beats 7.69 % of php submissions (15.2 MB)
// @lc code=end

