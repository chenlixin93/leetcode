<?php
/*
 * @lc app=leetcode.cn id=438 lang=php
 *
 * [438] 找到字符串中所有字母异位词
 * 
 * https://leetcode-cn.com/problems/find-all-anagrams-in-a-string/
 * 视频讲解 https://www.bilibili.com/video/BV1iW411d7Nb?from=search&seid=17366439816996839570
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p) {
        
        $s_len = strlen($s);
        $p_len = strlen($p);
        
        $ans = [];
        $vp = array_fill(0, 26, 0);
        $vs = array_fill(0, 26, 0);

        $idx = 0;
        while ($idx < $p_len) {
            ++$vp[ord($p[$idx]) - ord('a')];
            $idx++;
        }

        for ($i=0; $i < $s_len; $i++) { 
            if ($i >= $p_len) --$vs[ord($s[$i - $p_len]) - ord('a')];
            ++$vs[ord($s[$i]) - ord('a')];
            if ($vs == $vp) $ans[] =  $i + 1 - $p_len;
        }

        return $ans;
    }
}

// Accepted
// 36/36 cases passed (40 ms)
// Your runtime beats 33.33 % of php submissions
// Your memory usage beats 100 % of php submissions (15.8 MB)
// @lc code=end

