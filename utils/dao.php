<?php
/**
* @param $con
* @param $sql
* @return array[数字][键] 查询列表的多个数据 行对应索引数组，列对应key数组
*/

function  queryList($con,$sql){
    $res = mysqli_query($con,$sql);
    $i = 0;
    $output=[];
    while ($row = mysqli_fetch_assoc($res)) {
    $output[$i] = $row;
    $i++;
    }
    return $output;
}

/**
 * @param $conn
 * @param $sql
 * @return string[]|null
 *  对应数组
 */
function queryOneRecord($conn,$sql){
    $res = mysqli_query($conn,$sql) or  die("查询失败");
    $row = mysqli_fetch_assoc($res);
    return $row;
}

/**
 * @param $conn
 * @param $sql
 * @return bool 对应增删改查
 */
function changeRecord($conn,$sql){
    $res = mysqli_query($conn,$sql) or  die("查询失败");
    if (empty($res)){
        return false;
    }
    return true;
}

?>