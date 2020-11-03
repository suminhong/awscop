<?php
	$conn=mysqli_connect('localhost','root','비밀번호','awscop');

	$basic=$_POST['basic'];
	$extra=$_POST['extra'];

	if ($basic <=2000000){
		$tax=0.01;
	}
	elseif ($basic<=4000000) {
		$tax=0.02;
	}
	else {
		$tax=0.03;
	}

	$salary=($basic+$extra)*(1-$tax);

	$filtered=array(
		'name' => mysqli_real_escape_string($conn, $_POST['name']),
		'rank' => mysqli_real_escape_string($conn, $_POST['rank']),
		'basic' => mysqli_real_escape_string($conn, $basic),
		'extra' => mysqli_real_escape_string($conn, $extra)
	);

	$sql="
		INSERT INTO 월급관리 (이름, 직급, 기본급, 수당, 세율, 월급)
		VALUES (
			'{$filtered['name']}',
			'{$filtered['rank']}',
			'{$filtered['basic']}',
			'{$filtered['extra']}',
			$tax,
			$salary
		)"
	;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AWSCOP</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
	<div id="header">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="LOGO"></a>
		</div><!--logo-->
		<ul id="navigation">
			<li><a href="create.php">신규등록</a></li>
			<li><a href="print.php">조회/수정</a></li>
		</ul><!--navigation-->
	</div><!--header-->
	<div id="contents">
		<?php
			$result=mysqli_query($conn, $sql);
			if($result === false) {
				echo '글 등록 오류가 발생하였습니다. 관리자에게 문의하세요.';
    			echo error_log(mysqli_error($conn));
			} else {
    			echo '정상적으로 등록되었습니다.<br><a href="index.php">메인 페이지로 돌아가기</a>';
			}
		?>
	</div><!--contents-->
	<div id="footer">
		<div id="links">
			<li>
				<h4>홈페이지 이상 시</h4>
				<ul>
					<li>TEL : 0212345678</li>
					<li>E-MAIL : aws123@gmail.com</li>
				</ul>
			</li>
			<li>
				<h4>Social Links</h4>
				<ul id="connect">
					<li>
						<a href="https://twitter.com/" target="_blank">Twitter</a>
					</li>
					<li>
						<a href="https://www.facebook.com/" target="_blank">Facebook</a>
					</li>
				</ul><!--connect-->
			</li>
		</div><!--links-->
		<p class="footnote">
			© 2020. Hong Su Min all rights reserved.
		</p>
	</div><!--footer-->
	</div><!--page-->
</body>
</html>
