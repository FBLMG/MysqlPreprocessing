<?php
/**
 * 获取数据条数
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$getDataRowSql = "SELECT `id` FROM `test` WHERE `status`=?";
#sql语句参数
$getDataRowParams = array("i", 1);
#调用方法
$getDataRow = _getDataRow($con, $getDataRowSql, $getDataRowParams);
#返回数据
return $getDataRow;