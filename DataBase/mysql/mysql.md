# MySQL

## 基础

### DISTINCT

关键词 DISTINCT 用于返回唯一不同的值。

`SELECT DISTINCT 列名称 FROM 表名称`

### INSERT INTO

`INSERT INTO 表名称 VALUES (值1, 值2,....)`

`INSERT INTO table_name (列1, 列2,...) VALUES (值1, 值2,....)`

### Update

`UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值`

### DELETE

`DELETE FROM 表名称 WHERE 列名称 = 值`

## 高级

### limit

`select 列名称 from 表名称 where 条件 limit 字段数`

`select 列名称 from 表名称 where 条件 limit 起始位置, 字段数`

### LIKE

```
SELECT column_name(s)
FROM table_name
WHERE column_name LIKE pattern
```

|通配符|描述 |
|--|--|
|% | 替代一个或多个字符 |
|_ | 仅替代一个字符 |
|[charlist]|  字符列中的任何单一字符 |
|[^charlist] 或 [!charlist]|不在字符列中的任何单一字符|

### IN

IN 操作符允许我们在 WHERE 子句中规定多个值。

```
SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1,value2,...)
```

### JOIN

- JOIN: 如果表中有至少一个匹配，则返回行 
- LEFT JOIN: 即使右表中没有匹配，也从左表返回所有的行 
- RIGHT JOIN: 即使左表中没有匹配，也从右表返回所有的行 
- FULL JOIN: 只要其中一个表中存在匹配，就返回行 

```
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
INNER JOIN Orders
ON Persons.Id_P = Orders.Id_P
ORDER BY Persons.LastName
```

### UNION

合并两个或多个 SELECT 语句的结果集

```
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
```

### CREATE

**建库**

`CREATE DATABASE database_name`

**建表**

```
CREATE TABLE 表名称
(
列名称1 数据类型,
列名称2 数据类型,
列名称3 数据类型,
....
)
```

### 约束 Constraints

- NOT NULL 
- UNIQUE 
- PRIMARY KEY 
- FOREIGN KEY 
- CHECK 用于限制列中的值的范围
- DEFAULT 

### CREATE INDEX

创建一个简单的索引

```
CREATE INDEX index_name
ON table_name (column_name)
```

### DROP

**DROP INDEX**

`DROP INDEX index_name ON table_name`

**删除表**

`DROP TABLE 表名称`

**删除数据库**

`DROP DATABASE 数据库名称`

### TRUNCATE 

删除表中的数据

`TRUNCATE TABLE 表名称`

### ALTER

用于在已有的表中添加、修改或删除列

**ALTER TABLE**

添加列

```
ALTER TABLE table_name
ADD column_name datatype
```

删除列

```
ALTER TABLE table_name 
DROP COLUMN column_name
```

改变数据类型

```
ALTER TABLE table_name
ALTER COLUMN column_name datatype
```

### AUTO_INCREMENT

可配置自增长起始值和间隔值

```
CREATE TABLE Persons
(
P_Id int NOT NULL AUTO_INCREMENT,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
PRIMARY KEY (P_Id)
)
```

### VIEW

视图包含行和列，就像一个真实的表。视图中的字段就是来自一个或多个数据库中的真实的表中的字段

```
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
```

视图总是显示最近的数据。每当用户查询视图时，数据库引擎通过使用 SQL 语句来重建数据

### NULL

NULL 值是遗漏的未知数据

使用 IS NULL 和 IS NOT NULL 操作符来区分NULL值

### 数据类型

**Text**

- CHAR(size) 保存固定长度的字符串（可包含字母、数字以及特殊字符）。在括号中指定字符串的长度。最多 255 个字符。 
- VARCHAR(size) 保存可变长度的字符串（可包含字母、数字以及特殊字符）。在括号中指定字符串的最大长度。最多 255 个字符。
- TINYTEXT 存放最大长度为 255 个字符的字符串。 
- TEXT 存放最大长度为 65,535 个字符的字符串。 
- BLOB 用于 BLOBs (Binary Large OBjects)。存放最多 65,535 字节的数据。 
- MEDIUMTEXT 存放最大长度为 16,777,215 个字符的字符串。 
- MEDIUMBLOB 用于 BLOBs (Binary Large OBjects)。存放最多 16,777,215 字节的数据。 
- LONGTEXT 存放最大长度为 4,294,967,295 个字符的字符串。 
- LONGBLOB 用于 BLOBs (Binary Large OBjects)。存放最多 4,294,967,295 字节的数据。 
- ENUM(x,y,z,etc.) 允许你输入可能值的列表。可以在 ENUM 列表中列出最大 65535 个值。如果列表中不存在插入的值，则插入空值。
- SET 与 ENUM 类似，SET 最多只能包含 64 个列表项，不过 SET 可存储一个以上的值。 

**Number**

- TINYINT(size) -128 到 127 常规。0 到 255 无符号*。在括号中规定最大位数。 
- SMALLINT(size) -32768 到 32767 常规。0 到 65535 无符号*。在括号中规定最大位数。 
- MEDIUMINT(size) -8388608 到 8388607 普通。0 to 16777215 无符号*。在括号中规定最大位数。 
- INT(size) -2147483648 到 2147483647 常规。0 到 4294967295 无符号*。在括号中规定最大位数。 
- BIGINT(size) -9223372036854775808 到 9223372036854775807 常规。0 到 18446744073709551615 无符号*。在括号中规定最大位数。 
- FLOAT(size,d) 带有浮动小数点的小数字。在括号中规定最大位数。在 d 参数中规定小数点右侧的最大位数。 
- DOUBLE(size,d) 带有浮动小数点的大数字。在括号中规定最大位数。在 d 参数中规定小数点右侧的最大位数。 
- DECIMAL(size,d) 作为字符串存储的 DOUBLE 类型，允许固定的小数点。 

**Date**

- DATE() 日期。格式：YYYY-MM-DD
- DATETIME() *日期和时间的组合。格式：YYYY-MM-DD HH:MM:SS
- TIMESTAMP() *时间戳。TIMESTAMP 值使用 Unix 纪元('1970-01-01 00:00:00' UTC) 至今的描述来存储。格式：YYYY-MM-DD HH:MM:SS
- TIME() 时间。格式：HH:MM:SS 注释：支持的范围是从 '-838:59:59' 到 '838:59:59'  
- YEAR() 2 位或 4 位格式的年。

## 函数

- AVG(column) 返回某列的平均值 
- COUNT(column) 返回某列的行数（不包括 NULL 值） 
- COUNT(*) 返回被选行数 
- MAX(column) 返回某列的最高值 
- MIN(column) 返回某列的最低值 
- SUM(column) 返回某列的总和 
- UCASE(c) 将某个域转换为大写 
- LCASE(c) 将某个域转换为小写 
- MID(c,start[,end]) 从某个文本域提取字符 
- LEN(c) 返回某个文本域的长度 
- INSTR(c,char) 返回在某个文本域中指定字符的数值位置 
- LEFT(c,number_of_char) 返回某个被请求的文本域的左侧部分 
- RIGHT(c,number_of_char) 返回某个被请求的文本域的右侧部分 
- ROUND(c,decimals) 对某个数值域进行指定小数位数的四舍五入 
- MOD(x,y) 返回除法操作的余数 
- NOW() 返回当前的系统日期 
- FORMAT(c,format) 改变某个域的显示方式 
- DATEDIFF(d,date1,date2) 用于执行日期计算 

### GROUP BY

根据一个或多个列对结果集进行分组

```
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
```

### HAVING

增加 HAVING 子句原因是，WHERE 关键字无法与合计函数一起使用

```
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
HAVING aggregate_function(column_name) operator value
```