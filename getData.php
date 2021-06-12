<?php
/**
 * 获取单条数据
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$getDataSql = "SELECT * FROM `test` WHERE `id`=?  ";
#sql语句参数
$getDataParams = array("i", 1);
#调用方法
$getData = _getData($con, $getDataSql, $getDataParams);
#返回数据
return $getData;