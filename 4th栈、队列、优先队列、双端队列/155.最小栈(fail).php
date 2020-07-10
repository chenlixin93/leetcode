<?php
/*
 * @lc app=leetcode.cn id=155 lang=php
 *
 * [155] 最小栈
 */

// @lc code=start
class MinStack {

    protected $arr = [];
    protected $min = 'test';
    protected $sec_min = 'test';

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

        $this->arr[] = $x;

        if($this->min == 'test' ){
            $this->min = $x;
            $this->sec_min = $x;
        }else{
            // 推选最小、和第二小
            $this->min = min($this->min, $x);
            if($x > $this->min && $x < $this->sec_min){
                $this->sec_min = $x;
            }
        }

        return true;
    }
  
    /**
     * @return NULL
     */
    function pop() {
        $len = count($this->arr);
        $r = $this->arr[$len-1];
        unset($this->arr[$len-1]);

        if($r == $this->min){
            $this->min = $this->sec_min;
        }

        return $r;
    }
  
    /**
     * @return Integer
     */
    function top() {
        $len = count($this->arr);
        return $this->arr[$len-1];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return $this->min;
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

