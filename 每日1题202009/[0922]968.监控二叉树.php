<?php
/*
 * @lc app=leetcode.cn id=968 lang=php
 *
 * [968] 监控二叉树
 * 
 * https://leetcode-cn.com/problems/binary-tree-cameras/
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    public static $NONE = 0; // 叶子节点
    public static $COVERED = 1; // 被覆盖节点
    public static $CAMERA = 2; // 放置相机的节点
    protected $ans;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minCameraCover($root) {

        $this->ans = 0;
        if ($this->dfs($root) == self::$NONE) $this->ans++;

        return $this->ans;
    }

    function dfs($root) {

        // 当前节点是空节点，可以看成被父节点所覆盖，返回状态1
        if ($root == null) return self::$COVERED;

        $l = $this->dfs($root->left);
        $r = $this->dfs($root->right);

        // 如果子节点出现叶子节点，则当前节点选择放置相机（局部最优选择），返回状态2
        if ($l == self::$NONE || $r == self::$NONE) {
            $this->ans++;
            return self::$CAMERA;
        }

        // 如果子节点出现相机节点，则当前节点被覆盖，返回状态1
        if ($l == self::$CAMERA || $r == self::$CAMERA) {
            return self::$COVERED;
        }

        return self::$NONE;
    }
}

// Accepted
// 170/170 cases passed (16 ms)
// Your runtime beats 100 % of php submissions
// Your memory usage beats 100 % of php submissions (14.6 MB)
// @lc code=end

