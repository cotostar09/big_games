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
      
    //생성자(DB객체, 관리자 계정)
    function __construct($db_conn, $aId){
      $this->db_connect = $db_conn;
      $this->adminId = $aId;
      
      $readyOK;
      
      //클래스 생성할때 게임 세팅 데이터(gameSetDataBV) 에 준비중인 게임이 있는가 확인해야함!!!!
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
      }   //INSERT gameSetData END (IF)
      
      
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

      }catch(Exception $e){
      		echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
      }//SELECT readyOK END

    }     // 생성자 END

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
      
      if($playerListData == null){
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
    
    
    function viewGameSetting(){
      $totalRound = $this->viewSumTime("TOTAL","ROUND");
      
      $totalTime = $this->viewSumTime("TOTAL","TIME");
      
      $playRound = $this->viewSumTime("PLAY","ROUND");
      $playTime = $this->viewSumTime("PLAY","TIME");
      
      $restRound = $this->viewSumTime("REST","ROUND");
      $restTime = $this->viewSumTime("REST","TIME");
      
      $playerNum = $this->viewPlayerNum();
      
      $inHtml = "<div class='col-xs-2 activity-img' id = 'roundSet'>시간<br>설정</div>".
    							"<div class='col-xs-9 activity-desc'>".
    								"<h5>TOTAL TIME : ".$totalRound."Round / ".$totalTime."min</h5>".
    								"<p>PLAY TIME : ".$playRound."Round / ".$playTime."min<br>REST TIME : ".$restRound."Round / ".$restTime."min</p><br>".
    						  "</div>".
    						  "<div class='col-xs-2 activity-img' id = 'roundSet'>인원<br>설정</div>".
    							"<div class='col-xs-9 activity-desc'>".
    								"<h5>플레이어 인원 : ".$playerNum."명&nbsp; &nbsp; &nbsp;</h5>".
    								"<p><span data-toggle='modal' data-target='#viewPlayerModal' data-whatever='@mdo' > < 명단 확인 > </span></p>".
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
    
    
    
    
  }     //Class END
  
  



  error_reporting(E_ALL);         //에러 호출
  ini_set("display_errors", 1);   //에러 호출
?>