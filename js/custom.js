
//Loads the correc  t sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
  
  //게임 설정 > 플레이어 설정 > 검색 기능
  $("#keyword").keyup(function(){
    var keyData = $(this).val();
    $("#style-3 > div").hide();
    var temp = $("#style-3 > div > div:contains('"+keyData+"')");
    $(temp).parent().show();
  });
  
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
    
    //게임 라운드 설정 > 드래그 엔 드롭
    $('#style-1').sortable({
        cursor : 'move',    //커서 형태
        opacity : 0.5,      //투명도
        update: function(e, ui) {
          $('#result').text($('#round_list').sortable('toArray'));
        } //드래그시 동작
      
    });
    //$( "#speed" ).selectmenu();
    
});


//게임 라운드 설정 Class (리스트가 들어갈 DIV ID, 저장된 
var GameTimeList = function(OName,listID,objCount,timeList) {
    //생성자
    this.objName = OName;
    this.listView = document.getElementById(listID); //
    this.listName = listID;                          //
    this.count = objCount;                          //length
    if(timeList != null){
      this.list_data = timeList;                    //이전 데이터가 있으면 넣고
    }else{
      this.list_data = new Array();                 //없으면 안넣고
    }
    
    
    //DB에 저장된 데이터가 있으면 아이탬 추가해주는 코드 추가 해야함.
};

//아이탬 추가
GameTimeList.prototype.appendTime = function(roundType, roundName, roundTime ){
    this.count++;
    
    var newTime = document.createElement("div");
    newTime.setAttribute("class","activity-row");
    newTime.setAttribute("id","timeList");
    
    var html = "<div class='col-xs-2 activity-img' id = 'roundType'>"+roundType+"</div>"+
    							"<div class='col-xs-6 activity-desc'>"+
    								"<h5><a href='#'><span id = 'roundName'>"+roundName+"</span></a></h5>"+
    								"<p><span id = 'roundTime'>"+roundTime+"</span> min</p>"+
    							"</div>"+
    							"<div class='col-xs-3 activity-desc1' style='float: right'>"+
    							"<button type='button' class='btn btn-danger btn-flat btn-pri' onclick = '"+this.objName+".removeTime(this)' ><i class='fa fa-minus' aria-hidden='true'></i>DEL</button>"+
    							"</div>"+
    							"<div class='clearfix'> </div>";
    newTime.innerHTML = html;
    this.listView.appendChild(newTime);
    

};

//아이탬 삭제
GameTimeList.prototype.removeTime = function(idx){

  var removeNode = idx.parentNode.parentNode;
  this.listView.removeChild(removeNode);
  this.count--;
};

//아이탬 초기화
GameTimeList.prototype.initialsetTime = function(){
  this.listView.innerHTML = '';
  //this.count = 0;
  
    this.count = 10;
    
    //TEST -  1라운드를 2분으로 조정
    var initialValues = [ ['PLAY','1 ROUND','2',],['PLAY','2 ROUND','10',],['PLAY','3 ROUND','10',],['REST','휴식','10',],
                         ['PLAY','4 ROUND','10',],['PLAY','5 ROUND','10',],['PLAY','6 ROUND','10',],['REST','휴식','10',],
                         ['PLAY','7 ROUND','10',],['PLAY','8 ROUND','10',],['PLAY','9 ROUND','10',],['PLAY','10 ROUND','10',] ];
                         
    
    for( var i in initialValues ){
      var newTime = document.createElement("div");
        newTime.setAttribute("class","activity-row");
        newTime.setAttribute("id","timeList");
      
      var html = "<div class='col-xs-2 activity-img' id = 'roundType'>"+initialValues[i][0]+"</div>"+
    							"<div class='col-xs-6 activity-desc'>"+
    								"<h5><a href='#'><span id = 'roundName'>"+initialValues[i][1]+"<span></a></h5>"+
    								"<p><span id = 'roundTime'>"+initialValues[i][2]+"</span> min</p>"+
    							"</div>"+
    							"<div class='col-xs-3 activity-desc1' style='float: right'>"+
    							"<button type='button' class='btn btn-danger btn-flat btn-pri' onclick = '"+this.objName+".removeTime(this)' ><i class='fa fa-minus' aria-hidden='true'></i>DEL</button>"+
    							"</div>"+
    							"<div class='clearfix'> </div>";
      newTime.innerHTML = html;
      this.listView.appendChild(newTime);
    }
    
    
  /*
  1R 10분2R 10분3R 10분쉬는 시간 10분 
  4R 10분5R 10분6R 10분쉬는 시간 10분
  7R 10분8R 10분9R 10분10R 10분
  */
  
};

//게임 시간 테이블 아이탬 Clear
GameTimeList.prototype.resetTime = function(){
  this.listView.innerHTML = '';
  this.count = 0;
  
};

//게임 설정 및 시작 클레스
var GameSetStart = function() {
  this.checkOnPlayerNum = 0;
  this.timeTable = new Array();         //게임 시간 테이블
  this.gamePlayerTable = new Array();   //게임 플레이어 명단

};

//게임 시간 테이블 저장
GameSetStart.prototype.setRoundSetting = function(){
  this.timeTable = new Array();         //게임 시간 테이블
  var timeLength = $('#style-1').children().length; //Round 횟수
  
  
  for (var i = 0 ; i < timeLength ; i++) {
    var roundType = $('#style-1').children().eq(i).find("#roundType").text()
    var roundName = $('#style-1').children().eq(i).find("#roundName").text()
    var roundTime = $('#style-1').children().eq(i).find("#roundTime").text()
  	this.timeTable[i] = [roundType,roundName,roundTime];
  }
//  return this.timeTable;
    $.ajax({
            type : 'POST',
            data : {
                "signal" : "TIME",
                "itemNum" : timeLength,
                "timeTable" : this.timeTable
            },
            url : "./setting/ajax_set_play_data.php",
            success : function(data) {              
              $('#viewRounds').html(data);
              alert("게임 라운드 설정 성공");
              
              },error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
  
}     //GameSetStart.setRoundSetting END



//게임 플레이어 인원수 
GameSetStart.prototype.checkPlayerSelNum = function() {
    $(".gamePlayerCB").change(function(){
      //alert("check on box : " + $(".gamePlayerCB:checked").length );
      this.checkOnPlayerNum = $(".gamePlayerCB:checked").length;
      $(".playerNum").text(this.checkOnPlayerNum);
    });
}


//게임 플레이어 명단 저장
GameSetStart.prototype.setStartPlayer = function(){
  this.gamePlayerTable = new Array();
  var checkPlayerLength = $(".gamePlayerCB").length     //$('#style-3').contents().find("#mailAdd").length;//참가 플레이어 수.
  
  for (var i = 0 ; i < checkPlayerLength ; i++) {
    if($(".gamePlayerCB").eq(i).is(":checked")){
      this.gamePlayerTable[i] = $(".gamePlayerCB").eq(i).parent().parent().children().find("#mailAdd").text();
    }
  }
  //return this.gamePlayerTable;
  
      $.ajax({
            type : 'POST',
            dataType: 'json',
            data : {
                "signal" : "PLAYER",
                "playerNum" : this.gamePlayerTable.length,
                "playerlist" : this.gamePlayerTable
            },
            url : "./setting/ajax_set_play_data.php",
            success : function(data) {
              console.log(data["inHTML"]);
              $('#viewPlayers').html(data["inHTML"]);
              $('#viewPlayerLists').html(data["inModal"]);
              alert("게임 참가자 설정 성공");
              
              
              
              },error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
}     //GameSetStart.setStartPlayer END


//게임 시작 함수
GameSetStart.prototype.startGame = function() {

  var gameCode = $("#gameCodeEdit").val();
  
  if(gameCode =="게임 명칭 입력"){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
    dd='0'+dd
    } 
    
    if(mm<10) {
        mm='0'+mm
    } 
    
    today = yyyy+'/'+mm+'/'+dd;
    gameCode = $('#gameEpisode').text()+" 번째 게임- "+today;
  }
  
  $.ajax({
            type : 'POST',
            dataType: 'json',
            
            data : {
              
                "signal" : "GAMESTART",
                "gameCode" : gameCode,
            },
            url : "./setting/ajax_set_play_data.php",
            success : function(data) {
              console.log(data);
              
              
              
              if(data['returnCode'] == "minPlayerErr"){
                alert("플레이어 인원이 적습니다.\n 5인 이상 선택 해주세요.");
              }else if(data['returnCode'] == "minRoundErr"){
                alert("라운드가 적습니다. 8라운드 이상 설정해주세요 ");
              }else{
                alert("게임시작");
                location.reload();
              }
              
              
              
              
              },error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
  
  
}     //GameSetStart.startGame END



var GetNowRoundData = function(){
  this.getRoundData;
}
var nowRoundData;
GetNowRoundData.prototype.setRoundData = function(){
  $.ajax({
       type : 'POST',
       dataType: 'json',
       async:false,
       data : {
           "signal" : "GETENDTIME",
      //     "gameEpisode" : gameEpisode,
       },
       url : "./setting/ajax_player_action.php",
       success : function(data) {
         
         nowRoundData = data;
         
         
         
         },error:function(request,status,error){
           alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
  });
}

function investTimeOver(){
  alert("투자 가능 시간이 아닙니다.\n다음 라운드에 시도하세요.");
}


function investComA(){
    var invPonit = $(".invPonitA").val();
    
    if(invPonit <= 0){
      console.log(invPonit);
      alert("0보다 큰 수를 입력해 주세요!");
      return 0;
    }
    
    $.ajax({
       type : 'POST',
       dataType: 'json',
       data : {
           "signal" : "investComA",
           "invPonit" : invPonit,
       },
       url : "./setting/ajax_player_action.php",
       success : function(data) {
         $(".invPonitA").val(0);
         console.log(data);
         if(data['returnCode'] == 'investOK'){
           alert("투자에 성공하셨습니다.");
         }else if(data['returnCode'] == 'overCost'){
           alert("50Point 이하로 투자해 주세요.");
         }else if(data['returnCode'] == 'overTime'){
           alert("투자 가능 시간이 아닙니다.\n다음 라운드에 시도하세요.");
         }else if(data['returnCode'] == 'underCost'){
           alert("0Point 이하로는 투자 할 수 없습니다.");
         }
         
         },error:function(request,status,error){
           alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
  });
}




var clock_inter, stopwatch_inter, stopwatch_state;

/*------------------------------*/
/*TIMERS*/
/*------------------------------*/



//timer
var start_time = 0;
var elapsed_time = 0;
var requested_time = 0;
var timer_inter;
var roundData;
var endround_time = 0;

var timer = {
  start: function() {
    start_time = new Date();
    $(".comA").on("click", investComA);
    $(".comA").off("click", investTimeOver);
    
    var roundData = new GetNowRoundData();
    roundData.setRoundData();
    console.log(nowRoundData);
    endround_time = new Date(nowRoundData['endRoundTime']);
    
    
    //requested_time = toMs(document.getElementById('timer_h').value, document.getElementById('timer_m').value, document.getElementById('timer_s').value, m * 60 * 1000);
    requested_time = Gettimers = endround_time.getTime() - start_time.getTime();
    
    timer_inter = setInterval(function() {
      elapsed_time = new Date() - start_time;
      document.getElementById('clock').innerHTML = toTimeFormat(requested_time - elapsed_time + 1000, 'hh:mm:ss');
      //+ 1000ms because the seconds are rounded down, so without it when the timer SHOWS 00:00:00, it will have to wait 1s before stopping
      if (elapsed_time >= requested_time) {
        timer.stop();
        timer.end();
        document.getElementById('clock').innerHTML = "라운드가 종료되었습니다.";
      }
    }, 0);
  },
  stop: function() {
    clearInterval(timer_inter);
    stopSound(timer_sound);
  },
  end: function() {
    $(".comA").off("click", investComA);
    $(".comA").on("click", investTimeOver);
    //document.getElementById('clock').innerHTML = '<img src="fin.png" class="alarm-icon" />';
    playSound(timer_sound);
  }
};

/*------------------------------*/
/*UTILITY*/
/*------------------------------*/

function toTimeFormat(t, format) {

  function addDigit(n) {
    return (n < 10 ? '0':'') + n;
  }

  var ms = t % 1000;
  t = (t - ms) / 1000;
  var secs = t % 60;
  t = (t - secs) / 60;
  var mins = t % 60;
  var hrs = (t - mins) / 60;
  ms = (ms < 10) ? '00' : (ms < 100) ? '0' + Math.floor(ms / 10) : Math.floor(ms / 10);

  if (format === 'hh:mm:ss') {
    return addDigit(hrs) + ':' + addDigit(mins) + ':' + addDigit(secs);
  } else if (format === 'mm:ss:msms') {
    return addDigit(mins) + ':' + addDigit(secs) + ':' + ms;
  }
}

function toMs(h, m, s, ms) {
  return (ms + s * 1000 + m * 1000 * 60 + h * 1000 * 60 * 60);
}

function getSum(arr) {
  var a = 0;
  for (var i = 0; i < arr.length; i++) {
    a += arr[i];
  }
  return a;
}

/*------------------------------*/
/*AUDIO*/
/*------------------------------*/
var timer_sound = new Audio('round_end.mp3');

function playSound(sound) {
  sound.play();
}

function stopSound(sound) {
  sound.pause();
  sound.currentTime = 0;
}






    //JS function 
    //아이디와 비밀번호가 맞지 않을 경우 가입버튼 비활성화를 위한 변수설정 참고: http://j3rmy.tistory.com/4
    var idCheck = 0;     // ID 체크
    var pwdCheck = 0;    // PW 체크
    //아이디 체크하여 가입버튼 비활성화, 중복확인.
    function checkId() {
        var inputed = $('.email').val();
        $.ajax({
            type : 'post',
            data : {
                id : inputed
            },
            url : "./setting/ajax_check_id.php",
            success : function(data) {
              console.log("check_id : " + data); 
              
               var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
              //E-mail 정규식 표현
                
                if(inputed=="") {//id 입력전
                    //$(".signupbtn").prop("disabled", true);
                    //$(".signupbtn").css("background-color", "#aaaaaa");
                    $("#check_id").css("background-color", "#FFFFFF");
                    $("#checkIdResult").html('&nbsp;');
                    idCheck = 0;
                } else if (inputed.match(regExp) == null) { //E-mail 형식 확인 ERR
                  
                  $("#check_id").css("background-color", "#FFCECE");
                  $("#checkIdResult").text('E-mail 형식이 아닙니다.');
                  $("#checkIdResult").css("color", "##DF0101");
                  
                }else if (data == 0) {// 중복아님 확정.
                  //alert('중복ㄴㄴ');
                    $("#check_id").css("background-color", "#B0F6AC");
                    $("#checkIdResult").text('사용 가능한 E-mail 입니다.');
                    $("#checkIdResult").css("color", "##04B404");
                    idCheck = 1;
                    if(idCheck==1 && pwdCheck == 1) {
                        //$(".signupbtn").prop("disabled", false);
                        //$(".signupbtn").css("background-color", "#4CAF50");
                        //signupCheck();
                        
                    } 
                } else if (data == 1) {// 중복
                    //$(".signupbtn").prop("disabled", true);
                    //$(".signupbtn").css("background-color", "#aaaaaa");
                    $("#check_id").css("background-color", "#FFCECE");
                    idCheck = 0;
                    $("#checkIdResult").text('이미 등록된 E-mail 입니다.');
                    $("#checkIdResult").css("color", "##DF0101");
                } 
            },error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    }
    
    
    //재입력 비밀번호 체크하여 가입버튼 비활성화 또는 맞지않음을 알림.
    function checkPwd() {
        var inputed = $('#pwd').val();
        var reinputed = $('#repwd').val();
        console.log("pwd : " + inputed + " / repwd : " + reinputed ); 
        if(reinputed==""){  // && (inputed != reinputed || inputed == reinputed)
            //$(".signupbtn").prop("disabled", true);
            //$(".signupbtn").css("background-color", "#aaaaaa");
            $(".password").css("background-color", "#FFFFFF");
          pwdCheck = 0;
        }
        else if (inputed == reinputed) {
            $(".password").css("background-color", "#B0F6AC");
            pwdCheck = 1;
            if(idCheck==1 && pwdCheck == 1) {
                //$(".signupbtn").prop("disabled", false);
                //$(".signupbtn").css("background-color", "#4CAF50");
                //signupCheck();
            }
        } else if (inputed != reinputed) {
            pwdCheck = 0;
            //$(".signupbtn").prop("disabled", true);
            //$(".signupbtn").css("background-color", "#aaaaaa");
            $(".password").css("background-color", "#FFCECE");
            
        }
    }
    
    
    