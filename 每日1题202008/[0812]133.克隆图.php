<?php
/*
 * @lc app=leetcode.cn id=133 lang=php
 *
 * [133] 克隆图
 * 
 * https://leetcode-cn.com/problems/clone-graph/
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $neighbors = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->neighbors = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node) {
        $s = serialize($node);
        return unserialize($s);
    }
}

// Accepted
// 21/21 cases passed (12 ms)
// Your runtime beats 80.95 % of php submissions
// Your memory usage beats 33.33 % of php submissions (16.1 MB)
// @lc code=end

