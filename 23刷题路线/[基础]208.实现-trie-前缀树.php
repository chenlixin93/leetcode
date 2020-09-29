<?php
/*
 * @lc app=leetcode.cn id=208 lang=php
 *
 * [208] 实现 Trie (前缀树)
 * 
 * https://leetcode-cn.com/problems/implement-trie-prefix-tree
 * 参考题解 https://zxi.mytechroad.com/blog/data-structure/leetcode-208-implement-trie-prefix-tree/
 */

// @lc code=start
class Trie {

    private $root;

    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
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
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node = $this->find($word);
        return $node != null && $node->is_word;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $node = $this->find($prefix);
        return $node != null;
    }

    function find($prefix) {
        $p = $this->root;
        for ($i=0; $i < strlen($prefix); $i++) { 
            $index = (int)(ord($prefix[$i]) - ord('a'));
            if ($p->children[$index] == null) return null;
            $p = $p->children[$index];
        }
        return $p;
    }
}

class TrieNode {
    public $is_word;
    public $children;

    function __construct() {
        $this->children = array_fill(0, 26, null); // 预留 26 个节点的空间
        $this->is_word = false;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */

// Accepted
// 15/15 cases passed (184 ms)
// Your runtime beats 21.62 % of php submissions
// Your memory usage beats 5.17 % of php submissions (69.8 MB)

// Accepted
// 15/15 cases passed (152 ms)
// Your runtime beats 29.73 % of php submissions
// Your memory usage beats 5.17 % of php submissions (70.1 MB)
// @lc code=end

