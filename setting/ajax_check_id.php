<?php
    include_once 'db_connect.php';
    //$Post['id']
    $sql = " SELECT count(userID) as checkID FROM big_games.user where userID =:checkID;";
      
      try{
  			$prerare = $db_connect->prepare($sql);
  			$prerare->bindValue(':checkID',$_POST["id"], PDO::PARAM_STR);
  			$prerare->execute();
  			
  			$prerare->setFetchMode(PDO::FETCH_ASSOC);
  			//$row=$prerare->fetchAll();
  			$row=$prerare->fetch();
  			
  			
  			echo $row['checkID'];
  			//echo json_encode($_POST);
  			//echo print_r($_POST);
  			//echo $_POST["id"];
		}catch(Exception $e){
				echo "-1";
		}
?>
