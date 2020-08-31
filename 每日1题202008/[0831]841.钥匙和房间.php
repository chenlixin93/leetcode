<?php
/*
 * @lc app=leetcode.cn id=841 lang=php
 *
 * [841] 钥匙和房间
 * 
 * https://leetcode-cn.com/problems/keys-and-rooms/
 */

// @lc code=start
class Solution {

    protected $num;
    protected $visited;
    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        
        $n = count($rooms);
        $this->num = 0;
        $this->visited = array_fill(0, $n, 0);
        $this->dfs($rooms, 0);

        return $n == $this->num; // 是否全部访问过
    }

    function dfs($rooms, $x) {
        $this->visited[$x] = 1;
        $this->num++;

        foreach ($rooms[$x] as $key) {
            if (!$this->visited[$key]) { // 如果没有访问过，下探至下一层
                $this->dfs($rooms, $key);
            }
        }
    }
}

// Accepted
// 67/67 cases passed (32 ms)
// Your runtime beats 42.86 % of php submissions
// Your memory usage beats 100 % of php submissions (16.3 MB)
// @lc code=end

