<?php

// 输入整数数组 arr ，找出其中最小的 k 个数。
// 例如，输入4、5、1、6、2、7、3、8这8个数字，
// 则最小的4个数字是1、2、3、4。

// 输入：arr = [3,2,1], k = 2
// 输出：[1,2] 或者 [2,1]

// 输入：arr = [0,1,2,1], k = 1
// 输出：[0]

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers($arr, $k) {

        if($k == 0 || count($arr) == 0) {
            return [];
        }

        return $this->quickSearch($arr, 0, count($arr) - 1, $k - 1);
    }

    // 划分区间
    function quickSearch($arr, $left, $right, $k) {

        $j = $this->partition($arr, $left, $right);
        if($j == $k) {

            // $k 是下标，这里加回去
            return array_slice($arr, 0, $k+1);
        }

        return $j > $k ? $this->quickSearch($arr, $left, $j - 1, $k) : $this->quickSearch($arr, $j + 1, $right, $k);
    }

    // 快排模版，只处理左边数据
    function partition(&$arr, $left, $right) {

        $v = $arr[$left];
        $i = $left; 
        $j = $right + 1;

        while(true) {

            // 以最左边的值为基数，左右指针搜寻符合条件的数据
            while(++$i <= $right && $arr[$i] < $v);
            while(--$j >= $left && $arr[$j] > $v);

            //print_r($i." ");
            //print_r($j."\n");
            if($i >= $j){
                break;
            }

            //  交换 i 和 j
            $tmp = $arr[$j];
            $arr[$j] = $arr[$i];
            $arr[$i] = $tmp;
        }

        //print_r($j."\n");

        // 可知，第j个数肯定小于$v，交换两者位置
        $arr[$left] = $arr[$j];
        $arr[$j] = $v;
        return $j;
    }

}

// 效率 112 ms	23.9 MB	Php