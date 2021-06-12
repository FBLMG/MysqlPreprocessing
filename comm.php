<?php
/**
 * PHP预处理Mysql
 * Created by PhpStorm.
 * User: hzx
 * Date: 2021/06/12
 * Time: 10:56
 */


#数据库链接
$con = mysqli_connect("数据库地址", "数据库用户名", "数据库密码", "数据库名");


################################################  数据库操作  ################################################

/**
 * 获取列表数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return array
 */
function _getDataList($selfCon, $query, $params)
{
    //初始化返回结果接收容器
    $parameters = array();
    //初始化返回结果【返回数据】
    $results = array();
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取结果
    $meta = $stmt->result_metadata();
    //循环塞进容器
    while ($field = $meta->fetch_field()) {
        $parameters[] = &$row[$field->name];
    }
    //塞进数据容器
    call_user_func_array(array($stmt, 'bind_result'), _refValues($parameters));  //绑定结果
    //有多行记录时将多行记录存入$results数组中.
    while ($stmt->fetch()) {
        $x = array();
        foreach ($row as $key => $val) {
            $x[$key] = $val;
        }
        $results[] = $x;
    }
    //关闭查询
    $stmt->close();
    //返回数据
    return $results;
}

/**
 * 获取单条数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return array
 */
function _getData($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取数据
    $result = $stmt->get_result()->fetch_array();
    //关闭连接
    $stmt->close();
    //返回
    return $result;
}

/**
 * 获取数据条数
 * @param $selfCon
 * @param $query
 * @param $params
 * @return mixed
 */
function _getDataRow($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //清除数据
    $stmt->store_result();
    //获取数据条数
    $row = $stmt->num_rows;
    //关闭连接
    $stmt->close();
    //返回
    return $row;
}

/**
 * 添加数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return mixed
 */
function _insertData($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取本次插入ID
    $insertId = $stmt->insert_id;
    //关闭连接
    $stmt->close();
    //返回
    return $insertId;
}

/**
 * 更新数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return mixed
 */
function _updateData($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取本次操作的行数
    $updateRow = $stmt->affected_rows;
    $stmt->close();
    //返回
    return $updateRow;
}

/**
 * 删除数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return mixed
 */
function _deleteData($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取本次操作的行数
    $deleteRow = $stmt->affected_rows;
    $stmt->close();
    //返回
    return $deleteRow;
}


/**
 * 转化引入参数
 * @param $arr
 * @return array
 */
function _refValues($arr)
{
    if (strnatcmp(phpversion(), '5.3') >= 0) { //Refer
        //ence is required for PHP 5.3+
        $refs = array();
        foreach ($arr as $key => $value) {
            $refs[$key] = &$arr[$key];
        }
        return $refs;
    }
    return $arr;
}