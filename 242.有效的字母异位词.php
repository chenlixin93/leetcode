<?php
/*
 * @lc app=leetcode.cn id=242 lang=php
 *
 * [242] 有效的字母异位词
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        
        $tmp = [];
        for ($i=0; $i < strlen($s); $i++) { 
            $tmp[$s[$i]] += 1;
        }

        for ($i=0; $i < strlen($t); $i++) { 

            // 不存在即为假
            if(!array_key_exists($t[$i], $tmp)){
                return false;
            }

            $tmp[$t[$i]] -= 1;

            // 减到为负为假
            if($tmp[$s[$i]] < 0){
                return false;
            }
        }

        foreach($tmp as $ss){
            if($ss > 0){
                return false;
            }
        }

        return true;
    }
}

// Accepted
// 34/34 cases passed (16 ms)
// Your runtime beats 63.69 % of php submissions
// Your memory usage beats 100 % of php submissions (14.9 MB)
// @lc code=end

