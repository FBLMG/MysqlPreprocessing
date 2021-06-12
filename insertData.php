<?php
/**
 * 添加数据
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$insertDataSql = "INSERT INTO `test` (`title`,`status`)  VALUES (?,?)  ";
#sql语句参数
$insertDataParams = array("si","测试", 1);
#调用方法
$insertId = _insertData($con, $insertDataSql, $insertDataParams);
#返回数据
return $insertId;