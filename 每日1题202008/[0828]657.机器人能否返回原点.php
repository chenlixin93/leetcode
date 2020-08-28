<?
/*
 * @lc app=leetcode.cn id=657 lang=php
 *
 * [657] 机器人能否返回原点
 * 
 * https://leetcode-cn.com/problems/robot-return-to-origin/
 */

// @lc code=start
class Solution {

    /**
     * @param String $moves
     * @return Boolean
     */
    function judgeCircle($moves) {

        $len = strlen($moves);
        if ($len == 0) return true;

        $x = 0;
        $y = 0;
        
        for ($i=0; $i < $len; $i++) { 

            if ($moves[$i] == 'R') {
                $x += 1;
            } elseif ($moves[$i] == 'L') {
                $x -= 1;
            } elseif ($moves[$i] == 'U') {
                $y += 1;
            } elseif ($moves[$i] == 'D') {
                $y -= 1;
            }
        }

        return $x == 0 && $y == 0;
    }
}

// Accepted
// 63/63 cases passed (32 ms)
// Your runtime beats 9.09 % of php submissions
// Your memory usage beats 91.67 % of php submissions (14.9 MB)
// @lc code=end

