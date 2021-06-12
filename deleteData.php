<?php
/**
 * 删除数据
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$deleteDataSql = "DELETE FROM `test` where `id` = ? ";
#sql语句参数
$deleteDataParams = array("i", 1);
#调用方法
$deleteDataResult = _updateData($con, $deleteDataSql, $deleteDataParams);
#返回数据
return $deleteDataResult;