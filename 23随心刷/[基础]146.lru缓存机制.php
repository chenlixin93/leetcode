<?php
/*
 * @lc app=leetcode.cn id=146 lang=php
 *
 * [146] LRU缓存机制
 * 
 * https://leetcode-cn.com/problems/lru-cache/
 * 参考题解 https://leetcode-cn.com/problems/lru-cache/solution/lruhuan-cun-ji-zhi-by-leetcode-solution/
 */

// @lc code=start
class LRUCache {

    private $cache;
    private $size; 
    private $capacity;
    private $head; // 头结点，最近使用
    private $tail; // 尾结点，最近最少使用
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->size = 0;
        $this->capacity = $capacity;
        $this->head = new DLinkedNode(0, 0);
        $this->tail = new DLinkedNode(0, 0);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
        $this->cache = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!array_key_exists($key, $this->cache)) return -1;
        
        // 如果 key 存在，先通过哈希表定位，再移到头部
        $node = $this->cache[$key];
        $this->moveToHead($node);
        return $node->value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {

        if (!array_key_exists($key, $this->cache)) { 
            // 如果 key 不存在，创建一个新的节点
            $newNode = new DLinkedNode($key, $value);
            // 添加进哈希表
            $this->cache[$key] = $newNode;
            // 添加至双向链表的头部
            $this->addToHead($newNode);
            $this->size++;
            
            if ($this->size > $this->capacity) {
                // 如果超出容量，删除双向链表的尾部节点
                $tail =  $this->removeTail();
                // 删除哈希表中对应的项
                unset($this->cache[$tail->key]);
                $this->size--;
            }
        } else {
            // 如果 key 存在，先通过哈希表定位，再修改 value，并移到头部
            $node = $this->cache[$key];
            $node->value = $value;
            $this->moveToHead($node);
        }
    }

    /**
     * 添加到头结点 
     */
    private function addToHead($node) {
        $node->prev = $this->head; // 将 node 的 prev 指向 head
        $node->next = $this->head->next; // 将 node 的 next 指向原来 head 的 next
        $this->head->next->prev = $node; // 将原来 head 的后继结点的 prev 指向 node
        $this->head->next = $node; // 将原来 head 的 next 指向 node
    }

    /**
     * 删除结点 
     */
    private function removeNode($node) {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    /**
     * 最近使用的数据，移动到头结点
     */
    private function moveToHead($node) {
        $this->removeNode($node);
        $this->addToHead($node);
    }

    /**
     * 超过最大容量时，删除尾结点（最近最少使用）
     */
    private function removeTail() {
        // head 1 2 3 tail
        $res = $this->tail->prev; 
        $this->removeNode($res);
        return $res;
    }
}

// 简易双向链表
class DLinkedNode {
    public $key;
    public $value;
    public $prev; // 前一个结点
    public $next; // 下一个结点

    function __construct($key, $value) {
        $this->key = $key;
        $this->value = $value;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */

// Accepted
// 18/18 cases passed (116 ms)
// Your runtime beats 90.37 % of php submissions
// Your memory usage beats 25.88 % of php submissions (35.9 MB)
// @lc code=end

