
## PDO防注入

```
$pdo = new PDO("mysql:host=192.168.0.1;dbname=test;charset=utf8","root");
$st = $pdo->prepare("select * from info where id =? and name = ?");
 
$id = 21;
$name = 'zhangsan';
$st->bindParam(1,$id);
$st->bindParam(2,$name);
 
$st->execute();
$st->fetchAll();
```