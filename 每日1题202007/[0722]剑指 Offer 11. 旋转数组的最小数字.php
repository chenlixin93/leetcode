<?php
/*
 * 剑指 Offer 11. 旋转数组的最小数字
 * 
 * https://leetcode-cn.com/problems/xuan-zhuan-shu-zu-de-zui-xiao-shu-zi-lcof/
 */

class Solution {

    /**
     * @param Integer[] $numbers
     * @return Integer
     */
    function minArray($numbers) {

        $end = count($numbers) - 1;

        // 只有一个数时
        if($end <= 0) {
            return $numbers[0];
        }

        // 升序数组，大于两个数时，优先比较首位顺序
        if($numbers[0] < $numbers[$end]) {
            return $numbers[0];
        }

        while($end >= 1){

            if($numbers[$end] < $numbers[$end - 1]) {
                return $numbers[$end];
            }

            if($numbers[$end] == $numbers[$end - 1] && $end - 2 < 0) {
                return $numbers[$end];
            }

            $end--;
        }
    }
}

// 执行结果：通过
// 执行用时： 12 ms, 在所有 PHP 提交中击败了 97.59% 的用户
// 内存消耗： 15.5 MB, 在所有 PHP 提交中击败了 100.00% 的用户