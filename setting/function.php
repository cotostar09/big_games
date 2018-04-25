<?php
    $timestamp = time();
    $time = gmdate("Y-m-d h:i:s", $timestamp);
    
    
    $yearAsSeconds = 31556926;                         //1년 31556926초
    $monthAsSeconds = 2629800;                         //1달 2629800초
     
    $CalStartSet = $timestamp-($yearAsSeconds * 24)-$monthAsSeconds;   //현재 날자에서 24년을 뺌
    $timeCalSet = gmdate("Y, m, d", $CalStartSet);     //생년월일 캘린더 기본날자
    
    
    //로그아웃 관련 함수
  	function logout(){
  		session_destroy();  //현재의 세션을 종료한다
  		header("Location: ../");
  	}
    
    //로그인 함수
    function login($email, $password){
      global $db_connect;
      
  
      $sql = "SELECT * FROM big_games.user where userID =:checkID;";
      echo $sql."<br>";
      
      try{
     			$prerare = $db_connect->prepare($sql);
     			$prerare->bindValue(':checkID',$email, PDO::PARAM_STR);
          $prerare->execute();
          
          $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		  	//$row=$prerare->fetchAll();    //결과 전체 저장
  	  		$row=$prerare->fetch();         //결과 한줄씩 저장
  	  		
  	  		print_r($row);
  	  		echo "<br>";
  	  		echo "isset-".isset($row)."<br>";
  	  		echo "pw veri-".password_verify($password, $row['userPW']);
  	  		
  	  		
  	  		if(password_verify($password, $row['userPW'])){    //true
  	  		  return $row;
  	  		}else{    //false
  	  		  return "missLoing";
  	  		}
          
        }catch(Exception $e){
        	echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
        }
      
    
    }   //login END
    
    

    //회원가입함수
    function userJoin($email, $password, $name, $network, $local, $dateOfBirth, $Gender){
      global $db_connect;
      global $time;
      $emailSave = $email;
      
      //strip_tags -> 이것도 사용 가능
      $email = htmlspecialchars($email);
      $name = htmlspecialchars($name);
      $network = htmlspecialchars($network);
      $local = htmlspecialchars($local);
      $dateOfBirth = htmlspecialchars($dateOfBirth);
      $Gender = htmlspecialchars($Gender);
      
      $password = password_hash($password, PASSWORD_DEFAULT);
      
      
      
      //가입 전 처리
      //ID 중복처리
       $sql = " SELECT count(userID) as checkID FROM big_games.user where userID =:checkID;";
       
       echo "<br/>\$email : ".$email;
      
      try{
  			$prerare = $db_connect->prepare($sql);
  			$prerare->bindValue(':checkID', $email, PDO::PARAM_STR);
  			$prerare->execute();
  			
  			$prerare->setFetchMode(PDO::FETCH_ASSOC);
  			//$row=$prerare->fetchAll();    //결과 전체 저장
  			$row=$prerare->fetch();         //결과 한줄씩 저장
  			
  			$checkID = $row['checkID'];
  			echo "<br/>\$checkID : ".$checkID;
  			
  			if($checkID == '0'){  //중복된 아이디가 없는 경우
  			  
  			  $sql = "INSERT INTO `big_games`.`user` (userID, userPW, name, sex, dateOfBirth, residence, belong,joinDate,point,authCode,comment)".
          " VALUES (:userID,:userPW, :name, :sex, :dateOfBirth, :residence , :belong, :joinDate, :point, :authCode, :comment );";
    
          //echo "<br/>sql:".$sql."<br/>";
          echo "<br/>가입시간 : ".$time;
          
          try{
          			$prerare = $db_connect->prepare($sql);
          			$prerare->bindValue(':userID',$email, PDO::PARAM_STR);
          			$prerare->bindValue(':userPW',$password, PDO::PARAM_STR);
          			$prerare->bindValue(':name',$name, PDO::PARAM_STR);
          			$prerare->bindValue(':sex',$Gender, PDO::PARAM_STR);
          			$prerare->bindValue(':dateOfBirth',$dateOfBirth, PDO::PARAM_STR);
          			$prerare->bindValue(':residence',$local, PDO::PARAM_STR);
          			$prerare->bindValue(':belong',$network, PDO::PARAM_STR);
          			$prerare->bindValue(':joinDate',$time, PDO::PARAM_STR);
          			$prerare->bindValue(':point',0, PDO::PARAM_INT);
          			$prerare->bindValue(':authCode','U', PDO::PARAM_STR);
          			$prerare->bindValue(':comment','', PDO::PARAM_STR);
          			
          			$prerare->execute();
        		}catch(Exception $e){
        				echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
        		}//INSERT USER END
      			    $_SESSION["action"] = "joinOk"; 
      			    $_SESSION["newID"] = $email;
  	            header("Location: ../index.html");
  			  echo "<br/>가입되었습니다.";
  			}else{  //중복 아이디가 있는경우
  			  echo "<br/>아이디(E-mail) 중복입니다. ";
  			}
  			
		}catch(Exception $e){
				echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
		}//SELECT count ID End
		
    }//function userJoin End



//유저 데이터 관리 Class
 class UserDataManagment{
      //global $db_connect;   //class는 global안먹힘;;
      
      private $userData, $db_connect;
      
      //생성자
      function __construct($db_conn){
        
        $this->db_connect = $db_conn;
        
        $sql = " SELECT * FROM big_games.user where authCode ='U';";  //권한 유저만 SELECT
        
         try{
          			$prerare = $this->db_connect->prepare($sql); 
          			$prerare->execute();
          			$prerare->setFetchMode(PDO::FETCH_ASSOC);
          			$row=$prerare->fetchAll();    //결과 전체 저장
          			
          			$this->userData = $row;
          			//echo "UserData 생성";
          			
          			//print_r($userData);
        	}catch(Exception $e){
        				echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
        	}//SELECT USER END
      }    //생성자 END
      
      function __destruct(){
       // echo "UserData 소멸";
        }
      
      
      //전체 유저 데이터 GET
      public function getUserData(){
        return $this->userData;
      }
      //유저 데이터 총 개수 GET
      public function countUserData(){
        return count($this->userData);
      }
      
      public function print_UserData(){
        print_r( $this->userData );
      }
      
  } //Class END
  
  
  
  
  //게임 데이터 클래스
  class gameData{
    /* 이 클래스의 객체는 생성후에 세션에 저장시켜두고 써볼까? < 좀 고민해보자.
    **
    */
    
    private $db_connect, $adminId;
    
    //게임 데이터, 게임 시간 데이터, 플레이어 명단 데이터
    private $gameData, $gameTime, $playerList;
    
    private $viewPage;
      
    //생성자(DB객체, 관리자 계정)
    function __construct($db_conn, $aId){
      $this->db_connect = $db_conn;
      $this->adminId = $aId;
      
      $readyOK;
      
      //클래스 생성할때 게임 세팅 데이터(gameSetDataBV) 에 준비중인 게임이 있는가 확인해야함!!!!
      //게임을 플레이 하고 있다면 생성 ㄴㄴ 
      //없다면 준비중인 게임 하나 만들어주자!!
      $readyOK_sql = "SELECT count(gameStatus) as readyOK from gameSetDataBV where gameStatus = :readyStatus or gameStatus like :playStatus and setAdmin = :adminId;";
      try{
       		$prerare = $this->db_connect->prepare($readyOK_sql); 
       	  $prerare->bindValue(':readyStatus',"R", PDO::PARAM_STR);
       	  $prerare->bindValue(':playStatus',"P%", PDO::PARAM_STR);
          $prerare->bindValue(':adminId',$this->adminId , PDO::PARAM_STR);
      		$prerare->execute();
      		$prerare->setFetchMode(PDO::FETCH_ASSOC);
      		$row=$prerare->fetch();

      		$readyOK = $row["readyOK"];

      }catch(Exception $e){
      		echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      }//SELECT readyOK END
      
      if($readyOK == 0){ //만약 없다면 INSERT 시키고 그 데이터를 SELECT!
        //gameData INSERT
        $sql = "INSERT INTO `big_games`.`gameSetDataBV` (gameStatus, setAdmin)"." VALUES (:gameStatus,:setAdminId);";
        try{
          $prerare = $this->db_connect->prepare($sql);
          $prerare->bindValue(':gameStatus',"R", PDO::PARAM_STR);
          $prerare->bindValue(':setAdminId',$this->adminId, PDO::PARAM_STR);
          
          $prerare->execute();
        }catch(Exception $e){
          	echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
        } //INSERT gameSetData END
      
      }else{    //있다면 뒤에 화면 안보임
          $readyOK_sql = "SELECT count(gameStatus) as playOK from gameSetDataBV where gameStatus like :playStatus and setAdmin = :adminId;";
          $prerare = $this->db_connect->prepare($readyOK_sql); 
       	  $prerare->bindValue(':playStatus',"P%", PDO::PARAM_STR);
          $prerare->bindValue(':adminId',$this->adminId , PDO::PARAM_STR);
      		$prerare->execute();
      		$prerare->setFetchMode(PDO::FETCH_ASSOC);
      		$row=$prerare->fetch();

      		$playOK = $row["playOK"];
      		if($playOK == 1){
      		  //require_once 'include/admin_dashboard.php';
      		  $this->viewPage = "admin_dashboard";
            return 0;
      		}
      }   
      
      
      //gameData SELECT ==> $gameData에 저장.
      $sql = "SELECT * from gameSetDataBV where gameStatus = :gameStatus and setAdmin = :adminId ORDER BY gameEpisode DESC;";
      try{
       		$prerare = $this->db_connect->prepare($sql); 
       	  $prerare->bindValue(':gameStatus',"R", PDO::PARAM_STR);
          $prerare->bindValue(':adminId',$this->adminId , PDO::PARAM_STR);
      		$prerare->execute();
      		$prerare->setFetchMode(PDO::FETCH_ASSOC);
      		$row=$prerare->fetch();

      		$this->gameData = $row;
      		
      		//require_once 'include/admin_game_setting.php';
      		$this->viewPage = "admin_game_setting";

      }catch(Exception $e){
      		echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      }//SELECT readyOK END

    }     // 생성자 END
    
    function getViewPage(){
      return $this->viewPage;
    }
    
    //현재 설정중인 게임 회차를 담은 hidden DIV 생성
    function createGameEpisode(){
      echo "<div id='gameEpisode' style='display:none;'>".$this->gameData["gameEpisode"]."</div>";
    }     //createGameEpisode END

    //게임 시간 INSERT gameTimeTableDataBV
    function insertGameTime($gameTimeData){
      //기존데이터를 모두 지운뒤에 다시 추가시킨다.
          
      $sql = "DELETE FROM gameTimeTableDataBV WHERE gameEpisode = :episode";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_STR);
         $prerare->execute();
      }catch(Exception $e){
        	echo "<br>&lt;DELETE ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //DELETE gameTimeTableDataBV END
      
      if($gameTimeData == 0){
        $inHtml = "<h5>TOTAL TIME : 0 Round / min</h5>".
        								"<p>PLAY TIME : 0 Round / min<br>REST TIME : 0 Round / min</p><br>";
        	echo $inHtml;
        	return 0;
      }
      
    //$sql = "INSERT INTO `big_games`.`gameSetDataBV` (gameStatus, setAdmin)"." VALUES (:gameStatus,:setAdminId);";
      $sql = "INSERT INTO `big_games`.`gameTimeTableDataBV` (gameEpisode, orders, types, times, gameRound)"." VALUES (:episode, :orders, :types, :times, :gameRound); ";

      $countOrder = 0;

      try{
         $prerare = $this->db_connect->prepare($sql);
          
         foreach($gameTimeData as $timeItem){
           $countOrder++;
          
           $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
           $prerare->bindValue(':orders',$countOrder, PDO::PARAM_INT);
           $prerare->bindValue(':types',$timeItem[0], PDO::PARAM_STR);
           $prerare->bindValue(':times',$timeItem[2], PDO::PARAM_INT);
           $prerare->bindValue(':gameRound',$timeItem[1], PDO::PARAM_STR);
           
           $prerare->execute();
         
         }
         
          $totalRound = $this->viewSumTime("TOTAL","ROUND");
      
          $totalTime = $this->viewSumTime("TOTAL","TIME");
          
          $playRound = $this->viewSumTime("PLAY","ROUND");
          $playTime = $this->viewSumTime("PLAY","TIME");
          
          $restRound = $this->viewSumTime("REST","ROUND");
          $restTime = $this->viewSumTime("REST","TIME");
          
          $inHtml = "<h5>TOTAL TIME : ".$totalRound." Round / ".$totalTime."min</h5>".
        								"<p>PLAY TIME : ".$playRound." Round / ".$playTime."min<br>REST TIME : ".$restRound." Round / ".$restTime."min</p><br>";
        	echo $inHtml;

      }catch(Exception $e){
        	echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //INSERT gameTimeTableDataBV END
      

      
    }     //setGameTime End
    
    
    //플레이어 INSERT userGameInfoBV
    function insertPlayerList($playerListData){
      //기존데이터를 모두 지운뒤에 다시 추가 시킨다.
         
      $sql = "DELETE FROM userGameInfoBV WHERE gameEpisode = :episode";
      
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_STR);
         $prerare->execute();
      }catch(Exception $e){
        	echo "<br>&lt;DELETE ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //DELETE userGameInfoBV END
      
      if($playerListData == 0){
          $inHTML ="플레이어 인원 : 0명&nbsp; &nbsp; &nbsp;";
           
           $inModal = "<div>참가 플레이어가 없습니다.<br>참가 플레이어를 설정해주세요.</div>";
           
           echo "{\"inHTML\":\"".$inHTML."\", \"inModal\":\"".$inModal."\"}";
        	return 0;
      }
      
      
      $sql ="INSERT INTO userGameInfoBV(gameEpisode, playerCode, userID) VALUES (:episode, :playerCode, :userId); ";

      $countPlayer = 0;

      try{
         $prerare = $this->db_connect->prepare($sql);
         
         foreach($playerListData as $playerItem){
           $countPlayer++;
           
           $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_STR);
           $prerare->bindValue(':playerCode',$countPlayer, PDO::PARAM_STR);
           $prerare->bindValue(':userId',$playerItem, PDO::PARAM_STR);

           
           $prerare->execute();
           
         }
         
         $playerNum = $this->viewPlayerNum();
           
           $inHTML ="플레이어 인원 : ".$playerNum."명&nbsp; &nbsp; &nbsp;";
           
           $inModal = $this->viewPlayerList();
           
           echo "{\"inHTML\":\"".$inHTML."\", \"inModal\":\"".$inModal."\"}";

      }catch(Exception $e){
        	echo "<br>&lt;INSERT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //INSERT userGameInfoBV END

    }   //setPlayerList END
    
    
    //게임 라운드 설정 View - 완성
    function viewGameTime($GameTimeListJSName){
      $sql = "SELECT * FROM gameTimeTableDataBV WHERE gameEpisode = :episode ORDER BY orders ASC;";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_STR);
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   $row=$prerare->fetchAll();    //결과 전체 저장
  	  	 //$row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 foreach($row as $item){
  	  	  echo "<div class='activity-row' id='timeList'><div class='col-xs-2 activity-img' id = 'roundType'>".$item["types"]."</div>".
    							"<div class='col-xs-6 activity-desc'>".
    								"<h5><a href='#'><span id = 'roundName'>".$item["gameRound"]."<span></a></h5>".
    								"<p><span id = 'roundTime'>".$item["times"]."</span> min</p>".
    							"</div>".
    							"<div class='col-xs-3 activity-desc1' style='float: right'>".
    							"<button type='button' class='btn btn-danger btn-flat btn-pri' onclick = '".$GameTimeListJSName.".removeTime(this)' ><i class='fa fa-minus' aria-hidden='true'></i>DEL</button>".
    							"</div>".
    							"<div class='clearfix'> </div> </div>";
  	  	  
  	  	 }

      }catch(Exception $e){
        	echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //SELECT gameTimeTableDataBV END
    }   //viewGameTime END
    
    
    
    //플레이어 설정 View
    function viewCheckPlayer($checkId){
      $sql = "SELECT count(*) as checkid FROM userGameInfoBV WHERE gameEpisode = :episode and userID = :checkid;";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         $prerare->bindValue(':checkid',$checkId, PDO::PARAM_STR);
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 //return $row["checkid"];
  	  	 if($row["checkid"] == 1) echo "checked='checked'";

      }catch(Exception $e){
        	echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //SELECT userGameInfoBV END
    }   //viewCheckPlayer END    
    
    
    
    //참가 플레이어 수 Return
    function viewPlayerNum(){
      $sql = "SELECT count(*) as checkplayers FROM userGameInfoBV WHERE gameEpisode = :episode";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 return $row["checkplayers"];

      }catch(Exception $e){
        	echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      } //SELECT userGameInfoBV END
    }   //viewPlayerNum END
    
    // 게임 시작 부분 데이터 주입
    function viewGameSetting(){
      $totalRound = $this->viewSumTime("TOTAL","ROUND");
      
      $totalTime = $this->viewSumTime("TOTAL","TIME");
      
      $playRound = $this->viewSumTime("PLAY","ROUND");
      $playTime = $this->viewSumTime("PLAY","TIME");
      
      $restRound = $this->viewSumTime("REST","ROUND");
      $restTime = $this->viewSumTime("REST","TIME");
      
      $playerNum = $this->viewPlayerNum();
      
      $inHtml = "<div class='col-xs-2 activity-img' id = 'roundSet'>시간<br>설정</div>".
    							"<div class='col-xs-9 activity-desc' id='viewRounds'>".
    								"<h5>TOTAL TIME : ".$totalRound." Round / ".$totalTime."min</h5>".
    								"<p>PLAY TIME : ".$playRound." Round / ".$playTime."min<br>REST TIME : ".$restRound." Round / ".$restTime."min</p><br>".
    						  "</div>".
    						  "<div class='col-xs-2 activity-img' id = 'roundSet'>인원<br>설정</div>".
    							"<div class='col-xs-9 activity-desc'>".
    								"<h5 id='viewPlayers'>플레이어 인원 : ".$playerNum."명&nbsp; &nbsp; &nbsp;</h5>".
    								"<p><span data-toggle='modal' data-target='#viewPlayerModal' data-whatever='@mdo' > < 플레이어 명단 확인 > </span></p>".
    						  "</div>";
    	echo $inHtml;
      
    }   //viewGameSetting END
    
    
    
    //플레이 총 시간 Return (플레이 타입[TOTAL,PLAY,REST], 시간타입[Round, Min])
    function viewSumTime($playType,$timeType){
      
      if($timeType == "ROUND"){
        $getData = "count(*) as viewSumTime";
      }else if($timeType == "TIME"){
        $getData = "sum(times) as viewSumTime";
      }else{
       echo "잘못된 변수 : ".$timeType;
       return 0;
      }
      
      $sql = "SELECT ".$getData." FROM `big_games`.`gameTimeTableDataBV` WHERE gameEpisode = :episode";
      
      if($playType == "TOTAL"){//
        $sql = $sql.";";
      }else if($playType == "PLAY"){
        $sql = $sql." AND TYPES = :types;";
      }else if($playType == "REST"){
        $sql = $sql." AND TYPES = :types;";
      }else{
       echo "잘못된 변수 : ".$playType;
       return 0;
      }
      
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         if($playType == "PLAY"){
          $prerare->bindValue(':types',"PLAY", PDO::PARAM_INT);
         }else if($playType == "REST"){
          $prerare->bindValue(':types',"REST", PDO::PARAM_INT);
         }
         
         
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 return $row["viewSumTime"];
  	  	 
      }catch(Exception $e){
        	echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      }
      
    }   //viewSumTime END
    
    //플레이어 명단 모달 부분 데이터 주입
    function viewPlayerList(){
      $sql = "SELECT user.userID as playerID, user.name as playerName, user.sex as playerSex FROM `big_games`.`userGameInfoBV` INNER JOIN `big_games`.`user`  ON `userGameInfoBV`.userID = `user`.userID WHERE `userGameInfoBV`.gameEpisode = :episode;";
      
      if($this->viewPlayerNum() == 0){
        echo "<div>참가 플레이어가 없습니다.<br>참가 플레이어를 설정해주세요.</div>";
        return;
      }
      
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 $countInt = 0;
  	  	 $inModal = "";
  	  	 do{
  	  	   $countInt++;
  	  	   if($row["playerSex"] == "Male") {
  	  	     $playerSexKor = "남성";
  	  	   }else if($row["playerSex"] == "Female") {
  	  	     $playerSexKor = "여성";
  	  	   }
  	  	  
  	  	   
  	  	   $data = $countInt.". ".$row["playerID"]." / ".$row["playerName"]." / ".$playerSexKor;
  	  	   $inModal = $inModal."<div>".$data."</div>";
  	  	  }while($row=$prerare->fetch());     //while END
  	  	 return $inModal;
         
      }catch(Exception $e){
        echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      }
    }   //viewPlayerList END
    
    
    
    
    
    /* 게임 시작 함수 gameStart(input : 게임 명칭)
    ** 1. 게임 시작 전 검사
    **   - 게임 상태 코드가 준비 코드인가?
    **   - 플레이어 수가 충분 한가?     > 최저인원 : 8명?
    **   - 게임 플레이 타임이 적절한가? > 최저라운드 : 5R ?
    **   - 
    ** 2. 게임 준비
    **   - 1라운드의 시간을 검색 후 gameSetDataBV 테이블에 맞는 게임 회차를 찾고 endRoundTime에 현재 타임스템프에서 1라운드의 시간을 추가해서 입력
    **   - 게임 상태 코드 'P'로 변경 + 현재 라운드 1로 변경
    **   - userGameInfoBV 테이블에서 맞는 게임 회차 플레이어들을 찾고 playCode를 'P'로 일괄 변경.
    **   - userGameInfoBV 테이블에서 맞는 게임 회차 플레이어들을 찾고 Point를 '50'으로 일괄 변경.
    ** 
    ** 
    */
    
    
    //게임 시작 함수
    function gameStart($gameCode){
      if($this->gameData["gameStatus"]!="R"){
        //echo "{\"returnCode\":\"".$inHTML."\", \"inModal\":\"".$inModal."\"}";
        echo "{\"returnCode\":\"gameStatusErr\"}";
        return 0;
      }//게임 상태 코드가 준비 코드인가?
      
      $totalRound = $this->viewSumTime("TOTAL","ROUND");
      $playerNum = $this->viewPlayerNum();
      
      if($totalRound < 8){
        echo "{\"returnCode\":\"minRoundErr\"}";
        return 0;
      }//게임 플레이 타임이 적절한가?
      
      if($playerNum < 5){
        echo "{\"returnCode\":\"minPlayerErr\"}";
        return 0;
      }//플레이어 수가 충분 한가? 
      
      $sql = "SELECT orders, types, times, gameRound FROM `big_games`.`gameTimeTableDataBV` where gameEpisode = :episode and orders = :orders";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         $prerare->bindValue(':orders',"1", PDO::PARAM_INT);
         
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 $round1 = $row;
  	  	 
  	  	 //$datetimeKor = new DateTime('now', new DateTimeZone('Asia/Seoul));
  	  	 //$timestamp = $datetimeKor->getTimestamp();
  	  	 
  	  	 //$timestamp = time();   //이거 이상함;; 9시간 전꺼 나옴
  	  	 //$roundTimestamp = $timestamp;
  	  	 //$roundTimestamp = $timestamp + (60*$round1["times"]);
         //$roundTime = date("Y-m-d H:i:s");//gmdate("Y-m-d H:i:s", $roundTimestamp);
         //$roundTime = strtotime("+".$round1["times"]." minutes");
         
         
         $timestamp = strtotime("+".$round1["times"]." minutes");   //정상적으로 나옴
         $roundTime = date("Y-m-d H:i:s", $timestamp);
  	  	 
  	  	 $sql = "UPDATE gameSetDataBV SET gameCode=:gameCode, gameStatus = :playStatus, nowRound=:firstOrder, endRoundTime=:roundTime WHERE gameEpisode = :episode";
  	  	 $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
          
         $prerare->bindValue(':gameCode',$gameCode, PDO::PARAM_STR);
         $prerare->bindValue(':playStatus',"P", PDO::PARAM_STR);
         $prerare->bindValue(':firstOrder',"1", PDO::PARAM_INT);
         $prerare->bindValue(':roundTime',$roundTime, PDO::PARAM_STR);
  	  	 $prerare->execute();
  	  	 
  	  	 $sql = "UPDATE userGameInfoBV SET point=:setPoint, playCode = :setPlayCode WHERE gameEpisode = :episode";
  	  	 $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->gameData['gameEpisode'], PDO::PARAM_INT);
         
         $prerare->bindValue(':setPoint',"50", PDO::PARAM_INT);
  	  	 $prerare->bindValue(':setPlayCode',"P", PDO::PARAM_STR);
  	  	 $prerare->execute();
  	  	 
  	  	 echo "{\"returnCode\":\"gameStartOK\"}";
      }catch(Exception $e){
        	echo "{\"returnCode\":\"".$e."\"}";
      }
        
    }     //gameStart END
    
    
    
    
  }     //Class END
  
  
  
  
  
  //게임 플레이 - 관리자
  Class gamePlayAdmin{
    function __construct($db_conn, $aId){
      
    }
    
  }     //Class END
  
  
  //게임 플레이 유저
  Class GamePlay{

    private $db_connect, $userId;
    
    private $isPlaying, $playerData, $gameRoundData;

    function __construct($db_conn, $ids){
      $this->db_connect = $db_conn;
      $this->userId = $ids;
      
      $sql = "SELECT count(playCode) as isPlaying FROM userGameInfoBV where userID = :playerId AND playCode = :playCode";
      
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':playerId',$ids , PDO::PARAM_STR);
         $prerare->bindValue(':playCode',"P", PDO::PARAM_STR);
         
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $row=$prerare->fetch();         //결과 한줄씩 저장
  	  	 
  	  	 $this->isPlaying = $row["isPlaying"];
  	  	 
  	  	 //게임 플레이 중이 아니라면 여기서 종료.
  	  	 if($this->isPlaying == 0){
  	  	    return 0;
  	  	 }
  	  	 
  	  	 $sql = "SELECT user.userID, user.name , userGameInfoBV.playerCode, userGameInfoBV.point, userGameInfoBV.rightsA, userGameInfoBV.rightsB, userGameInfoBV.rightsC, userGameInfoBV.gameEpisode FROM user JOIN userGameInfoBV ON userGameInfoBV.userID = user.userID where user.userID = :playerId AND userGameInfoBV.playCode = :playCode;";
  	  	 $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':playerId',$ids , PDO::PARAM_STR);
         $prerare->bindValue(':playCode',"P", PDO::PARAM_STR);
         
         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();    //결과 전체 저장
  	  	 $this->playerData = $prerare->fetch();  //플레이어 데이터 저장
  	  	 
  	  	 
  	  	 return 1;
  	  }catch(Exception $e){
        	echo "{\"returnCode\":\"".$e."\"}";
      }

    }   //생성자END
    
    
    //현재 라운드 정보 저장
    function getNowRoundTime(){
      $sql = "SELECT gameSetDataBV.gameEpisode, gameTimeTableDataBV.orders , gameSetDataBV.endRoundTime, gameTimeTableDataBV.types, gameTimeTableDataBV.gameRound  as gameRoundName FROM gameSetDataBV JOIN gameTimeTableDataBV ON gameSetDataBV.nowRound = gameTimeTableDataBV.orders and gameSetDataBV.gameEpisode = gameTimeTableDataBV.gameEpisode WHERE gameSetDataBV.gameEpisode=:episode;";
      try{
         $prerare = $this->db_connect->prepare($sql);
         $prerare->bindValue(':episode',$this->playerData["gameEpisode"] , PDO::PARAM_INT);

         $prerare->execute();

         $prerare->setFetchMode(PDO::FETCH_ASSOC);
  		   //$row=$prerare->fetchAll();                       //결과 전체 저장
  	  	 $this->gameRoundData = $prerare->fetch();         //결과 한줄씩 저장

  	  	 return $this->gameRoundData;
  	  	 
  	  }catch(Exception $e){
  	    $arr = array( 'Error' => $e );
  	    return $arr;
      }
    }       //GetNowRoundTime END

    //플레이어 기본 정보 GET
    function getPlayerData(){
      return $this->playerData;
    }     //getPlayerData END
    
    //게임 참가 여부 GET
    function getIsPlaying(){
      return $this->isPlaying;
    }     //getIsPlaying END
    
    //현재 라운드 정보 GET
    function getGameRoundData(){
      return $this->gameRoundData;
    }     //getGameRoundData END
    
    
    //투자하기 ( 투자 회사, 투자 포인트)
    function investcompany($investCom, $investPoint){
      //1. 현재 라운드 찾기 및 시간오버 체크 -> 투자가능 시간이 아니라면 Fail
      //2. 잔여 포인트와 투자 포인트 비교 -> 투자 > 잔여 라면 Fail
      //3. 중복투자 체크 - 1라운드에는 1번 투자 가능.
      //4. 투자하기
      
      $this->getNowRoundTime();
      $timestampNow = strtotime("Now");                               //현재 시간 타임스템프
      $timestampRE = strtotime($this->gameRoundData["endRoundTime"]); //라운드 종료 시간
      
      if($timestampNow > $timestampRE){
        return "{\"returnCode\":\"overTime\"}";
      } //라운드 시간 비교
      
      if($investPoint > $this->playerData["point"]){
        return "{\"returnCode\":\"overCost\"}";
      } //투자 Point 비교
      
      if($investPoint <= 0){
        return "{\"returnCode\":\"underCost\"}";
      } //투자 Point 비교

      //투자하는 SQL 문
      $sql = "INSERT INTO gamePlayDataBV (userID, gameEpisode, gameRound, investCom, investMoney, investTime )".
          " VALUES (:userID,:gameEpisode, :gameRound, :investCom, :investMoney, :investTime);";

      return "{\"returnCode\":\"investOK\"}";
    }   //investcompany END

  }     //Class END


  error_reporting(E_ALL);         //에러 호출
  ini_set("display_errors", 1);   //에러 호출



?>