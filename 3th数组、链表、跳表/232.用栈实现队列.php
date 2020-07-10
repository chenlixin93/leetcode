<?php
/*
 * @lc app=leetcode.cn id=232 lang=php
 *
 * [232] 用栈实现队列
 */

// @lc code=start
class MyQueue {

    // 入栈
    private $arr1 = [];
    // 出栈
    private $arr2 = [];

    /**
     * Initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->arr1[] = $x;
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop() {

        if(empty($this->arr2)){

            for ($i = count($this->arr1)-1; $i > 0; $i--) {
                $this->arr2[] = $this->arr1[$i];
                unset($this->arr1[$i]);
            }

            $data = $this->arr1[0];
            unset($this->arr1[0]);
            $this->arr1 = array_values($this->arr1);
            return $data;
        }

        $len = count($this->arr2)-1;
        $data = $this->arr2[$len];

        unset($this->arr2[$len]);
        $this->arr2 = array_values($this->arr2);
        return $data;
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {

        if(empty($this->arr1) && !empty($this->arr2)){
            return $this->arr2[count($this->arr2)-1];
        }
        return $this->arr1[0];
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty() {

        if(empty($this->arr1) && empty($this->arr2)){
            return true;
        }

        return false;
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */
// @lc code=end

