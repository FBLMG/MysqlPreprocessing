<?php
/**
 * 更新数据
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/6/12
 * Time: 5:34 PM
 */


#引入公共配置文件
require 'comm.php';
#sql语句
$updateDataSql = "UPDATE `test` SET `status`=?,`title`=? WHERE `id`=? ";
#sql语句参数
$updateDataParams = array("is",2,"测试数据",);
#调用方法
$updateResult = _updateData($con, $updateDataSql, $updateDataParams);
#返回数据
return $updateResult;