<?php
/*
 * @lc app=leetcode.cn id=155 lang=php
 *
 * [155] 最小栈
 */

// @lc code=start
class MinStack {
    private $data = array();
    /**
     * initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->data,$x);
    }

    /**
     * @return NULL
     */
    function pop() {
        if(empty($this->data)){
            return null;
        }
        return array_pop($this->data);
    }

    /**
     * @return Integer
     */
    function top() {
        if(empty($this->data)){
            return null;
        }

        $temp = end($this->data);
        reset($this->data);

        return $temp;
    }

    /**
     * @return Integer
     */
    function getMin() {
        if(empty($this->data)){
            return null;
        }
        return min($this->data);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
// @lc code=end

