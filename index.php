<?php
/**
 * 增删工具条中的功能：修改 js/umeditor.config.js toolbar
 * js/dialogs/：弹出对话框对应的资源和JS文件
 * js/lang/：编辑器国际化显示的文件
 * js/php/：涉及到服务器端操作的后台文件
 * js/themes/：样式图片和样式文件
 * js/third-party/：第三方插件
 * js/umeditor.config.js：编辑器的配置文件
 * js/umeditor.js：开发查看
 * js/umeditor.min.js：部署时使用
 * js/php/imageUp.php：负责上传的图片（在编辑器中插入本地图片时，就会上传）
 * js/php/Uploader.class.php：ue上传文件类
 */
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
ueditor demo
</title>
<link href="js/themes/default/css/umeditor.css" type="text/css" rel="stylesheet"><!-- 编辑器样式 -->
<script type="text/javascript" src="js/third-party/jquery.min.js"></script><!-- 第三方jQuery -->
<script type="text/javascript" charset="utf-8" src="js/umeditor.config.js"></script><!-- 编辑器配置 -->
<script type="text/javascript" charset="utf-8" src="js/umeditor.min.js"></script><!-- 部署用编辑器js -->
</head>
<body>

	<div>
		<h3 id="tip">ueditor demo</h3>
	</div>

	<form action="sub.php" method="post">
		<!-- 定义一个编辑器id=myEditor -->
		<script type="text/plain" id="myEditor" name="myEditor" style="width:1000px;height:240px;">
			<p>这里我可以写一些输入提示</p>
		</script>
		<input type="submit" value="提交"/>
	</form>

	<!-- 焦点 -->
	<div>
		<span>焦点操作：</span>
		<input type="button" value="判断焦点" onclick="isFocus();">
		<input type="button" value="获得焦点" onclick="setFocus();">
		<input type="button" value="失去焦点" onclick="doBlur();">
	</div>

	<!-- 内容 -->
	<div>
		<span>获取内容操作：</span>
		<input type="button" value="获取整个html" onclick="getAllHtml();">
		<input type="button" value="获得内容" onclick="getContent();">
		<input type="button" value="获得带格式纯文本" onclick="getPlainTxt();">
		<input type="button" value="获得纯文本" onclick="getContentTxt();">
		<input type="button" value="是否有内容" onclick="hasContent();">
	</div>
	<div>
		<span>设置内容操作：</span>
		<input type="button" value="设置内容" onclick="setContent(false);">
		<input type="button" value="追加内容" onclick="setContent(true);">
	</div>

	<!-- 设置 -->
	<div>
		<span>设置：</span>
		<input type="button" value="可编辑" onclick="setEnabled();">
		<input type="button" value="只读" onclick="setDisabled();">
		<input type="button" value="隐藏编辑器" onclick="UM.getEditor('myEditor').setHide();">
		<input type="button" value="显示编辑器" onclick="UM.getEditor('myEditor').setShow();">
		<input type="button" value="设置高度" onclick="UM.getEditor('myEditor').setHeight(300);">
		<input type="button" value="设置宽度" onclick="UM.getEditor('myEditor').setWidth(1200);">
	</div>

	<script type="text/javascript">

		// 实例化编辑器
		var um = UM.getEditor('myEditor');

		// 监听焦点事件
		um.addListener('blur',function(){
			$('#tip').html('编辑器失去焦点');
		});
		um.addListener('focus',function(){
			$('#tip').html('编辑器获得焦点');
		});

		// 插入内容
		function insertHtml(){
			var value = prompt('插入内容', '');
			um.execCommand('insertHtml', value);
		}

		// 判断焦点
		function isFocus(){
			alert(um.isFocus());
		}
		// 设置焦点
		function setFocus(){
			UM.getEditor('myEditor').focus();
		}
		// 失去焦点
		function doBlur(){
			um.blur();
		}

		// 获取整个html源代码
		function getAllHtml() {
			alert(UM.getEditor('myEditor').getAllHtml());
		}
		// 获取编辑器中的内容
		function getContent() {
			var arr = [];
			arr.push("使用editor.getContent()方法可以获得编辑器的内容");
			arr.push("内容为：");
			arr.push(UM.getEditor('myEditor').getContent());
			alert(arr.join("\n"));
		}
		// 获取编辑器中的带格式纯文本（例如换行）
		function getPlainTxt(){
			var arr = [];
			arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
			arr.push("内容为：");
			arr.push(UM.getEditor('myEditor').getPlainTxt());
			alert(arr.join('\n'))
		}
		// 获取编辑器中的去除格式的纯文本（例如无换行）
		function getContentTxt(){
			var arr = [];
			arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
			arr.push("编辑器的纯文本内容为：");
			arr.push(UM.getEditor('myEditor').getContentTxt());
			alert(arr.join("\n"));
		}
		// 判断编辑器是否有内容
		function hasContent(){
			var arr = [];
			arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
			arr.push("判断结果为：");
			arr.push(UM.getEditor('myEditor').hasContents());
			alert(arr.join("\n"));
		}

		// 写入内容（isAppendTo：是否是追加）
		function setContent(isAppendTo){
			var arr = [];
			arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
			UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
			alert(arr.join("\n"));
		}

		// 设置编辑器只读
		function setDisabled(){
			UM.getEditor('myEditor').setDisabled('fullscreen');
		}
		// 设置编辑器可编辑
		function setEnabled(){
			UM.getEditor('myEditor').setEnabled();
		}

	</script>

</body>
</html>