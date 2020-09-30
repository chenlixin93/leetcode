<?php
/*
 * @lc app=leetcode.cn id=211 lang=php
 *
 * [211] 添加与搜索单词 - 数据结构设计
 * 
 * https://leetcode-cn.com/problems/design-add-and-search-words-data-structure/
 * 参考视频讲解 https://www.bilibili.com/video/BV17h411Z7hX?from=search&seid=16370997212279153269
 */

// @lc code=start
class WordDictionary {

    protected $root;

    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Adds a word into the data structure.
     * @param String $word
     * @return NULL
     */
    function addWord($word) {
        $p = $this->root;
        for ($i=0; $i < strlen($word); $i++) { 
            $index = (int)(ord($word[$i]) - ord('a'));
            if ($p->children[$index] == null) {
                $p->children[$index] = new TrieNode();
            }
            $p = $p->children[$index];
        }
        $p->is_word = true;
    }

    /**
     * Returns if the word is in the data structure. A word could contain the dot character '.' to represent any one letter.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        return $this->find($word, 0, $this->root);
    }

    // 重点是处理有 “.” 的情况
    function find($word, $start, $node) {
        $p = $node;
        for ($i=$start; $i < strlen($word); $i++) { 
            if ($word[$i] == '.') {
                for ($j=0; $j < 26; $j++) { 
                    // 以下一个字符为起点
                    if ($p->children[$j] != null && $this->find($word, $i + 1, $p->children[$j])) {
                        return true;
                    }
                }
                return false;
            }

            $index = (int)(ord($word[$i]) - ord('a'));
            if ($p->children[$index] == null) return false;
            $p = $p->children[$index]; // 字典树往下走一步
        }
        return $p->is_word;
    }
}

// 字典树数据结构
class TrieNode {
    public $children;
    public $is_word;

    function __construct() {
        $this->children = array_fill(0, 26, null); // addWord 中的 word 由小写英文字母组成
        $this->is_word = false;
    }
}

/**
 * Your WordDictionary object will be instantiated and called as such:
 * $obj = WordDictionary();
 * $obj->addWord($word);
 * $ret_2 = $obj->search($word);
 */

// Accepted
// 13/13 cases passed (268 ms)
// Your runtime beats 6.25 % of php submissions
// Your memory usage beats 7.14 % of php submissions (72.2 MB)
// @lc code=end

