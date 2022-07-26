<html>
<head>
<meta charset="utf-8">
<title>Windows杀软在线对比辅助</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="https://cdn.bootcss.com/amazeui/2.2.1/css/amazeui.min.css" rel="stylesheet">
</head>

<body>
<header class="am-topbar">
  <h1 class="am-topbar-brand">
    <a>Windows杀软在线对比辅助</a>
  </h1>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="am-active"><a>首页</a></li>
      <li><a href="https://bugs.hacking8.com/tiquan/">提权</a></li>
      <li><a href="https://github.com/r00tSe7en/get_AV">GitHub</a></li>
    </ul>
  </div>
</header>

<table class="am-table am-table-bd am-table-striped am-table-hover">
    <thead>
        <tr>
            <th>系统进程</th>
            <th>杀软名称</th>
        </tr>
    </thead>
    <tbody>
<?php
error_reporting(0);
if(isset($_POST["input_process"])){
	// 处理textarea接收的数据
	$get_array_process = explode("\r\n",$_POST["input_process"]);
	// 从文件中读取数据到PHP变量
	$json_string = file_get_contents('av.json');
	// JSON字符串转数组
	$data = json_decode($json_string, true);
	// 循环遍历
	$flag=0;
	foreach($data as $local_process=>$process_to_soft)
	{
		foreach($get_array_process as $check_process){
			if (preg_match("/^($local_process)/i",$check_process)){
				echo "<tr><td>".$local_process."</td>"."<td>".$process_to_soft."</td></tr>";
				$flag=1;
				break;
			}	
		}
	}
	if(!$flag){echo "<tr><td>暂无匹配</td>"."<td>欢迎补充</td></tr>";}
}
?>
	</tbody>
</table>
<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
  <h2 class="am-titlebar-title">tasklist /SVC</h2>
</div>
<form class="am-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <div class="am-form-group">
      <textarea class="" rows="20" id="doc-ta-1" name="input_process"></textarea>
    </div>
    <p><button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-check"></i>提交</button></p>
  </fieldset>
</form>

<script src="https://cdn.bootcss.com/amazeui/2.2.1/js/amazeui.min.js"></script>

<footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
  <div class="am-footer-miscs ">
    <p>由
      <a href="https://www.se7ensec.cn/" title="Se7en" target="_blank">Se7en</a>提供技术支持</p>
    <p>CopyRight © 2019 All Rights Reserved.</p>
  </div>
</footer>
  </div>
</div>
</body>
</html>
