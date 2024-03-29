#### 插入排序
插入排序的基本操作就是将一个数据插入到已经排好序的有序数据中，从而得到一个新的、个数加一的有序数据，算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。

算法稳定性：在插入排序中，对于值相同的元素，我们可以选择将后面出现的元素，插入到前面出现的元素的后面，这样就保持原有的顺序不变，所以是稳定的。

````
/**
 * 插入排序
 * @param $arr
 * @return mixed
 */
function insertSort($arr) {
    $len = count($arr);
    if($len <= 1) {
        return $arr;
    }
    // 插入排序的关键点是 数据的比较和搬移。并且是先进行数据搬移 然后进行插入
    // 数据比较的概念是 后边的元素 与 前边有序元素依次比较，符合条件然后进行 依次数据搬移
    
    for($i = 1;$i < $len; $i++) {
        //外层循环用于确定 无序数列中的比较变量
        $value = $arr[$i];
        // 二层循环用于 将比较变量与有序数列 依次比较 获取插入位置
        for($j = $i-1; $j >= 0; $j--) {
            if($arr[$j] > $value) {
                $arr[$j+1] = $arr[$j];
            }else{
                break;
            }
        }
        // 进行数据插入
        $arr[$j+1] = $value;
        
    }
    
    return $arr;
}


$arr = [1,9,2];

$res = insertSort($arr);
var_dump($res);
````
