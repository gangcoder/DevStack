# PHP with JS

```
<?php 
$arr = ['a', 'b', 'c', 'd', 'e', 'f'];
$str = json_encode($arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript PHP</title>
    <script>
        eval('var s = <?php echo $str ?>')
        for (var i = s.length - 1; i >= 0; i--) {
            console.log(s[i])
        };
    </script>
</head>
</html>
```

PHP变量传给JS