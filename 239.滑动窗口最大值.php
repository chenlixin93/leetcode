<?php
/*
 * @lc app=leetcode.cn id=239 lang=php
 *
 * [239] 滑动窗口最大值
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {

        $len = count($nums);
        if($len <= 1) return $nums;

        $queue = [];
        $res = [];

        for ($i=0; $i < $len; $i++) {

            // 保证从大到小 如果前面数小则需要依次弹出，直至满足要求
            while (!empty($queue) && $nums[end($queue)]<=$nums[$i]){
                array_pop($queue);
            }

            // 存下标
            $queue[] = $i;

            // 判断最大值下标是否越界
            if($queue[0] <= $i - $k){
                array_shift($queue);
            }

            // 当窗口长度为k时 保存当前窗口中最大值
            if($i+1 >= $k){
                $res[] = $nums[$queue[0]];
            }
        }

        return $res;

    }
}

// 遍历数组，将数存放在双向队列中，并用L,R来标记窗口的左边界和右边界。
// 队列中保存的并不是真的数，而是该数值对应的数组下标位置，并且数组中的数要从大到小排序。
// 如果当前遍历的数比队尾的值大，则需要弹出队尾值，直到队列重新满足从大到小的要求。
// 刚开始遍历时，L和R都为0，有一个形成窗口的过程，此过程没有最大值，L不动，R向右移。
// 当窗口大小形成时，L和R一起向右移，每次移动时，判断队首的值的数组下标是否在[L,R]中，
// 如果不在则需要弹出队首的值，当前窗口的最大值即为队首的数。

// 输入: nums = [1,3,-1,-3,5,3,6,7], 和 k = 3
// 输出: [3,3,5,5,6,7]

// 解释过程中队列中都是具体的值，方便理解，具体见代码。
// 初始状态：L=R=0,队列:{}
// i=0,nums[0]=1。队列为空,直接加入。队列：{1}
// i=1,nums[1]=3。队尾值为1，3>1，弹出队尾值，加入3。队列：{3}
// i=2,nums[2]=-1。队尾值为3，-1<3，直接加入。队列：{3,-1}。此时窗口已经形成，L=0,R=2，result=[3]
// i=3,nums[3]=-3。队尾值为-1，-3<-1，直接加入。队列：{3,-1,-3}。队首3对应的下标为1，L=1,R=3，有效。result=[3,3]
// i=4,nums[4]=5。队尾值为-3，5>-3，依次弹出后加入。队列：{5}。此时L=2,R=4，有效。result=[3,3,5]
// i=5,nums[5]=3。队尾值为5，3<5，直接加入。队列：{5,3}。此时L=3,R=5，有效。result=[3,3,5,5]
// i=6,nums[6]=6。队尾值为3，6>3，依次弹出后加入。队列：{6}。此时L=4,R=6，有效。result=[3,3,5,5,6]
// i=7,nums[7]=7。队尾值为6，7>6，弹出队尾值后加入。队列：{7}。此时L=5,R=7，有效。result=[3,3,5,5,6,7]

// 通过示例发现R=i，L=k-R。由于队列中的值是从大到小排序的，
// 所以每次窗口变动时，只需要判断队首的值是否还在窗口中就行了。

// 解释一下为什么队列中要存放数组下标的值而不是直接存储数值，因为要判断队首的值是否在窗口范围内，
// 由数组下标取值很方便，而由值取数组下标不是很方便。

// Accepted
// 18/18 cases passed (120 ms)
// Your runtime beats 60.64 % of php submissions
// Your memory usage beats 100 % of php submissions (27.6 MB)
// @lc code=end

