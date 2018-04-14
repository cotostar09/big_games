<?php
    $timestamp = time();
    $time = gmdate("Y-m-d h:i:s", $timestamp);

    //회원가입
    function userJoin($email, $password, $name, $network, $local, $dateOfBirth, $Gender){
      global $db_connect;
      global $time;
      
      $sql = "INSERT INTO `big_games`.`user` (userID, userPW, name, sex, dateOfBirth, residence, belong,joinDate,point,authCode,comment)".
      " VALUES (:userID,:userPW, :name, :sex, :dateOfBirth, :residence , :belong, :joinDate, :point, :authCode, :comment );";

      echo "<br/>sql:".$sql."<br/>";
      echo "<br/>time:".$time."<br/>";
      
      try{
  			$prerare = $db_connect->prepare($sql);
  			$prerare->bindValue(':userID',$email, PDO::PARAM_STR);
  			$prerare->bindValue(':userPW',$password, PDO::PARAM_STR);
  			$prerare->bindValue(':name',$name, PDO::PARAM_STR);
  			$prerare->bindValue(':sex',$Gender, PDO::PARAM_STR);
  			$prerare->bindValue(':dateOfBirth',$dateOfBirth, PDO::PARAM_STR);
  			$prerare->bindValue(':residence',$admin_id, PDO::PARAM_STR);
  			$prerare->bindValue(':belong',$local, PDO::PARAM_STR);
  			$prerare->bindValue(':joinDate',$time, PDO::PARAM_STR);
  			$prerare->bindValue(':point',0, PDO::PARAM_INT);
  			$prerare->bindValue(':authCode','U', PDO::PARAM_STR);
  			$prerare->bindValue(':comment','', PDO::PARAM_STR);
  			
  			$prerare->execute();

		}catch(Exception $e){
				echo "<br>&lt;ERROR&gt;  관리자에게 문의하세요! : ".$e;
		}
      
    }


?>