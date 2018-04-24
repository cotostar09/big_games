
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<!--script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script-->		
		  <script src="js/bootstrap-datetimepicker.js"></script>

<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">회원가입</h2>
				<div class="sign-up-row widget-shadow">
				<form action="include/sing_up_proc.php" method="post">
				<h6>로그인 정보 : </h6>
				<span id = "checkIdResult">&nbsp;</span>
					<div class="sign-u">
								<input type="email" name = "email" class = "email" id = "check_id"  placeholder="Email Address" oninput="checkId()" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name = "password" id="pwd" class = "password" placeholder="Password" oninput="checkPwd()" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name = "Confirm_password" id="repwd" class = "password" placeholder="Confirm Password" oninput="checkPwd()" required="">
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
            <div class='sign-u input-group date' id="dateOfBirth">
                <input type='text' name = "dateOfBirth" placeholder="생 년 월 일" style="margin-bottom: 0px;" required=""/>
                <div class="clearfix"> </div>
                <span class="input-group-addon" onclick = "checkDate(<?=$timeCalSet?>);">
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
							<input type="submit" class="signupbtn" value="가입">
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
                format: 'YYYY/MM/DD',
                locale: 'ko'    //ko - 한국어, en - 영어
            });
            
            
                
        });
        
        //생년월일 set 시작 날자 변경. 
        var checkCalClick = 0;    //최초 1회 체크용 변수
        function checkDate(yaer, month, day){
            if(checkCalClick == 0){
               $('#dateOfBirth').data('DateTimePicker').date(new Date(yaer,month,day,0,0,0))
               checkCalClick++;
            }
        }
        
        
    </script>
