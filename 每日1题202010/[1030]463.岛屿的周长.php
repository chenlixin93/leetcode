<?php
/*
 * @lc app=leetcode.cn id=463 lang=php
 *
 * [463] 岛屿的周长
 * 
 * https://leetcode-cn.com/problems/island-perimeter/
 * 参考题解 https://zxi.mytechroad.com/blog/math/leetcode-463-island-perimeter/
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {

        if (count($grid) == 0 || count($grid[0]) == 0) return 0;

        $area = 0;
        $conn = 0;
        $m = count($grid);
        $n = count($grid[0]);
        for ($i=0; $i < $m; $i++) { 
            for ($j=0; $j < $n; $j++) { 
                if ($grid[$i][$j] == 1) {
                    ++$area; // 岛屿数量+1
                    if ($i > 0 && $grid[$i - 1][$j] == 1) ++$conn; // 如果上面有岛屿各子，记录一次相邻
                    if ($j > 0 && $grid[$i][$j - 1] == 1) ++$conn; // 如果左边有岛屿各子，记录一次相邻
                }
            }
        }

        return $area*4 - $conn*2; // 每次相邻需要减去合并的两条边
    }
}

// Accepted
// 5833/5833 cases passed (220 ms)
// Your runtime beats 65.22 % of php submissions
// Your memory usage beats 52.63 % of php submissions (17.3 MB)
// @lc code=end

