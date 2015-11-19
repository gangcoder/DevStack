/*
ADT stack
Data
同线性表。元素具有相同的类型，相邻元素具有前驱和后继关系。

Operation
    InitStack(*S);
    DestroyStack(*S);
    ClearStack(*S);
    StackEmpty(*S);
    GetTop(S, *e);
    Push(*S, e);
    Pop(*S, *e);
    StackLength(S);
endADT
 */

typedef int SElemType

/*
 * 栈的顺序存储结构
 */
typedef struct
{
    SElemType data[MAXSIZE];
    int top;
}SqStack;

Status Push(SqStack *S, SElemType e)
{
    if (S->top == MAXSIZE -1)
    {
        return ERROR;
    }
    S->top ++;
    S->data[S->top] = e;
    return OK;
}

Status Pop(SqStack *S, SElemType *e)
{
    if (S->top == -1)
    {
        return ERROR;
    }
    *e = S->data[S->top];
    S->top --;
    return OK;
}

/*
 * 共享栈的实现
 */
typedef struct
{
    SElemType data[MAXSIZE];
    int top1;
    int top2;
}SqDoubleStack;

Status Push(SqDoubleStack *S, SElemType e, int stackNumber)
{
    if (S->top1 + 1 == S->top2)
    {
        return ERROR;
    }
    if (stackNumber ==1)
        S->data[++S->top1] = e;
    else if (stackNumber == 2)
        S->data[--S-top2] = e;
    return OK;
}

Status Pop(SqDoubleStack *S, SElemType *e, int stackNumber)
{
    if (stackNumber == 1)
    {
        if (S->top1 == -1)
            return ERROR;
        *e = S->data[S->top1--];
    }
    else if (stackNumber == 2)
    {
        if (S->top2 == MAXSIZE)
            return ERROR;
        *e = S->data[S->top2++];
    }
    return OK;
}