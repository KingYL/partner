<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'     => 'Home', //默认模块
//    'URL_MODEL'          => '2', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session

    'DB_TYPE'      =>  'sqlite',     // 数据库类型
    'DB_NAME'    => DATA_PATH.'/test.db',
    'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
    'DB_FIELDS_CACHE'   => false,       // 启用字段缓存

    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ .'/Application/Public',
    ),
);
