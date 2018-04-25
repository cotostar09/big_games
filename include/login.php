		
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">로그인</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="setting/auth_manage.php" method="post">
						  <span class="checkJoinOk"></span>
							<input type="email" class="user" name="email" placeholder="E-mail" required="">
							<input type="password" name="password" class="lock" placeholder="비밀번호" required="">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>아이디 저장하기</label>
								<div class="forgot">
									<!--a href="#">비밀번호 찾기</a-->  <!-- //비번찾기 기능 나중에 만들자. 메일 인증할때 -->
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="Sign In" value="Sign In">
							<div class="registration">
								계정이 없으신가요? 
								<a class="" href="?page=join">
									계정 생성하기
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
		//$(".checkJoinOk").text("회원가입을 축하합니다.");
		$(window).load(function () {
		  
       <?php
       if(isset($_SESSION["action"])&&!strcmp($_SESSION["action"] ,"joinOk")){?>

       $('.checkJoinOk').text('회원가입을 축하합니다.');
       $('.user').val('<?=$_SESSION["newID"]?>')

      <?php
        $_SESSION["action"] = "";
        $_SESSION["newID"]="";
       }?>
       
    });
		</script>