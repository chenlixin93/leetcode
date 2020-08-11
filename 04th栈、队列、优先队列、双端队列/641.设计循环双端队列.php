<?php
/*
 * @lc app=leetcode.cn id=641 lang=php
 *
 * [641] 设计循环双端队列
 */

// @lc code=start
class MyCircularDeque {
    public $count = 0;
     public $head = 0;
     public $tail = 0;
     public $queue = [];
 
     /**
      * Initialize your data structure here. Set the size of the deque to be k.
      * @param Integer $k
      */
     function __construct($k)
     {
         $this->count = $k + 1;
     }
 
     /**
      * Adds an item at the front of Deque. Return true if the operation is successful.
      * @param Integer $value
      * @return Boolean
      */
     function insertFront($value)
     {
         if ($this->isFull()) {
             return false;
         }
         //注意后面2行的先后顺序，先移动指针，再赋值head和tail必须要有一个这样操作，不然就会覆盖，或者用空数组
         $this->head = ($this->head - 1 + $this->count) % $this->count;
         $this->queue[$this->head] = $value;
         return true;
     }
 
     /**
      * Adds an item at the rear of Deque. Return true if the operation is successful.
      * @param Integer $value
      * @return Boolean
      */
     function insertLast($value)
     {
         if ($this->isFull()) {
             return false;
         }
         //注意下面2行的先后顺序，先赋值，再进行移动指针
         $this->queue[$this->tail] = $value;
         $this->tail = ($this->tail + 1) % $this->count;
         return true;
     }
 
     /**
      * Deletes an item from the front of Deque. Return true if the operation is successful.
      * @return Boolean
      */
     function deleteFront()
     {
         if ($this->isEmpty()) {
             return false;
         }
         $this->head = ($this->head + 1) % $this->count;
         return true;
     }
 
     /**
      *删除队列的最后一位
      * Deletes an item from the rear of Deque. Return true if the operation is successful.
      * @return Boolean
      */
     function deleteLast()
     {
         if ($this->isEmpty()) {
             return false;
         }
 
         $this->tail = ($this->tail - 1 + $this->count) % $this->count;
         return true;
     }
 
     /**
      *返回队列首部
      * Get the front item from the deque.
      * @return Integer
      */
     function getFront()
     {
         if ($this->isEmpty()) {
             return -1;
         }
 
         return $this->queue[$this->head];
     }
 
     /**
      * 返回队列尾部的最后一个，注意不能删除
      * Get the last item from the deque.
      * @return Integer
      */
     function getRear()
     {
         if ($this->isEmpty()) {
             return -1;
         }
         return $this->queue[($this->tail - 1 + $this->count) % $this->count];
     }
 
     /**
      * Checks whether the circular deque is empty or not.
      * @return Boolean
      */
     function isEmpty()
     {
         return $this->head == $this->tail;
     }


     /**
      * 
      * Checks whether the circular deque is full or not.
      * @return Boolean
      */
     function isFull()
     {
         return ($this->tail + 1) % $this->count == $this->head;
     }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */
// @lc code=end

