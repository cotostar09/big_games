    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
		<link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
		<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="/mstile-144x144.png">
		
        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>		
		

<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">회원가입</h2>
				<div class="sign-up-row widget-shadow">
				<form action="include/sing_up_proc.php" method="post">
				<h6>로그인 정보 :</h6>
					<div class="sign-u">
								<input type="email" name = "email" placeholder="Email Address" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name = "password" placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name = "Confirm_password" placeholder="Confirm Password" required="">
						</div>
				
					<h5>회원 정보 :</h5>
				
					<div class="sign-u">
								<input type="text" id = "name" name="name" placeholder="이름" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u network">
								<input type="text" id = "network"  name = "network" placeholder="소속" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u local">
								<input type="text" name = "local" placeholder="거주지" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u Birth">
<!-- // -->

        <div class="form-group">
            <div class='input-group date' id='dateOfBirth'>
                <input type='text' name = "dateOfBirth" placeholder="생 년 월 일" style="margin-bottom: 0px;"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
<!--//-->
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>성별* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name="Gender" required="" value = "Male">
								남성
							</label>
							<label>
								<input type="radio" name="Gender" required="" value = "Female">
								여성
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" value="가입">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						이미 아이디가 있으신가요?
						<a class="" href="?page=login">
							로그인
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
		
    <script type="text/javascript">
        $(function () {
            $('#dateOfBirth').datetimepicker({
                viewMode: 'years',
                format: 'YYYY/MM/DD'
            });
        });
    </script>
		