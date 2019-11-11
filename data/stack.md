#### 栈
数组是一种线性表数据结构，使用一段连续的内存空间来存储相同数据类型的数据。


````
关键词说明
1.线性表数据结构：就是数据排列在一条线上，只有前后两个方向。
2.连续的内存空间存储相同类型的数据，使数组具有随机访问的特性。
  但为了保持内存空间连续性，新增和删除操作就需要对数组进行大量数据搬移，所以比较低效
````

````
数组和链表的区别
1.因数组存储在连续的内存空间，可以使用CPU缓存机制预读出缓存中的数据，所以访问比较高效。
2.链表在内存中不是连续的，所以对cpu缓存不友好
3.数组是固定长度不支持扩容，链表支持扩容
````