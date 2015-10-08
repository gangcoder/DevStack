<?php
// 树节点类
class binaryTreeNode
{
    // 比较节点键值的大小
    function compare($oldkey, $newkey){
        return $newkey - $oldkey;
    }

    // 建立一个新节点
    function createNode($key, $left, $right){
        return array('k'=>$key, 'l'=>$left, 'r'=>$right);
    }
}

// 二叉树类
class binaryTree
{
    private $id = 1;            // 内部UID，自动加1
    private $nodeCount = 0;     // 该树节点数，每插入一个加1
    public $root = null;       // 树根的引用

    private $tree = array();    // 树结构，中间存贮所有节点

    private $_nodes = array();  // 存贮不同类型的节点，主要是为了引用该类的方法，便于继承，暂时没有用到
    private $_node = null;      // 当前节点类的引用

    // 构造函数，初始化
    function binaryTree($nodetype = 'binaryTreeNode'){
        if(!class_exists($nodetype))
            $nodetype = 'binaryTreeNode';
        $this->_nodes[$nodetype] = new $nodetype();
        $this->_node =& $this->_nodes[$nodetype];
    }

    // 设定节点类型，暂时用处不大，主要为扩展
    function setNodeType($nodetype = 'binaryTreeNode'){
        if(!class_exists($nodetype))
            $nodetype = 'binaryTreeNode';
        $this->_node =& $this->_nodes[$nodetype];
    }

    // 插入一节点后修改所有相关节点的信息
    // $pnode 为当前根节点，后两个参数为新节点的参数
    // 即在树中插入一个新节点后，找到此节点所插入的位置并修改其父节点的信息
    // 此函数本为递归，但因为是尾递归(rear-recursive)，因此可以改成循环
    function modifyTree(&$pnode, $key, $id){
        $p =& $pnode;
        while(true){
            $b = $this->_node->compare($p['k'], $key);
            if($b<=0)
            {
                if($p['l'] != 0)
                {
                    $p =& $this->tree[$p['l']];
                }
                else
                {
                    $p['l'] = $id;
                    break;
                }
            }
            else
            {
                if($p['r'] != 0)
                {
                    $p =& $this->tree[$p['r']];
                }
                else
                {
                    $p['r'] = $id;
                    break;
                }
            }
        }
    }

    // 重置树信息
    function reset()
    {
        $this->tree = array();
        $this->root = null;
        $this->id = 1;
        $this->nodeCount = 0;
        $this->_node = null;
    }

    // 插入一个键为$key的节点，并自动为此节点生成一个唯一ID
    function insertNode($key)
    {
        $node = $this->_node->createNode($key, 0, 0);
        $this->tree[$this->id] = $node;
        if($this->root == null)
        {
            $this->root =& $this->tree[1];
        }
        else
        {
            $this->modifyTree($this->root, $key, $this->id);
        }
        $this->id ++;
        $this->nodeCount ++;
    }

    // 先根遍历，打印树结构，用的递归
    // 此函数可修改用于任何用途
    function preorder(&$root, $level, $r = 'r')
    {
        $p =& $root;

        if($r == 'l') 
            $s = str_repeat("\t", 1);
        else 
            $s = str_repeat("\t", $level);
        echo $s.$p['k']."";

        if($p['r'] != 0)
        {
            $p1 =& $this->tree[$p['r']];
            $this->preorder($p1, $level + 1, 'l');
        }
        else
        {
            $s = str_repeat("\t", 1);
            echo $s.'null'."\n";
        }
        if($p['l'] != 0)
        {
            $p1 =& $this->tree[$p['l']];
            $this->preorder($p1, $level + 1);
        }
        else
        {
            $s = str_repeat("\t", $level + 1);
            echo $s.'null'."\n";
        }
    }
}

//---------------------------------------------------
// the following is the test

// 此函数主要是为了兼容性
function make_seed() {
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}

// 生成随机序列键值
function generateRandamSequence($min = 1, $max = 100){
    srand(make_seed());
    $n = $min;
    $a = array();
    while($n <= $max)
    {
        $randval = rand($min, $max);
        if(!isset($a[$randval - $min]))
        {
            $a[$randval - $min] = $n;
            $n++;
        }
    }
    reset($a);
    ksort($a);
    reset($a);
    return $a;
}

$min = 1;
$max = 100;

// 将随机序列键值存入一数组内
$a = generateRandamSequence($min, $max);
//print_r($a);   // 打印数组
$tree = new binaryTree; // 建立一棵树

// 将节点按键值顺序插入到树中，同时调整树的结构
for($i=0;$i<$max-$min+1;$i++)
    $tree->insertNode($a[$i]);

//print_r($tree);  打印树对象的内容

//echo serialize($tree); // 打印树序列化之后的内容

$t =& $tree->root; // 指定树根，为以下传入引用参数用
$tree->preorder($t, 0); // 先根遍历，打印树型结构
// 打印完毕可发现，键值比根键值小的所有节点均在根的左边，反之则在右边，每个节点都是如此
// 但此树不是平衡树（AVL树），因此查询效率还是比较低，特别是如果是连成一直线，则效率达到最低，不能利用树的对数特性了
?>
