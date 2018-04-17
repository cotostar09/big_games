<?php
    $timestamp = time();
    $time = gmdate("Y-m-d h:i:s", $timestamp);
    
    
    $yearAsSeconds = 31556926;                         //1년 31556926초
    $monthAsSeconds = 2629800;                         //1달 2629800초
     
    $CalStartSet = $timestamp-($yearAsSeconds * 24)-$monthAsSeconds;   //현재 날자에서 24년을 뺌
    $timeCalSet = gmdate("Y, m, d", $CalStartSet);     //생년월일 캘린더 기본날자

    //회원가입
    function userJoin($email, $password, $name, $network, $local, $dateOfBirth, $Gender){
      global $db_connect;
      global $time;
      
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
      			  
  			  echo "<br/>가입되었습니다.";
  			}else{  //중복 아이디가 있는경우
  			  echo "<br/>아이디(E-mail) 중복입니다. ";
  			}
  			
		}catch(Exception $e){
				echo "<br>&lt;SELECT ERROR&gt;  관리자에게 문의하세요! : ".$e;
		}//SELECT count ID End
		
    }//function userJoin End


 class UserDataManagment{
      //global $db_connect;
      
      private $userData, $db_connect;
      
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
        echo "UserData 소멸";
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

	  error_reporting(E_ALL);         //에러 호출
    ini_set("display_errors", 1);   //에러 호출

?>