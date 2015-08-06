# RESTful API

## ����ԭ��

- ����׼�����ʱ�����ر�׼��
- APIӦ�öԳ���Ա�Ѻã��������������ַ���������롣
- APIӦ�ü򵥣�ֱ�ۣ�����ʹ�õ�ͬʱ���š�
- APIӦ�þ����㹻���������֧���ϲ�ui��
- API���Ȩ����������ԭ��

## ��Դ

API���Ϊ�߼��ϵ���Դ����ӦHTTP���в���(GET, PUT, POST, DELETE)

### URL �� Action

- POST �½�
- GET ��ȡ
- PUT ����
- DELETE ɾ��

URL��������: endpoint /resource

- GET /tickets # ��ȡticket�б�
- GET /tickets/12 # �鿴ĳ�������ticket
- POST /tickets # �½�һ��ticket
- PUT /tickets/12 # ����ticket 12.
- DELETE /tickets/12 #ɾ��ticekt 12

- ʹ������
- ʹ���ض���������� 

### ��Դ����


- GET /tickets/12/messages- Retrieves list of messages for ticket #12
- GET /tickets/12/messages/5- Retrieves message #5 for ticket #12
- POST /tickets/12/messages- Creates a new message in ticket #12
- PUT /tickets/12/messages/5- Updates message #5 for ticket #12
- PATCH /tickets/12/messages/5- Partially updates message #5 for ticket #12
- DELETE /tickets/12/messages/5- Deletes message #5 for ticket #12

### ���ˣ���������

url���Խ���Խ�ã��ͽ�����ˣ�����������صĹ��ܶ�Ӧ��ͨ������ʵ��

### ���Ʒ�����

APIʹ���߲���Ҫ���н��

��������: ����ֵ����API�����ǰʮ��

��������: ������һ����¼�Ĳ�������

����������ʹ���ʺ��ٶ�

## ����

### ������CURD�Ĳ���

- �ع�
- ����Դ
- �ĵ�

### SSL

### �ĵ�

- ���׻��
- ��������ʾ��
- �Գɹ���������Ӧ�����ṩԤ�ڽ��
- ��¼��ÿһ�������벢�ṩ��������Ϣ

### �汾��

url�������汾��Ϣ������ͷ�����Ӱ汾��Ϣ

### ����

- ���ºʹ�������Ӧ�÷�����Դ
- ʹ��gzip

JSON��Ӧ�ĵ��߱���ͬ�ṹ

*meta*: �����Ϣ

*data*: �������

### ����

JSON ��ʽ����

ע��ʹ��: `Content-Type��application/json`

### ��ҳ

### �ٶ�����

HTTP 429 too many requests

### Authentication

RESTful API����״̬��ʹ��SSL

## ������

- 400ϵ�б����ͻ��˴��������������ʽ��
- 500ϵ�б�ʾ����������

*JSON*

һ�����õĴ�����Ϣ��һ��Ψһ�Ĵ����룬�Լ��κο��ܵ���ϸ��������

```
{
    "meta" : {
        "code" : 1234,
        "message" : "Something bad happened :-(",
        "description" : "More details about the error here"
    },
    "data" : {
    }
}
```

- 200 ok  - �ɹ�����״̬����Ӧ��GET,PUT,PATCH,DELETE.
- 201 created  - �ɹ�������
- 304 not modified   - HTTP������Ч��
- 400 bad request   - �����ʽ����
- 401 unauthorized   - δ��Ȩ��
- 403 forbidden   - ��Ȩ�ɹ������Ǹ��û�û��Ȩ�ޡ�
- 404 not found - �������Դ������
- 405 method not allowed - ��http������������
- 410 gone - ���url��Ӧ����Դ���ڲ����á�
- 415 unsupported media type - �������ʹ���
- 422 unprocessable entity - У�����ʱ�á�
- 429 too many request - ������ࡣ

- [REST���](http://blog.jobbole.com/88551/)
- [��̸RESTAPI���ʵ��](http://blog.jobbole.com/70511/)