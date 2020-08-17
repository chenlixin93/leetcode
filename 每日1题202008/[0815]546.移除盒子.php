<?php
/*
 * @lc app=leetcode.cn id=546 lang=php
 *
 * [546] 移除盒子
 * 
 * https://leetcode-cn.com/problems/remove-boxes/
 * 视频讲解 https://www.bilibili.com/video/BV11W411Z7jG?from=search&seid=1926116731256697431
 */

// @lc code=start
class Solution {
    protected $m_;
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeBoxes($nums) {
        $n = count($nums);

        $this->m_ = array_fill(0, $n, array_fill(0, $n, array_fill(0, $n, 0)));
        return $this->dfs($nums, 0, $n - 1, 0);
    }

    function dfs(&$nums, $l, $r, $k) {
        if ($l > $r) return 0;
        if ($this->m_[$l][$r][$k] > 0) return $this->m_[$l][$r][$k];
        $this->m_[$l][$r][$k] = $this->dfs($nums, $l, $r - 1, 0) + ($k+1) * ($k+1);

        for ($i = $l; $i < $r; $i++) {
            if ($nums[$i] == $nums[$r]) {
                $this->m_[$l][$r][$k] = max($this->m_[$l][$r][$k], $this->dfs($nums, $l, $i, $k + 1) + $this->dfs($nums, $i + 1, $r - 1, 0));
            }
        }

        return $this->m_[$l][$r][$k];
    }
}
// @lc code=end

