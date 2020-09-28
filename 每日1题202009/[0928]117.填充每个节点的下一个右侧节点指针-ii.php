<?php
/*
 * @lc app=leetcode.cn id=117 lang=php
 *
 * [117] 填充每个节点的下一个右侧节点指针 II
 * 
 * https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node-ii/
 * 参考题解 https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node-ii/solution/bfsjie-jue-zui-hao-de-ji-bai-liao-100de-yong-hu-by/
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        // BFS（层序遍历，广度优先遍历）
        if ($root == null) return $root;

        $queue = [$root];
        while (!empty($queue)) {
            // 每一层的数量
            $level_count = count($queue);
            // 前一个节点
            $pre = new Node(0);
            // 遍历当前层
            for ($i=0; $i < $level_count; $i++) { 
                $node = array_shift($queue); // 先进先出

                // pre 不为空，代表当前节点不是这一行的第一个节点
                // pre->next 指向当前的 node
                if ($pre != null) {
                    $pre->next = $node;
                }

                // 将当前节点作为下一次的“前节点”
                $pre = $node;
                if ($node->left != null) {
                    array_push($queue, $node->left);
                }
                if ($node->right != null) {
                    array_push($queue, $node->right);
                }
            }
        }

        return $root;
    }
}

// Accepted
// 55/55 cases passed (40 ms)
// Your runtime beats 8.7 % of php submissions
// Your memory usage beats 23.08 % of php submissions (17.9 MB)
// @lc code=end

