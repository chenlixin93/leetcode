<?php
/*
 * @lc app=leetcode.cn id=212 lang=php
 *
 * [212] 单词搜索 II
 */

// @lc code=start
class Solution {

    protected $h;
    protected $w;

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words) {

        $unique_words = array_unique($words);
        $ans = [];

        // 遍历每一个单词
        foreach ($unique_words as $word) {
            if ($this->exist($board, $word)) {
                $ans[] = $word;
            }
        }

        return $ans;
    }

    // 以每一个坐标为起点
    function exist(&$board, $word) {
        if (count($board) == 0) return false;

        $this->h = count($board);
        $this->w = count($board[0]);

        for ($i=0; $i < $this->w; $i++) { 
            for ($j=0; $j < $this->h; $j++) { 
                if ($this->dfs($board, $word, 0, $i, $j)) return true;
            }
        }

        return false;
    }

    // 如果当前坐标符合条件，则搜索相邻坐标是否等于单词的下一位字符
    function dfs(&$board, $word, $d, $x, $y) {

        // 剪枝
        if ($x < 0 || $x >= $this->w || $y < 0 || $y >= $this->h || $word[$d] != $board[$y][$x]) return false;

        // 退出
        if ($d == strlen($word) - 1) return true;

        $tmp = $board[$y][$x];
        $board[$y][$x] = '#';
        $found = ($this->dfs($board, $word, $d + 1, $x + 1, $y) ||
                $this->dfs($board, $word, $d + 1, $x - 1, $y) ||
                $this->dfs($board, $word, $d + 1, $x, $y + 1) ||
                $this->dfs($board, $word, $d + 1, $x, $y - 1));
        $board[$y][$x] = $tmp;
        return $found;
    }
}

// 超时
// @lc code=end

