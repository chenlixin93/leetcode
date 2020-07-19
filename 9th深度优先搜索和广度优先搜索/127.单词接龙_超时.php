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
        
        if(count($wordList) == 0 || !in_array($endWord, $wordList)) {
            return 0;
        }

        // 初始化
        $queue = [];
        array_push($queue, $beginWord);
        $visited = [$beginWord];
        $change = 'abcdefghijklmnopqrstuvwxyz'; 

        $step = 1;
        while(count($queue)) {
            $n = count($queue);

            for ($i=0; $i < $n; $i++) { 
                // 依次遍历当前队列中的单词
                $word = array_shift($queue);
                //print_r($word);
                $len = strlen($word);

                // 修改每一个字符
                for ($j=0; $j < $len; $j++) { 
                    $origin_char = $word[$j];

                    for ($k=0; $k < 26; $k++) { 
                        
                        if($change[$k] == $origin_char) continue;

                        $word[$j] = $change[$k];

                        if(in_array($word, $wordList)){
                            if($word == $endWord){
                                return $step + 1;
                            }

                            if(!in_array($word, $visited)){
                                $visited[] = $word;
                                array_push($queue, $word);
                            }
                        }
                    }

                    $word[$j] = $origin_char;
                }
            }
            $step++;
        }

        return 0;

    }
}

// Time Limit Exceeded
// 32/43 cases passed (N/A)
// @lc code=end

