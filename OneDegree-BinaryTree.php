<?php

class Solution
{
    protected array $treeNodes = [];
    protected array $result = [];

    function result(array $ary)
    {
        $aryCount = count($ary);
        $treeLevel = 0;

        // 透過陣列數量算出 tree 層數
        while ($aryCount > 0) {
            $aryCount -= pow(2, $treeLevel);
            $treeLevel++;
        }

        for ($i = 0; $i < $treeLevel; $i++) {
            $treeLevelNodeCount = pow(2, $i); // 每層 tree 有幾個 node
            $indicator = 0;

            // 開始建立 tree
            while ($indicator < $treeLevelNodeCount) {
                $index = $treeLevelNodeCount + $indicator; // 每個 node 的 index

                // set previous node index
                if ($index % 2 === 0) {
                    $preNodeIndex = $index / 2; // 左節點的母節點
                } else {
                    $preNodeIndex = ($index - 1) / 2; // 右節點的母節點
                    $preNodeIndex = $preNodeIndex !== 0 ? $preNodeIndex : null; // 第一個節點無母節點
                }

                $this->treeNodes[$index] = [
                    'current' => $index,
                    'pre' => $preNodeIndex,
                    'left' => $i + 1 === $treeLevel ? null : 2 * $index,
                    'right' => $i + 1 === $treeLevel ? null : 2 * $index + 1,
                    'value' => array_shift($ary),
                    'checked' => false,
                ];

                $indicator++;
            }
        }

        $result = $this->deepSearch($this->treeNodes[1]);
        $result = array_filter($result, function ($value) {
            return $value !== '#';
        });

        return join(', ', $result);
    }

    // 透過遞迴做 deep search
    function deepSearch(array $currentNode)
    {
        $leftNodeIndex = $currentNode['left'] ?? null;
        $rightNodeIndex = $currentNode['right'] ?? null;
        $preNodeIndex = $currentNode['pre'] ?? null;
        $currentNodeIndex = $currentNode['current'] ?? null;

        // 一路取值
        if ($currentNode['checked'] === false) {
            array_push($this->result, $currentNode['value']);
            $this->treeNodes[$currentNodeIndex]['checked'] = true;
        }

        // 先往左節點找
        if (isset($leftNodeIndex)) {
            $this->deepSearch($this->treeNodes[$leftNodeIndex]);
        }

        // 再往右節點找
        if (isset($rightNodeIndex)) {
            $this->deepSearch($this->treeNodes[$rightNodeIndex]);
        }

        // 若無母節點則終止
        if (!isset($preNodeIndex)) {
            return $this->result;
        }

        // 刪除母節點中記號
        $preNode = $this->treeNodes[$preNodeIndex];
        $this->treeNodes[$preNodeIndex][array_search($currentNodeIndex, $preNode)] = null;
    }
}

var_dump((new Solution())->result([4, 1, 5, 2, '#', '#', '#']));
exit;