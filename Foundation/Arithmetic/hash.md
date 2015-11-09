# 哈希分布

## 普通哈希分布

```
function simplehash($key)
{
    $md5 = substr(md5($key), 0, 8);
    $seed = 31;
    $hash = 0;

    for ($i = 0; $i < 8; $i++) { 
        $hash = $hash * $seed + ord($md5[$i]);
    }
    return $hash;
}

echo simplehash('192.168.1.1') % 2;
```

## 一致性哈希

1. 将32为数看成一个环
2. 通过Hash函数将key处理成整数，映射到环上
3. 通过Hash函数将服务器IP映射到环上
4. 将数据映射到环上
5. 移除服务器
6. 添加服务器

```
/**
* 一致性哈希
*/
class FlexiHash
{
    private $serverList = [];
    private $isSorted = FALSE;

    public function addServer($server)
    {
        $hash = simplehash($server);

        if (!isset($this->$serverList[$hash])) {
            $this->serverList[$hash] = $server;
        }
        $this->isSorted = FALSE;
        return TRUE;
    }

    public function removeServer($server)
    {
        $hash = simplehash($server);

        if (isset($this->serverList[$hash])) {
            unset($this->serverList[$hash]);
        }

        $this->isSorted = FALSE;
        return TRUE;
    }

    // 查找合适的服务器存放数据
    public function lookup($key)
    {
        $hash = simplehash($key);

        if(!$this->isSorted) {
            krsort($this->serverList, SORT_NUMERIC);
            $this->isSorted = TRUE;
        }

        foreach ($this->serverList as $pos => $server) {
            if ($hash >= $pos) return $server;
        }
        return $this->serverList[count($this->serverList) -1];
    }
}
```
