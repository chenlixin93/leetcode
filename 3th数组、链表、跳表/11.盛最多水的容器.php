<?php
/*
 * @lc app=leetcode.cn id=11 lang=php
 *
 * [11] 盛最多水的容器
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {

        // 双指针移动
        // 初始容量
        $max = 0;
        // 数组长度
        $len = count($height);
        
        for($i=0,$j=$len-1; $i<$j;) {
            // 记录当前最小高度能装的水，与上一次进行对比
            $max = max($max, min($height[$i],$height[$j])*($j-$i));
            // 往中间收敛，保留最高的高度
            $height[$i] > $height[$j] ? $j-- : $i++; 
        }

        return $max;
    }
}
// @lc code=end

