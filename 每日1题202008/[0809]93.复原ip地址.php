<?php
/*
 * @lc app=leetcode.cn id=93 lang=php
 *
 * [93] 复原IP地址
 * 
 * https://leetcode-cn.com/problems/restore-ip-addresses/
 */

// @lc code=start
class Solution {

    protected $res;

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s) {

        $this->res = [];
        $this->restore(0, '', $s);
        return $this->res;
    }

    function restore($count, $ip, $s) {

        if ($count == 4) {
            // 当深度到达第四层时，s已经截取完且符合规则，将此ip加入最终结果集
            if ($s == '') {
                $this->res[] = substr($ip, 0, -1);
            }
            return true;
        }

        // 第一个ip段长度为 1
        if(strlen($s) > 0) {
            $this->restore($count + 1, $ip.$s[0].'.', substr($s, 1));
        }

        // 第一个ip段长度为 2，合法ip 首位不为 0 
        if(strlen($s) > 1 && $s[0] != '0') { // python写法 s[0:2] s[2:]
            $this->restore($count + 1, $ip.substr($s, 0, 2).'.', substr($s, 2));
        }

        // 第一个ip段长度为 3，合法ip 首位不为 0 
        if(strlen($s) > 2 && $s[0] != '0' && (int)substr($s, 0, 3) < 256) { // python写法 s[0:3] s[3:]
            $this->restore($count + 1, $ip.substr($s, 0, 3).'.', substr($s, 3));
        }
    }
}

// Accepted
// 147/147 cases passed (4 ms)
// Your runtime beats 95.65 % of php submissions
// Your memory usage beats 66.67 % of php submissions (14.8 MB)
// @lc code=end

