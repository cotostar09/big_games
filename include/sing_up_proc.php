<?php
	  require_once '../setting/function.php';
    require_once '../setting/session_manage.php';
    require_once '../setting/db_connect.php';

    print_r($_POST);
    
    
  //회원 가입 함수  
    userJoin($_POST["email"],$_POST["password"],$_POST["name"],$_POST["network"],$_POST["local"],$_POST["dateOfBirth"],$_POST["Gender"]);
    


?>