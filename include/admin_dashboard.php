<div id="page-wrapper">
			<div class="main-page">
<!--//본문 시작 -->
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
    					  <button type="button" class="btn btn-primary btn-flat btn-pri" onclick = "gameTimeSet.initialsetTime()"><i class="fa fa-plus" aria-hidden="true"></i>Set</button>
    					  <button type="button" class="btn btn-success btn-flat btn-pri" onclick = "gameTimeSet.resetTime()" ><i class="fa fa-minus" aria-hidden="true"></i>Reset</button>
    						<button type="button" class="btn btn-info btn-flat btn-pri" data-toggle="modal" data-target="#AddTimeModal" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>		
    					<input type="submit" class="btn btn-info btn-flat btn-pri" value="SAVE SET"/>
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
						<div class="mail"><!--img src="images/i1.png" alt=""--></div>
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
    						<input type="text" value="게임 이름을 지정해주세요." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '게임 이름을 지정해주세요.';}" required="">
    						<input type="submit" value="GAME START"/>		
    					</form>
    				</div>
    			</div>
    			
    			
    			
<!--//본문 끝 -->
    </div>
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