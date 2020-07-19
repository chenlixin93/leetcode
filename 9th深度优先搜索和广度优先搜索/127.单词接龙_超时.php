<?php
/*
 * @lc app=leetcode.cn id=127 lang=php
 *
 * [127] 单词接龙
 */

// @lc code=start
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        
        // 初始化
        $queue = [
            [$beginWord, 1],
        ];
        $visited = [$beginWord];
        $gen = 'abcdefghijklmnopqrstuvwxyz'; 

        while($n = count($queue)) {
            $cur = array_shift($queue);
            $word = $cur[0];
            $step = $cur[1];

            if($word == $endWord){
                return $step;
            }

            for ($i=0; $i < strlen($word); $i++) { 

                $char = $word[$i];

                for ($j=0; $j < 26; $j++) { 

                    // 相同跳过
                    if($char == $gen[$j]) continue;

                    $word[$i] = $gen[$j];

                    if(in_array($word, $wordList)){

                        if(!in_array($word, $visited)){
                            
                            array_push($queue, [$word, $step + 1]);
                            $visited[] = $word;
                        }
                    }
                }

                // 恢复
                $word[$i] = $char;
            }
        }

        return 0;

    }
}

// Time Limit Exceeded
// 32/43 cases passed (N/A)
// @lc code=end