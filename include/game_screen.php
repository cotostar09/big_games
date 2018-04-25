<?php

?>
<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
			<div class="col_3">
			<div class="col-md-12 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-clock-o icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?=$nowRoundData["gameRoundName"]?></strong></h5>
                      <div class="clock-wrapper" id = "clock">00:00</div><br/>
                    </div>
                </div>
        	</div>

        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box" data-toggle="modal" data-target="#APACHEModal" data-whatever="@mdo">
                    <i class="pull-left fa fa-dollar dollar2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>APACHE </strong></h5>
                      <span >1R WINNER Player<br/>문용민 / 서수영 / 안민우</span><br/>
                      <span>Total Point - 10,000</span>
                    </div>
                </div>
        	</div>

        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box" data-toggle="modal" data-target="#PHPModal" data-whatever="@mdo">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>PHP</strong></h5>
                      <span>1R WINNER Player No.<br/>Player 10 / Player 5</span><br/>
                      <span>Total Point - 10,000</span>
                    </div>
                </div>
        	</div>

        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box" data-toggle="modal" data-target="#MySQLModal" data-whatever="@mdo">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>MySQL</strong></h5>
                      <span>1R WINNER Player<br/>문용민</span><br/>
                      <span>Total Point - 10,000</span>
                    </div>
                </div>
        	</div>

        	<div class="col-md-6 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>내 재정상태: Player NO.<?=$playerData["playerCode"]?> </strong></h5>
                      
                      <TABLE class="table">
                      <TR>
                      	<TD><span><B>POINT</B></span></TD>
                      	<TD><span><?=$playerData["point"]?>P</span></TD>
                      	<TD><span><B>APACHE right</B></span></TD>
                      	<TD><span><?=$playerData["rightsA"]?></span></TD>
                      </TR>

                      <TR>
                      	<TD><span><B>PHP right</B></span></TD>
                      	<TD><span><?=$playerData["rightsB"]?></span></TD>
                      	<TD><span><B>MySQL right</B></span></TD>
                      	<TD><span><?=$playerData["rightsC"]?></span></TD>
                      </TR>
                      </TABLE>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
		</div>


		</div>
	</div>
</div>
		
		
		
		<!--// 게임플레이 APACHE Modal -->
        	<div class="modal fade" id="APACHEModal" tabindex="-1" role="dialog" aria-labelledby="APACHEModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="APACHEModalLabel">APACHE 투자하기</h4>
									</div>
									<div class="modal-body">
										<form>
										  <div class="form-group">
										  <label for="recipient-name" class="control-label">PLAYER NO.<?=$playerData["playerCode"]?> / <?=$_SESSION["users"]["name"]?>님</label>
											<br/>보유 POINT : <?=$playerData["point"]?>P
											</div>
											<div class="form-group">
												<label for="recipient-name" class="control-label">투자POINT:</label>
												<input type="number" class="form-control invPonitA" id="recipient-name" style="width: 100%" onkeypress="if(event.keyCode==13) {return false;}">
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
										<button type="button" class="btn btn-primary comA" data-dismiss="modal">투자</button>
									</div>
								</div>
							</div>
						</div>
		<!--// 게임플레이 APACHE Modal End-->
		
				<!--// 게임플레이 PHP Modal -->
        	<div class="modal fade" id="PHPModal" tabindex="-1" role="dialog" aria-labelledby="PHPModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="PHPModalLabel">PHP  투자하기</h4>
									</div>
									<div class="modal-body">
										<form>
										  <div class="form-group">
										  <label for="recipient-name" class="control-label">PLAYER NO.<?=$playerData["playerCode"]?> / <?=$_SESSION["users"]["name"]?>님</label>
											<br/>보유 POINT : <?=$playerData["point"]?>P
											</div>
											<div class="form-group">
												<label for="recipient-name" class="control-label">투자POINT:</label>
												<input type="number" class="form-control invPonitB" id="recipient-name" style="width: 100%" onkeypress="if(event.keyCode==13) {return false;}">
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
										<button type="button" class="btn btn-primary comB" data-dismiss="modal">투자</button>
									</div>
								</div>
							</div>
						</div>
		<!--// 게임플레이 PHP Modal End -->

				<!--// 게임플레이 MySQL Modal -->
        	<div class="modal fade" id="MySQLModal" tabindex="-1" role="dialog" aria-labelledby="MySQLModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="MySQLModalLabel">MySQL  투자하기</h4>
									</div>
									<div class="modal-body">
										<form>
										  <div class="form-group">
										  <label for="recipient-name" class="control-label">PLAYER NO.<?=$playerData["playerCode"]?> / <?=$_SESSION["users"]["name"]?>님</label>
											<br/>보유 POINT : <?=$playerData["point"]?>P
											</div>
											<div class="form-group">
												<label for="recipient-name" class="control-label">투자POINT:</label>
												<input type="number" class="form-control invPonitC" id="recipient-name" style="width: 100%" onkeypress="if(event.keyCode==13) {return false;}"> 
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
										<button type="button" class="btn btn-primary comC" data-dismiss="modal">투자</button>
									</div>
								</div>
							</div>
						</div>

		<!--// 게임플레이 MySQL Modal End -->

		<!-- //모달 중앙으로 이동 http://idenrai.tistory.com/66 -->
		<!--script>
  		$("#MySQLModal").modal('show').css({
        'margin-top': function () { //vertical centering
            return -($(this).height() / 2);
        },
        'margin-left': function () { //Horizontal centering
            return -($(this).width() / 2);
        }
      });

		</script-->
		
		<script>
				timer.start();
		</script>