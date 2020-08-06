<?php
/*
 * @lc app=leetcode.cn id=336 lang=php
 *
 * [336] 回文对
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $words
     * @return Integer[][]
     */
    function palindromePairs($words) {
        
        $res = []; // 二维
        $map = [];
        for ($i=0; $i < count($words); $i++) { 
            $map[$words[$i]] = $i;
        }

        for ($i=0; $i < count($words); $i++) { 
            $l = 0;
            $r = 0;

            while ($l <= $r) {
                //$t = substr($words[$i], $l, $r - $l);
                //$t = strrev($t);
                $l = ($l == 0) ? $r : 0;
                $r = ($l == 0) ? strlen($words[$i]) - $r : $l;
                if (array_key_exists($t, $map) && $i != $map[$t] && $this->isValid(substr($words[$i], $l, $r))) {
                    if ($l == 0) {
                        $res[] = [$i, $map[$t]];
                    } else {
                        $res[] = [$map[$t], $i]];
                    }
                }

                if ($r < strlen($words[$i])) {
                    $r++;
                } else {
                    $l++;
                }
            }
        }

        return $res;
    }

    function isValid($t) {

        for ($i=0; $i < strlen($t) / 2; $i++) { 
            if ($t[$i] != $t[strlen($t) - 1 - $i]) {
                return false;
            }
        }

        return true;
    }
}
// @lc code=end

