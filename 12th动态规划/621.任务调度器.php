<?php
/*
 * @lc app=leetcode.cn id=621 lang=php
 *
 * [621] 任务调度器
 * 
 * https://leetcode-cn.com/problems/task-scheduler/
 * 视频讲解 https://www.bilibili.com/video/BV11t411V7h3?from=search&seid=15024347809109592064
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    function leastInterval($tasks, $n) {
        // 题目要求，每个相同任务都要冷却 n 单位的时间

        $record = [];
        foreach ($tasks as $task) {
            $record[$task] = isset($record[$task]) ? $record[$task] + 1 : 1;
        }

        // 排序后，想象由高到底低覆盖一个矩形
        sort($record);

        $len = count($record);// kind of tasks
        $max_n = $record[$len - 1] - 1; // 最后一行执行结束退出，不需要等待时间
        $space = $max_n * $n; // 从倒数第二行形成矩形，覆盖任务执行时间和等待时间

        for ($i=$len - 2; $i >= 0; $i--) { 
            // 逐步减去矩形中任务的执行时间，剩下就是所需的等待时间
            $space = $space - min($max_n, $record[$i]);
        }

        return $space > 0 ? count($tasks) + $space : count($tasks);
    }
}

// Accepted
// 69/69 cases passed (140 ms)
// Your runtime beats 66.67 % of php submissions
// Your memory usage beats 100 % of php submissions (16.7 MB)
// @lc code=end

