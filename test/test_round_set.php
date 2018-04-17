<?php
    include_once '../setting/db_connect.php';
    include_once '../setting/function.php';
    //include_once 'setting/session_manage.php';
    error_reporting(E_ALL);         //에러 호출
    ini_set("display_errors", 1);   //에러 호출
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Bidding Ventures</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.css?ver=1" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="../css/style.css?ver=1" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='../css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="../js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js?ver=2"></script>
<link href="../css/custom.css?ver=1" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
<?php
        // 로그인에 따라 나오는 메뉴의 종류가 다르게 추가 시키자.
        require_once ('../layout/sub_menu.php');				//보조 메뉴
?>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left">
				<!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new notification</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/4.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p><span>1 hour ago</span></p>
									</div>
								  <div class="clearfix"></div>	
								 </a></li>
								 <li class="odd"><a href="#">
									<div class="user_img"><img src="images/1.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li><a href="#">
									<div class="user_img"><img src="images/3.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								<li><a href="#">
								   <div class="user_img"><img src="images/1.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								</a></li>
								 <li>
									<div class="notification_bottom">
										<a href="#">See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>	
						
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p>문용민</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li> 
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
								<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				
				
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		
<div id="page-wrapper">
			<div class="main-page">
<!--//본문 시작 -->
11
<?php
  $userDataManag = new UserDataManagment($db_connect);
  
  //print_r($userDataManag->getUserData());
  
?>

    <div class="col_1">
          <!--//게임 라운드 세팅 -->
    			<div class="col-md-4 span_8">
    				<div class="activity_box">
    					<h2>게임 라운드 세팅</h2>
    					<div class="scrollbar" id="style-1" class="round_list"><!--// 추가하기 버튼으로 추가-->


    					</div>
    					<form action="#" method="post">
    					  <button type="button" class="btn btn-success btn-flat btn-pri" onclick = "gameTimeSet.resetTime()" ><i class="fa fa-plus" aria-hidden="true"></i>Reset</button>
    						<button type="button" class="btn btn-info btn-flat btn-pri" data-toggle="modal" data-target="#AddTimeModal" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>		
    					<input type="submit" class="btn btn-info btn-flat btn-pri" value="게임 생성"/>
    					</form>
    				</div>
    			</div>
    			<!--//게임 라운드 세팅 End -->

    			<div class="col-md-4 span_8">
    				<div class="activity_box activity_box1">
    					<h3>플레이어&nbsp; &nbsp; (0/<?=$userDataManag->countUserData()?>)</h3>
    					<div class="scrollbar" id="style-3" style="padding-top: 0px;">
    					<?php
    					foreach($userDataManag->getUserData() as $user){
    					  ?>
    					  
    					  
    					  <div class="activity-row activity-row1 inbox-page" style=" margin-bottom:0px; padding-bottom:0px; margin-top:10px; ">
          <div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"> <h6><?=$user['userID']?></h6> </div>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
								
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$user['idx']?>" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
											<i class="fa fa-info-circle mail-icon"></i>
											Info
										</a>
									</li>

								</ul>
							</div> 
						</div>
						<div class="mail-right"><p><?=$user['name']?></p></div>
						<div class="clearfix"> </div>
						<div id="collapse_<?=$user['idx']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
							<div class="mail-body">
								<p>플레이어 정보
								<br/>이름 : <?=$user['name']?>
								<br/>소속 : <?=$user['belong']?>
								<br/>거주지 : <?=$user['residence']?>
								<br/>생년월일 : <?=$user['dateOfBirth']?>
								<br/>보유 POINT : <?=$user['point']?> POINT
								</p>
							</div>
						</div>
					</div>
    			</div>
                <?php }?>

    					</div>
    					<form action="#" method="post">
    						<input type="text" value="게임 코드를 생성해주세요" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your text';}" required="">
    						<input type="submit" value="게임시작"/>		
    					</form>
    				</div>
    			</div>
    			
    			
    			
    			
    			<div class="col-md-4 span_8">
    				<div class="activity_box activity_box2">
    					<h3>todo</h3>
    					<div class="scrollbar" id="style-2">
    						<div class="activity-row activity-row1">
    							<div class="single-bottom">
    								<ul>
    									<li>
    										<input type="checkbox"  id="brand" value="">
    										<label for="brand"><span></span> Integer sollicitudin lacinia condimentum.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand1" value="">
    										<label for="brand1"><span></span> ligula sit amet hendrerit init lorem.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand2" value="">
    										<label for="brand2"><span></span>  Donec aliquam dolor eu augue condimentum.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand9" value="">
    										<label for="brand9"><span></span>  at tristique Pain that produces no resultant.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand8" value="">
    										<label for="brand8"><span></span> Nulla finibus rhoncus turpis quis tristique.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand7" value="">
    										<label for="brand7"><span></span> Cupidatat non proident Praising pain.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand3" value="">
    										<label for="brand3"><span></span>  libero vel elementum euismod, mauris tellus</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand4" value="">
    										<label for="brand4"><span></span> Donec aliquam dolor eu augue condimentum.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand5" value="">
    										<label for="brand5"><span></span> Orci varius natoque penatibus et magnis dis.</label>
    									</li>
    									<li>
    										<input type="checkbox"  id="brand6" value="">
    										<label for="brand6"><span></span> parturient Dolorem ipsum quia.</label>
    									</li>
    									
    									
    								</ul>
    							</div>
    						</div>
    					</div>
    					<form action="#" method="post">
    						<input type="text" value="Enter your text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your text';}" required="">
    						<input type="submit" value="Submit"/>		
    					</form>
    				</div>
    				<div class="clearfix"> </div>
    			</div>
    			<div class="clearfix"> </div>
    			
    		</div>
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		<div class="panel-default">
						<div class="panel-heading">
							Inbox 
						</div>
						<div class="inbox-page">
					<h4>Today</h4>
					<div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"> <h6>Alexander</h6> </div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
							<div class="mail"><p>Nullam quis risus eget urna mollis ornare accusamus terry </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>30th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 187px;">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow" id="accordion1" role="tablist" aria-multiselectable="true">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i2.png" alt=""></div>
						<div class="mail mail-name"><h6>Michael</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
							<div class="mail"><p>Mollis nullam quis risus eget ornare accusamus terry </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>30th Nov</p></div>
						<div class="clearfix"> </div>	
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 212px;">
							<div class="mail-body">
								<p>Quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i3.png" alt=""></div>
						<div class="mail mail-name"><h6>Davidson</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapsethree" class="collapsed">
							<div class="mail"><p>Ornare vel eu leo nullam quis urna mollis accusamus terry </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>30th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 209px;">
							<div class="mail-body">
								<p>Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i4.png" alt=""></div>
						<div class="mail mail-name"><h6>Charley</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							<div class="mail"><p>Vely Ornare  leo nullam quis risus mollis lorem ipsum</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapsefour">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>30th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="mail-body">
								<p> Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="inbox-page row">
					<h4>Yesterday Messages</h4>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i2.png" alt=""></div>
						<div class="mail mail-name"><h6> Michael </h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="collapsed">
							<div class="mail"><p>Mollis nullam quis risus eget urna  ornare dolor sit amet</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="collapsed">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>29th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 212px;">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch Nihil.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail"> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"><h6>Janiya</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapsesix">
							<div class="mail"><p>Nullam quis risus eget urna mollis ornare eiusmod accusamus</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>29th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
							<div class="mail-body">
								<p>Officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i3.png" alt=""></div>
						<div class="mail mail-name"><h6>Skolski</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSev" aria-expanded="true" aria-controls="collapsesev">
							<div class="mail"><p>Ornare vel eu leo nullam quis urna mollis eiusmod high life</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSev" aria-expanded="true" aria-controls="collapseSev">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>29th Nov</p></div>
						<div class="clearfix"> </div>	
						<div id="collapseSev" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsev">
							<div class="mail-body">
								<p>wolf moon officia aute, non cupidatat skateboard dolor brunch aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i4.png" alt=""></div>
						<div class="mail mail-name"><h6>Emoori</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
							<div class="mail"><p>Vely Ornare  leo nullam eget urna mollis lorem ipsum</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>29th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="inbox-page row">
					<h4>Older Messages</h4>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i2.png" alt=""></div>
						<div class="mail mail-name"><h6> Michael</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapsenine">
							<div class="mail"><p>Mollis nullam quis risus ornare vel leo dolor sit amet</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>29th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine">
							<div class="mail-body">
								<p>Skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"><h6>Janiya</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
							<div class="mail"><p>Nullam quis risus mollis ornare leo ollis nullam quis</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>28th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingten">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i3.png" alt=""></div>
						<div class="mail mail-name"><h6>Skolski</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapse11">
							<div class="mail"><p>Ornare vel quis risus ollis nullam quis eget urna mollis </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapse11">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>28th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
							<div class="mail-body">
								<p>Nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i4.png" alt=""></div>
						<div class="mail mail-name"><h6>Emoori</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="true" aria-controls="collapse12">
							<div class="mail"><p>Vely Ornare  leo nullam quis risus eget ollis nullam quis</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="true" aria-controls="collapse12">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>27th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
							<div class="mail-body">
								<p>Anim pariatur cliche repreh enderit brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"><h6>Janiya</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="true" aria-controls="collapse13">
							<div class="mail"><p>Vely Ornare quis risus ollis nullam quis eget urna mollis </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="true" aria-controls="collapse13">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>26th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon temsunt </p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i3.png" alt=""></div>
						<div class="mail mail-name"><h6>Skolski</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="true" aria-controls="collapse14">
							<div class="mail"><p>Vely Ornare  leo nullam quis ollis nullam quis risus eget </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>26th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i1.png" alt=""></div>
						<div class="mail mail-name"><h6>Janiya</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15">
							<div class="mail"><p>Nullam quis risus mollis ornare vel eu leo ollis nullam quis</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>26th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i2.png" alt=""></div>
						<div class="mail mail-name"><h6> Michael</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="true" aria-controls="collapse16">
							<div class="mail"><p>Mollis nullam quis risus eget ollis nullam quis urna</p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="true" aria-controls="collapse16">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>25th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua putica sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i3.png" alt=""></div>
						<div class="mail mail-name"><h6>Skolski</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="true" aria-controls="collapse17">
							<div class="mail"><p>Ornare vel eu leo nullam quis urna mollis ollis nullam quis</p></div>
						</a>
						<div class="mail-right  dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="true" aria-controls="collapse17">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>25th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
							<div class="mail-body">
								<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
					<div class="inbox-row widget-shadow">
						<div class="mail "> <input type="checkbox" class="checkbox"> </div>
						<div class="mail"><img src="images/i4.png" alt=""></div>
						<div class="mail mail-name"><h6>Emoori</h6></div>
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="true" aria-controls="collapse18">
							<div class="mail"><p>Vely Ornare  leo nullam quis ollis nullam quis risus mollis </p></div>
						</a>
						<div class="mail-right dots_drop">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
								</a>
								<ul class="dropdown-menu float-right">
									<li>
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="true" aria-controls="collapse18">
											<i class="fa fa-reply mail-icon"></i>
											Reply
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="fa fa-download mail-icon"></i>
											Archive
										</a>
									</li>
									<li>
										<a href="#" class="font-red" title="">
											<i class="fa fa-trash-o mail-icon"></i>
											Delete
										</a>
									</li>
								</ul>
							</div> 
						</div>
						<div class="mail-right"><p>10th Nov</p></div>
						<div class="clearfix"> </div>
						<div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
							<div class="mail-body">
								<p>Laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
								<form>
									<input type="text" placeholder="Reply to sender" required="">
									<input type="submit" value="Send">
								</form>
							</div>
						</div>
					</div>
				</div>
						
			</div>
    		
    		
    		
    		
    		
    		
    		
    		
    		
<!--//본문 끝 -->
    </div>
</div>





		<!--// 라운드 추가 Modal -->
        	<div class="modal fade" id="AddTimeModal" tabindex="-1" role="dialog" aria-labelledby="#AddTimeModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="#AddTimeModalLabel">게임 일정 추가</h4>
									</div>
									<div class="modal-body">
										<form>
										 <div class="form-group">
												<label for="recipient-name" class="control-label">구분</label>
												<select name="roundType" id="roundType">
                          <option selected="selected">PLAY</option>
                          <option>REST</option>
                        </select>
											</div>
										  <div class="form-group">
												<label for="recipient-name" class="control-label">별칭</label>
												<input type="text" class="form-control" id="roundName" >
											</div>
											<div class="form-group">
												<label for="recipient-name" class="control-label">시간(분):</label>
												<input type="number" class="form-control" id="roundTime" style="width: 60%">
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
										<button type="button" class="btn btn-primary" onclick = "gameTimeSet.appendTime(document.getElementById('roundType').value,document.getElementById('roundName').value,document.getElementById('roundTime').value)">추가</button>
									</div>
								</div>
							</div>
						</div>
		<!--// 라운드 추가 Modal End-->


<script>
 var gameTimeSet = new GameTimeList("gameTimeSet","style-1",0,0);

</script>

	<!--footer-->
	<div class="footer">
	   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved.</p>		
	</div>
    <!--//footer-->
	</div>

	
	<!-- Classie --><!-- for toggle left push menu script 필수!! 중요!!-->
		<script src="../js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script 필수!! 중요!!-->
		
	<!--scrolling js-->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='../js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
		
	<!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
	<?php
	  error_reporting(E_ALL);         //에러 호출
    ini_set("display_errors", 1);   //에러 호출
	?>
</body>
</html>