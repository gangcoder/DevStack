# MySQL

## ����

### DISTINCT

�ؼ��� DISTINCT ���ڷ���Ψһ��ͬ��ֵ��

`SELECT DISTINCT ������ FROM ������`

### INSERT INTO

`INSERT INTO ������ VALUES (ֵ1, ֵ2,....)`

`INSERT INTO table_name (��1, ��2,...) VALUES (ֵ1, ֵ2,....)`

### Update

`UPDATE ������ SET ������ = ��ֵ WHERE ������ = ĳֵ`

### DELETE

`DELETE FROM ������ WHERE ������ = ֵ`

## �߼�

### limit

`select ������ from ������ where ���� limit �ֶ���`

`select ������ from ������ where ���� limit ��ʼλ��, �ֶ���`

### LIKE

```
SELECT column_name(s)
FROM table_name
WHERE column_name LIKE pattern
```

|ͨ���|���� |
|--|--|
|% | ���һ�������ַ� |
|_ | �����һ���ַ� |
|[charlist]|  �ַ����е��κε�һ�ַ� |
|[^charlist] �� [!charlist]|�����ַ����е��κε�һ�ַ�|

### IN

IN ���������������� WHERE �Ӿ��й涨���ֵ��

```
SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1,value2,...)
```

### JOIN

- JOIN: �������������һ��ƥ�䣬�򷵻��� 
- LEFT JOIN: ��ʹ�ұ���û��ƥ�䣬Ҳ����������е��� 
- RIGHT JOIN: ��ʹ�����û��ƥ�䣬Ҳ���ұ������е��� 
- FULL JOIN: ֻҪ����һ�����д���ƥ�䣬�ͷ����� 

```
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
INNER JOIN Orders
ON Persons.Id_P = Orders.Id_P
ORDER BY Persons.LastName
```

### UNION

�ϲ��������� SELECT ���Ľ����

```
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
```

### CREATE

**����**

`CREATE DATABASE database_name`

**����**

```
CREATE TABLE ������
(
������1 ��������,
������2 ��������,
������3 ��������,
....
)
```

### Լ�� Constraints

- NOT NULL 
- UNIQUE 
- PRIMARY KEY 
- FOREIGN KEY 
- CHECK �����������е�ֵ�ķ�Χ
- DEFAULT 

### CREATE INDEX

����һ���򵥵�����

```
CREATE INDEX index_name
ON table_name (column_name)
```

### DROP

**DROP INDEX**

`DROP INDEX index_name ON table_name`

**ɾ����**

`DROP TABLE ������`

**ɾ�����ݿ�**

`DROP DATABASE ���ݿ�����`

### TRUNCATE 

ɾ�����е�����

`TRUNCATE TABLE ������`

### ALTER

���������еı�����ӡ��޸Ļ�ɾ����

**ALTER TABLE**

�����

```
ALTER TABLE table_name
ADD column_name datatype
```

ɾ����

```
ALTER TABLE table_name 
DROP COLUMN column_name
```

�ı���������

```
ALTER TABLE table_name
ALTER COLUMN column_name datatype
```

### AUTO_INCREMENT

��������������ʼֵ�ͼ��ֵ

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

��ͼ�����к��У�����һ����ʵ�ı���ͼ�е��ֶξ�������һ���������ݿ��е���ʵ�ı��е��ֶ�

```
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
```

��ͼ������ʾ��������ݡ�ÿ���û���ѯ��ͼʱ�����ݿ�����ͨ��ʹ�� SQL ������ؽ�����

### NULL

NULL ֵ����©��δ֪����

ʹ�� IS NULL �� IS NOT NULL ������������NULLֵ

### ��������

**Text**

- CHAR(size) ����̶����ȵ��ַ������ɰ�����ĸ�������Լ������ַ�������������ָ���ַ����ĳ��ȡ���� 255 ���ַ��� 
- VARCHAR(size) ����ɱ䳤�ȵ��ַ������ɰ�����ĸ�������Լ������ַ�������������ָ���ַ�������󳤶ȡ���� 255 ���ַ���
- TINYTEXT �����󳤶�Ϊ 255 ���ַ����ַ����� 
- TEXT �����󳤶�Ϊ 65,535 ���ַ����ַ����� 
- BLOB ���� BLOBs (Binary Large OBjects)�������� 65,535 �ֽڵ����ݡ� 
- MEDIUMTEXT �����󳤶�Ϊ 16,777,215 ���ַ����ַ����� 
- MEDIUMBLOB ���� BLOBs (Binary Large OBjects)�������� 16,777,215 �ֽڵ����ݡ� 
- LONGTEXT �����󳤶�Ϊ 4,294,967,295 ���ַ����ַ����� 
- LONGBLOB ���� BLOBs (Binary Large OBjects)�������� 4,294,967,295 �ֽڵ����ݡ� 
- ENUM(x,y,z,etc.) �������������ֵ���б������� ENUM �б����г���� 65535 ��ֵ������б��в����ڲ����ֵ��������ֵ��
- SET �� ENUM ���ƣ�SET ���ֻ�ܰ��� 64 ���б������ SET �ɴ洢һ�����ϵ�ֵ�� 

**Number**

- TINYINT(size) -128 �� 127 ���档0 �� 255 �޷���*���������й涨���λ���� 
- SMALLINT(size) -32768 �� 32767 ���档0 �� 65535 �޷���*���������й涨���λ���� 
- MEDIUMINT(size) -8388608 �� 8388607 ��ͨ��0 to 16777215 �޷���*���������й涨���λ���� 
- INT(size) -2147483648 �� 2147483647 ���档0 �� 4294967295 �޷���*���������й涨���λ���� 
- BIGINT(size) -9223372036854775808 �� 9223372036854775807 ���档0 �� 18446744073709551615 �޷���*���������й涨���λ���� 
- FLOAT(size,d) ���и���С�����С���֡��������й涨���λ������ d �����й涨С�����Ҳ�����λ���� 
- DOUBLE(size,d) ���и���С����Ĵ����֡��������й涨���λ������ d �����й涨С�����Ҳ�����λ���� 
- DECIMAL(size,d) ��Ϊ�ַ����洢�� DOUBLE ���ͣ�����̶���С���㡣 

**Date**

- DATE() ���ڡ���ʽ��YYYY-MM-DD
- DATETIME() *���ں�ʱ�����ϡ���ʽ��YYYY-MM-DD HH:MM:SS
- TIMESTAMP() *ʱ�����TIMESTAMP ֵʹ�� Unix ��Ԫ('1970-01-01 00:00:00' UTC) ������������洢����ʽ��YYYY-MM-DD HH:MM:SS
- TIME() ʱ�䡣��ʽ��HH:MM:SS ע�ͣ�֧�ֵķ�Χ�Ǵ� '-838:59:59' �� '838:59:59'  
- YEAR() 2 λ�� 4 λ��ʽ���ꡣ

## ����

- AVG(column) ����ĳ�е�ƽ��ֵ 
- COUNT(column) ����ĳ�е������������� NULL ֵ�� 
- COUNT(*) ���ر�ѡ���� 
- MAX(column) ����ĳ�е����ֵ 
- MIN(column) ����ĳ�е����ֵ 
- SUM(column) ����ĳ�е��ܺ� 
- UCASE(c) ��ĳ����ת��Ϊ��д 
- LCASE(c) ��ĳ����ת��ΪСд 
- MID(c,start[,end]) ��ĳ���ı�����ȡ�ַ� 
- LEN(c) ����ĳ���ı���ĳ��� 
- INSTR(c,char) ������ĳ���ı�����ָ���ַ�����ֵλ�� 
- LEFT(c,number_of_char) ����ĳ����������ı������ಿ�� 
- RIGHT(c,number_of_char) ����ĳ����������ı�����Ҳಿ�� 
- ROUND(c,decimals) ��ĳ����ֵ�����ָ��С��λ������������ 
- MOD(x,y) ���س������������� 
- NOW() ���ص�ǰ��ϵͳ���� 
- FORMAT(c,format) �ı�ĳ�������ʾ��ʽ 
- DATEDIFF(d,date1,date2) ����ִ�����ڼ��� 

### GROUP BY

����һ�������жԽ�������з���

```
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
```

### HAVING

���� HAVING �Ӿ�ԭ���ǣ�WHERE �ؼ����޷���ϼƺ���һ��ʹ��

```
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
HAVING aggregate_function(column_name) operator value
```