<?php
/*
 * @lc app=leetcode.cn id=329 lang=php
 *
 * [329] 矩阵中的最长递增路径
 * 
 * https://leetcode-cn.com/problems/longest-increasing-path-in-a-matrix/
 */

// @lc code=start
class Solution {

    protected $m;
    protected $n;
    protected $res;
    protected $visited;
    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function longestIncreasingPath($matrix) {

        if(count($matrix) == 0 || count($matrix[0]) == 0) {
            return 0;
        }

        $this->m = count($matrix);
        $this->n = count($matrix[0]);

        // 提交时是循环测试，不太必要的步骤
        //$this->res = [];
        //$this->visited = [];

        $this->res = array_fill(0, $this->m, array_fill(0, $this->n, 0));
        $this->visited = array_fill(0, $this->m, array_fill(0, $this->n, 0));
        $max = 0;

        for ($i = 0; $i < $this->m; $i++) {
            for($j = 0; $j < $this->n; $j++) {
                $max = max($max, $this->dfs($matrix, $i, $j));
            }
        }

        // 提交时是循环测试，不太必要的步骤
        //unset($this->res);
        //unset($this->visited);

        return $max;
    }

    function dfs($mat, $x, $y) {

        if($this->res[$x][$y] != 0) {
            return $this->res[$x][$y];
        }

        $this->visited[$x][$y] = 1;

        $dx = [0, 0, -1, 1];
        $dy = [-1, 1, 0, 0];
        $len = 0;

        for ($i = 0; $i < count($dx); $i++) {
            $nx = $x + $dx[$i];
            $ny = $y + $dy[$i];

            if($nx >= 0 && $nx < $this->m && $ny >= 0 && $ny < $this->n && !$this->visited[$nx][$ny] && $mat[$nx][$ny] > $mat[$x][$y]) {
                $len = max($len, $this->dfs($mat, $nx, $ny));
            }
        }

        $this->visited[$x][$y] = 0;

        $this->res[$x][$y] = $len + 1;
        return $this->res[$x][$y];
    }
}


// @lc code=end

