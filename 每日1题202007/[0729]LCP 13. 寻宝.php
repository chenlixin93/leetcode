<?php
// LCP 13. 寻宝
// https://leetcode-cn.com/problems/xun-bao/

class Solution {

    protected $dx = [1, -1, 0, 0];
    protected $dy = [0, 0, 1, -1];
    protected $n;
    protected $m;
    /**
     * @param String[] $maze
     * @return Integer
     */
    function minimalSteps($maze) {

        $this->n = count($maze);
        $this->m = strlen($maze[0]);

        // 机关 & 石头的坐标
        $buttons = [];
        $stones = [];

        // 起点 & 终点的坐标
        $sx = -1; $sy = -1;
        $tx = -1; $ty = -1;

        for ($i=0; $i < $this->n; $i++) { 
            for ($j=0; $j < $this->m; $j++) { 
                if ($maze[$i][$j] == 'M') {
                    array_push($buttons, [$i, $j]);
                }
                if ($maze[$i][$j] == 'O') {
                    array_push($stones, [$i, $j]);
                }
                if ($maze[$i][$j] == 'S') {
                    $sx = $i;
                    $sy = $j;
                }
                if ($maze[$i][$j] == 'T') {
                    $tx = $i;
                    $ty = $j;
                }
            }
        }

        $nb = count($buttons);
        $ns = count($stones);
        $start_dist = $this->bfs($sx, $sy, $maze);

        // 边界情况，没有机关，也就不需要找石头，直接输出起点到终点的最短路径
        if ($nb == 0) {
            return $start_dist[$tx][$ty];
        }

        // 从某个机关到其他机关、起点到终点的最短距离（二维）
        $dist = array_fill(0, $nb, array_fill(0, $nb + 2, -1));

        // 中间结果（三维）
        $dd = array_fill(0, $nb, []);
        for ($i=0; $i < $nb; $i++) { 
            $d = $this->bfs($buttons[$i][0], $buttons[$i][1], $maze);
            $dd[$i] = $d;

            // 从某个点到终点不需要拿石头
            $dist[$i][$nb + 1] = $d[$tx][$ty];
        }

        for ($i=0; $i < $nb; $i++) { 
            $tmp = -1;
            for ($k=0; $k < $ns; $k++) { 
                $mid_x = $stones[$k][0];
                $mid_y = $stones[$k][1];
                if ($dd[$i][$mid_x][$mid_y] != -1 && $start_dist[$mid_x][$mid_y] != -1) {
                    if($tmp == -1 || $tmp > $dd[$i][$mid_x][$mid_y] + $start_dist[$mid_x][$mid_y]) {
                        $tmp = $dd[$i][$mid_x][$mid_y] + $start_dist[$mid_x][$mid_y];
                    }
                }
            }

            $dist[$i][$nb] = $tmp;
            for ($j=$i+1; $j < $nb; $j++) { 
                $mn = -1;
                for ($k=0; $k < $ns; $k++) { 
                    $mid_x = $stones[$k][0];
                    $mid_y = $stones[$k][1];
                    if ($dd[$i][$mid_x][$mid_y] != -1 && $dd[$j][$mid_x][$mid_y] != -1) {
                        if($mn == -1 || $mn > $dd[$i][$mid_x][$mid_y] + $dd[$j][$mid_x][$mid_y]) {
                            $mn = $dd[$i][$mid_x][$mid_y] + $dd[$j][$mid_x][$mid_y];
                        }
                    }
                }
                $dist[$i][$j] = $mn;
                $dist[$j][$i] = $mn;
            }
        }

        // 无法达成的情形
        for ($i=0; $i < $nb; $i++) { 
            if ($dist[$i][$nb] == -1 || $dist[$i][$nb + 1] == -1) {
                return -1;
            }
        }

        // dp 数组，-1 代表没有遍历到 (<< 左移运算符 1 << 2 = 4)
        $dp = array_fill(0, 1 << $nb, array_fill(0, $nb, -1));
        for ($i=0; $i < $nb; $i++) { 
            $dp[1 << $i][$i] = $dist[$i][$nb];
        }

        // 由于更新的状态都比未更新的大，所以直接从小到大遍历即可
        for ($mask=1; $mask < (1 << $nb); $mask++) { 
            for ($i=0; $i < $nb; $i++) { 
                // 当前 $dp 是合法的
                if (($mask & (1 << $i)) != 0) {
                    for ($j=0; $j < $nb; $j++) { 
                        // $j 不在 mask 里
                        if (($mask & (1 << $j)) == 0) {
                            $next = $mask | (1 << $j);

                            if ($dp[$next][$j] == -1 || $dp[$next][$j] > $dp[$mask][$i] + $dist[$i][$j]) {
                                $dp[$next][$j] = $dp[$mask][$i] + $dist[$i][$j];
                            }
                        }
                    }
                }
            }
        }

        $ret = -1;
        $final_mask = (1 << $nb) - 1;
        for ($i=0; $i < $nb; $i++) { 
            if ($ret == -1 || $ret > $dp[$final_mask][$i] + $dist[$i][$nb + 1]) {
                $ret = $dp[$final_mask][$i] + $dist[$i][$nb + 1];
            }
        }

        return $ret;
    }

    function bfs($x, $y, $maze) {
        $ret = array_fill(0, $this->n, array_fill(0, $this->m, -1));

        $ret[$x][$y] = 0;
        $queue = [];
        array_push($queue, [$x, $y]);
        while (count($queue) > 0) {
            $p =  array_shift($queue);
            $cur_x = $p[0];
            $cur_y = $p[1];

            for ($k=0; $k < 4; $k++) { 
                $nx = $cur_x + $this->dx[$k];
                $ny = $cur_y + $this->dy[$k];
                if ($this->inBound($nx, $ny) && $maze[$nx][$ny] != '#' && $ret[$nx][$ny] == -1) {
                    $ret[$nx][$ny] = $ret[$cur_x][$cur_y] + 1;
                    array_push($queue, [$nx, $ny]);
                }
            }
        }
        
        return $ret;
    }

    function inBound($x, $y) {
        return $x >= 0 && $x < $this->n && $y >= 0 && $y < $this->m;
    }
}