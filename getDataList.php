<?php
/**
 * 获取多条数据
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$getDataListSql = "SELECT * FROM `test` WHERE `status`=?  ";
#sql语句参数
$getDataListParams = array("i", 1);
#调用方法
$getDataList = _getDataList($con, $getDataListSql, $getDataListParams);
#初始化数据
$dataList = array();
#循环数据
foreach ($dataList as $key => $value) {
    $dataList[] = array(
        "id" => intval($value["id"]),
        "title" => $value["title"],
    );
}
#返回数据
return $dataList;