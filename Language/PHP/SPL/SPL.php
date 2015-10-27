<?php
// 双向链表
$obj = new SplDoublyLinkedList();
$obj->push(1);
$obj->push(2);
$obj->push(3);
$obj->unshift(10);   //unshifit 占用了底部最后一个元素,把新的节点添加到了链表的底部（Bottom）
$obj->rewind();     //  使用current 必须调用rewind,把节点指针指向bottom节点
 $obj->next();    //    next 指向下一个节点
$obj->prev();   // 指针指向上一个节点
echo $obj->current();   //  指针指向当前结点
if($obj->current())
{
    echo "y";
}else{
    echo "n";
}
 
    if($obj->valid()){
        //如果当前节点是有效节点 valid则返回true
    }
$obj->pop();  //删除指针指向的当前结点
    //var_dump($obj);
// print_r($obj);

// 堆栈的使用
$stack = new SplStack();  //实例化堆栈
$stack->push("a");        //向堆栈中加入数据
$stack->push("b");
$stack->push("c");
/*
$stack->offsetSet(0,'C');  //堆栈的节点0是top 的节点，设置节点的值
$stack->rewind(); //双向链表的rewind和堆栈的rewind相反，堆栈的rewind使得当前指针指向TOP所在的位置，而双向链表调用之后指向bottom所在的位置
 
 
echo "qq".$stack->next();  // 堆栈的next与双向链表相反
echo "re".$stack->current()."</br>";
//echo "bo".$stack->bottom()."</br>";
//echo "top".$stack->top();
 
print_r($stack);
*/
//从TOP开始遍历
$stack->rewind();
while($stack->valid()){
    echo $stack->key()."=>".$stack->current()."</br>";
    $stack->next();
}
$pop = $stack->pop();
// echo $pop;
//pop操作从堆栈里面提取出的最后一个元素（TOP位置），同时在堆栈删除该节点

// 队列
$que = new SplQueue();
$que->enqueue("a");    //    入队列
$que->enqueue("b");
$que->enqueue("c");
 
//print_r($que);
echo "bottom".$que->bottom()."</br>";
echo "top".$que->top();
$que->rewind();  
$que->dequeue();    //出队列
//从 bottom 位置删除
// print_r($que);

// ArrayIterator
$fruits = array(
    "apple"  => "apple value",
    "orange" => "orange value",
    "grape" => "grape value"
);                //定义一个水果数组
 
$obj = new ArrayObject($fruits);
$it = $obj->getIterator();
    //  用foreach 实现遍历数组
foreach($it as $key => $value){
 
    echo $key."->".$value."</br>";
}
 
$it->rewind();  //必须要 rewind
//用 while 来遍历数组
while($it->valid()){
 
    echo $it->key()."->".$it->current()."</br>";
     $it->next();
}
//跳过某些元素进行打印
$it->rewind();
if($it->valid()){
 
    $it->seek(1); //寻找到1的元素
    while($it->valid()){
 
        echo $it->key()."->".$it->current()."</br>";
        $it->next();
    }
 
}
echo "</br>";
$it->rewind();
//$it->ksort();  //进行排序  用key ,
//$it->rewind();
$it->asort(); //按value 进行排序
while($it->valid()){
 
    // echo $it->key()."->".$it->current()."</br>";
    $it->next();
}

// AppendIterator
$array_a = new ArrayIterator(array('a','b','c'));  //定义两个 ArrayIterator
$array_b = new ArrayIterator(array('d','e','f'));
$it = new AppendIterator();
$it->append($array_a);        //  将ArrayIterator追加到Iterator里
$it->append($array_b);
foreach($it as $key => $value){
 
    // echo $key."||".$value."</br>";
}
//通过APPEND方法把迭代器对象添加到AppendIterator对象中
//把两个数组的 数值添加到一个Interator

// MultipleIterator 将数组组合成整个输出
$idIter = new ArrayIterator(array('01','02','03'));
$nameIter =  new ArrayIterator(array('qq','ss','show'));
 
$mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
$mit->attachIterator($idIter,"id");
$mit->attachIterator($nameIter,"name");
 
foreach($mit as $value){
 
    print_r($value);
 
}

// File文件，打印出当前文件夹文件的名称
date_default_timezone_get('PRC');
$it = new FilesystemIterator('.');
foreach($it as $value){
    echo date("Y-m-d H:i:s",$value->getMtime())."</br>";
    $value->isDir()?"<dir>":"";
    number_format($value->getSize());
    echo $value->getFileName();
}

// IteratorIterator
$array=array('value1','value2','value3','value4','value5');
$out = new Outer(new ArrayIterator($array));
foreach($out as $key => $value){
    echo $key."||".$value."</br>";
}
 
    class Outer extends IteratorIterator{
        public function current(){
            return parent::current()."why";
        }
        public function key(){
            return parent::current()."not";
        }
    }
//可以定制key和value 的值

// 打印对象的值
class Count implements Countable{
 
    protected  $mycount = 4;
    public function count(){
        return $this->mycount;
    }
}
 
$count  = new Count();
echo count($count);

// autoload机制
spl_autoload_extensions('.class.php,.php'); //设定以什么扩展名结尾
set_include_path(get_include_path().PATH_SEPARATOR."autoload/"); //设定文件的目录
spl_autoload_register();
new test();
///spl_autoload_register('')可以自定义
 
//比如我有一个文件在 文件夹 autoload下
class test{
    public function __construct(){
        echo " this is test.class.php";
    }
}


// SPLFILE //对文件的操作
date_default_timezone_set('PRC');
$file = new SplFileInfo('qq.txt');
echo "file is create at".date("Y-m-d H:i:s",$file->getCTime())."</br>";
echo "file is modified at".date("Y-m-d H:i:s",$file->getMTime())."</br>";
echo "file size".$file->getSize()."kb</br>";
 
 
$fileObj = $file->openFile("r");
while($fileObj->valid()){
    echo $fileObj->fgets();
}
$fileObj = null;
$file = null;
