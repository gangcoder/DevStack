/*
 *ADT 队列(queue)
 *Data
 * 同线性表。元素具有相同的类型，相邻元素具有前驱和后继关系。
 * Operation
 * InitQueue(*Q):    初始化操作，建立一个空队列Q
 * DestroyQueue(*Q): 若队列Q存在，则销毁它
 * ClearQueue(*Q):   将队列Q清空
 * QueueEmpty(Q):    若队列Q为空，返回true，否则返回false
 * GetHead(Q, *e):   若队列Q存在且非空，用e返回队列Q的队头元素
 * EnQueue(*Q, e):   若队列Q存在，插入新元素e到队列Q中并成为队尾元素
 * DeQueue(*Q, *e):  删除队列Q中队头元素，并用e返回其值
 * QueueLength(Q):   返回队列Q的元素个数endADT
 */

/*
 * 队列顺序存储实现
 */
typedef int QElemType;
typedef struct
{
    QElemType data[MAXSIZE];
    int front;
    int rear;
}SqQueue;

Status InitQueue(SqQueue *Q)
{
    Q->front = 0;
    Q->rear = 0;
    return OK;
}

int QueueLength(SqQueue *Q)
{
    return (Q.rear - Q.front + MAXSIZE) % MAXSIZE;
}

Status EnQueue(SqQueue *Q, QElemType e)
{
    if ((Q->rear + 1) % MAXSIZE == Q->front)
    {
        return ERROR;
    }
    Q->data[Q->rear] = e;
    Q->rear = (Q->rear + 1) % MAXSIZE;

    return OK;
}

Status DeQueue(SqQueue *Q, QElemType *e)
{
    if (Q->front == Q->rear)
    {
        return ERROR
    }

    *e = Q->data[Q->front];
    Q->front = (Q->front + 1) % MAXSIZE;
    return OK
}

/*
 * 队列链式存储实现
 */
typedef int QElemType;
typedef struct QNode
{
    QElemType data;
    struct QNode *next;
}QNode, *QueuePtr;

typedef struct
{
    QueuePtr front, rear;
}LinkQueue;

Status EnQueue(LinkQueue *Q, QElemType e)
{
    QueuePtr s = (QueuePtr)malloc(sizeof(QNode));
    if (!s)
    {
        exit(OVERFLOW);
    }
    s->data = e;
    s->next = NULL;
    Q->rear->next = s;
    Q->rear = s;
    return OK;
}

Status DeQueue(LinkQueue *Q, QElemType *e)
{
    QueuePtr p;
    if (Q->front == Q->rear)
    {
        return ERROR;
    }
    p = Q->front-next;
    *e = p->data;
    Q->front->next = p->next;
    if (Q->rear == p)
    {
        Q->rear = Q->front;
    }
    free(p);
    return OK;
}