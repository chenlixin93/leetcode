<?php
/*
 * @lc app=leetcode.cn id=207 lang=php
 *
 * [207] 课程表
 * 
 * https://leetcode-cn.com/problems/course-schedule/
 * 视频讲解 https://www.bilibili.com/video/BV1A5411x7qH?from=search&seid=301563866698097304
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        
        $graph = [];
        $in_degree = [];

        for ($i=0; $i < $numCourses; $i++) { 
            $graph[$i] = [];
        }

        foreach ($prerequisites as $pair) {
            $pre = $pair[1];
            $cur = $pair[0];
            $graph[$pre][] = $cur; // 先修课程指向当前课程
            $in_degree[$cur]++; // 当前课程入度值 +1
        }

        // bfs
        $visited = 0;
        $queue = [];
        for ($i=0; $i < $numCourses; $i++) { 
            if ($in_degree[$i] == 0) {
                array_push($queue, $i); // 入度值为0即可以去上课
            }
        }

        while (!empty($queue)) {
            $cur = array_shift($queue); // 当前课程出队列，去上课
            $visited++;
            foreach ($graph[$cur] as $child) { // 当前课程为其他课程的先修课程时，
                $in_degree[$child]--; // 其他课程入度值 -1
                if ($in_degree[$child] == 0) { // 入度值为0即可以去上课
                    array_push($queue, $child);
                }
            }
        }

        return $visited == $numCourses;
    }
}

// Accepted
// 46/46 cases passed (56 ms)
// Your runtime beats 62.5 % of php submissions
// Your memory usage beats 75 % of php submissions (18.3 MB)
// @lc code=end

