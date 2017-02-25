
<?php 
// 处理错误级别 不显示 注意信息
// http://www.w3school.com.cn/php/func_error_reporting.asp
error_reporting(E_ALL & ~E_NOTICE);

// http://studyit.com/index.php/teacher/add
// 	访问：views/teacher/teacher_add.html

// 第一步：拿到 /teacher/add
// print_r( $_SERVER );
$pathinfo = $_SERVER['PATH_INFO'];

// explode分割字符串
// print_r( explode('/', $pathinfo) );

// 字符串截取
// echo substr($pathinfo, 1);

// print_r( explode('/', substr($pathinfo, 1)) );

// []
$pathinfo = explode('/', substr($pathinfo, 1));

// print_r( $pathinfo );
// echo count($pathinfo);

// 当前文件夹名称（/teacher/add 中的 teacher）
$folder = $pathinfo[0];

// 当前文件名称（/teacher/add 中的 add）
$filename = $pathinfo[1];

// echo $folder;
// echo $filename;

// 如果只输入了一个路径（/login）
// /login
// /index/login.html
if( count($pathinfo) == 1 ) {
	// 判断一下， $folder 是否为空
	// 如果为空，说明：说明 index.php 后面没有路径
	// 如果不为空，说明后面是有一个路径的！
	if(!$folder) {
		$folder = 'index';
		$filename = 'index';
	} else {
		$filename = $folder;
		$folder = 'index';
		// $folder => index
		// $filenam => login
	}
}


// 引入一个文件
 include '/views/' . $folder . '/' . $filename . '.html';
// /views/teacher/add.html


// http://studyit.com/index.php/login 
// 就相当于要访问到： /index/login.html
// 
// /index ==> /index/index.html

// http:/