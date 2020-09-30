<?php
/*
 * @lc app=leetcode.cn id=212 lang=php
 *
 * [212] 单词搜索 II
 * 
 * https://leetcode-cn.com/problems/word-search-ii/
 */

// @lc code=start
class Solution {
    
    private $root;
    protected $ans_;
    protected $h;
    protected $w;

    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root = new TrieNode(); // 构建根节点
    }

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words) {
        // 以“实现 trie 前缀树”为基础
        $this->ans_ = [];
        $this->h = count($board);  // 行树
        $this->w = count($board[0]); // 列数

        // 插入字典树
        foreach ($words as $word) {
            $this->insert($word);
        }

        // 遍历网格（深度优先搜索）
        for ($i=0; $i < $this->h; $i++) { 
            for ($j=0; $j < $this->w; $j++) { 
                $this->dfs($j, $i, $board, $this->root);
            }
        }
        
        return $this->ans_;
    }

    // 插入字典树
    function insert($word) {
        $p = $this->root;
        for ($i=0; $i < strlen($word); $i++) { 
            $index = (int)(ord($word[$i]) - ord('a'));
            if ($p->children[$index] == null) {
                $p->children[$index] = new TrieNode();
            }
            $p = $p->children[$index]; // 移动到子节点
        }
        $p->word = $word; // 当前单词走完一遍，直接存入单词
    }

    function dfs($x, $y, &$board, $tree) {
        // 剪枝
        if ($x < 0 || $x >= $this->w || $y < 0 || $y >= $this->h || $board[$y][$x] == '#') return false;

        $cur = $board[$y][$x];
        $next_tree = $tree->children[ord($cur) - ord('a')];

        if ($next_tree == null) return false;

        if ($next_tree->word != null) {
            $this->ans_[] = $next_tree->word;
            $next_tree->word = null;
        }

        $tmp = $board[$y][$x];
        $board[$y][$x] = '#';
        $this->dfs($x + 1, $y, $board, $next_tree);
        $this->dfs($x - 1, $y, $board, $next_tree);
        $this->dfs($x, $y + 1, $board, $next_tree);
        $this->dfs($x, $y - 1, $board, $next_tree);
        $board[$y][$x] = $tmp;
    }
}

// 字典树数据结构
class TrieNode {
    public $word;
    public $children;

    function __construct() {
        $this->children = array_fill(0, 26, null); // 预留 26 个节点的空间，因为字符范围在 a-z 之间
        $this->word = null;
    }
}

// Accepted
// 36/36 cases passed (308 ms)
// Your runtime beats 16.67 % of php submissions
// Your memory usage beats 50 % of php submissions (87.1 MB)
// @lc code=end

