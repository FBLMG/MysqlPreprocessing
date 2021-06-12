# PHP对Mysql的预处理
自己封装的一小段代码段，主要功能是PHP对Mysql语句的预处理，主要目的可以防止大部分SQL语句的注入，同时方便调用，提高开发的效率，分别封装了以下6个方法，
###### _getDataList：获取列表数据
###### _getData：获取单条数据
###### _getDataRow：获取数据条数
###### _insertData：添加数据
###### _updateData：更新数据
###### _deleteData：删除数据
PHP官方参考文档地址
https://www.php.net/manual/zh/class.mysqli-stmt.php
