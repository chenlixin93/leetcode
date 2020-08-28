<?php
/*
 * @lc app=leetcode.cn id=818 lang=php
 *
 * [818] 赛车
 * 
 * https://leetcode-cn.com/problems/race-car/
 * 视频讲解 https://www.bilibili.com/video/BV1cW411o7Tb?from=search&seid=13287282426872130045
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $target
     * @return Integer
     */
    function racecar($target) {
        // BFS
        $q = [];
        array_push($q, [0, 1]);

        $v = [
            "0_1"  => 1,
            "0_-1" => 1
        ];
        $steps = 0;
        while (!empty($q)) {
            $size = count($q);
            while ($size--) {
                $p = array_shift($q);
                $pos = $p[0];
                $speed = $p[1];

                $pos1 = $pos + $speed;
                $speed1 = $speed * 2;
                $p1 = [$pos1, $speed1];
                if ($pos1 == $target) return $steps + 1;
                if ($p1[0] > 0 && $p1[0] < 2 * $target) { // 剪枝
                    array_push($q, $p1);
                }

                $speed2 = $speed > 0 ? -1 : 1;
                $p2 = [$pos, $speed2];
                $key2 = (string)($pos."_".$speed2);
                if (!array_key_exists($key2, $v)) {
                    array_push($q, $p2);
                    $v[$key2] = 1;
                }
            }
            $steps++;
        }

        return -1;
    }
}
// @lc code=end

