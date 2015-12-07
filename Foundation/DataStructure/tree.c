/**
 * ADT 树(tree)
 * Data
 *     树是由一个根结点和若干棵子树构成。树中结点具有相同数据类型及层次关系
 * Operation
 *     InitTree(*T):               构造空树T
 *     DestroyTree(*T):            销毁树T
 *     CreateTree(*T, definition): 按definition中给出树的定义来构造树
 *     ClearTree(*T):              若树T存在，则将树T清为空树
 *     TreeEmpty(T):               若T为空树，返回true，否则返回false
 *     TreeDepth(T):               返回T的深度
 *     Root(T):                    返回T的根结点
 *     Value(T, cur_e):            cur_e是树T中一个结点，返回此结点的值
 *     Assign(T, cur_e, value):    给树T的结点cur_e赋值为value
 *     Parent(T, cur_e):           若cur_e是树T的非根结点，则返回它的双亲，否则返回空
 *     LeftChild(T, cur_e):        若cur_e是树T的非叶结点，则返回它的最左孩子，否则返回空
 *     RightSibling(T, cur_e):     若cur_e有右兄弟，则返回它的右兄弟，否则返回空
 *     InsertChild(*T, *p, i, c):  其中p指向树T的某个结点，i为所指结点p的度加上1，非空树c与T不相交，操作结果为插入c为树T中p指结点的第i棵子树
 *     DeleteChild(*T, *p, i):     其中p指向树T的某个结点，i为所指结点p的度，操作结果为删除T中p所指结点的第i棵子树
 *endADT
 */

 /* 树的双亲表示法结点结构定义 */
#define MAX_TREE_SIZE 100
typedef int TElemType;
typedef struct PTNode
{
    TElemType data;
    int parent;
}PTNode;

typedef struct
{
    PTNode nodes[MAX_TREE_SIZE];
    int r, n; //根的位置和节点数
}PTree;

/* 树的孩子表示法结构定义 */
typedef struct CTNode
{
    int child;
    struct CTNode *next;
} *ChildPtr;

typedef struct
{
    TElemType data;
    ChildPtr firstchild;
}CTBox;

typedef struct
{
    CTBox nodes[MAX_TREE_SIZE];
    int r, n;
}CTree;


/* 树的孩子兄弟表示法结构定义 */
typedef struct CSNode
{
    TElemType data;
    struct CSNode *firstchild, *rightsib;
}CSNode, *CSTree;


/* 二叉树的二叉链表结点结构定义 */
typedef struct BiTNode
{
    TElemType data;
    struct BiTNode *lchild, *rchild;
}BiTNode, *BiTree;

/* 二叉树的前序遍历递归算法 */
void PreOrderTraverse(BiTree T)
{
    if (T == NULL)
        return;
    printf("%c", T->data);
    PreOrderTraverse(T->lchild);
    PreOrderTraverse(T->rchild);
}

/* 二叉树的中序遍历递归算法 */
void InOrderTraverse(BiTree T)
{
    if (T == NULL)
        return;
    InOrderTraverse(T->lchild);
    printf("%c", T->data);
    InOrderTraverse(T->rchild);
}

/* 二叉树的后序遍历递归算法 */
void PostOrderTraverse(BiTree T)
{
    if (T == NULL)
        return;
    PostOrderTraverse(T->lchild);        
    PostOrderTraverse(T->rchild);        
    printf("%c", T->data);
}

/* 按前序输入二叉树中结点的值（一个字符） */
/* #表示空树，构造二叉链表表示二叉树T。 */
void CreateBiTree(BiTree *T)
{
    TElemType ch;
    scanf("%c", &ch);
    if (ch == '#')
        *T = NULL;
    else
    {
        *T = (BiTree)malloc(sizeof(BiTNode));
        if (!*T)
            exit(OVERFLOW);
        (*T)->data = ch;
        CreateBiTree(&(*T)->lchild);
        CreateBiTree(&(*T)->rchild);
    }
}

/* 二叉树的二叉线索存储结构定义 */
typedef enum {Link, Thread} PointerTag;
typedef struct BiThrNode
{
    TElemType data;
    struct BiThrNode *lchild, *rchild;
    PointerTag LTag;
    PointerTag RTag;
}BiThrNode, *BiThrTee;

BiThrTree pre;                     /* 全局变量，始终指向刚刚访问过的结点 */
/* 中序遍历进行中序线索化 */
void InThreading(BiThrTree p)
{
    if (p)
    {
        InThreading(p->lchild)
        if (!p->lchild)
        {
            p->LTag = Thread;
            p->lchild = pre;
        }
        if (!p->rchild)
        {
            pre->RTag = Thread;
            pre->rchild = p;
        }
        pre = p;
        InThreading(p->rchild);
    }
}