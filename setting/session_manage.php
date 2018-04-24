<?php

	session_start();
	
	$_SESSION["users"]["id"];   			  //아이디
	$_SESSION["users"]["auth"];				  //회원의 권한 체크 A:일반관리자 U:유저
	$_SESSION["users"]["name"];				  //회원의 이름

	$_SESSION["login_err"];				    	//로그인 실패 횟수
	$_SESSION["action"];  				    	//엑션
	$_SESSION["newID"];                 //새 아이디
	
	$_SESSION["gameData"];              //게임 데이터




?>