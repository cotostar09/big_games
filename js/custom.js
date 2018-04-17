
//Loads the correc  t sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
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
    
    var html = "<div class='col-xs-2 activity-img'>"+roundType+"</div>"+
    							"<div class='col-xs-6 activity-desc'>"+
    								"<h5><a href='#'>"+roundName+"</a></h5>"+
    								"<p>"+roundTime+" min</p>"+
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
    
    
    var initialValues = [ ['PLAY','1 ROUND','10',],['PLAY','2 ROUND','10',],['PLAY','3 ROUND','10',],['REST','휴식','10',],
                         ['PLAY','4 ROUND','10',],['PLAY','5 ROUND','10',],['PLAY','6 ROUND','10',],['REST','휴식','10',],
                         ['PLAY','7 ROUND','10',],['PLAY','8 ROUND','10',],['PLAY','9 ROUND','10',],['PLAY','10 ROUND','10',] ];
                         
    
    for( var i in initialValues ){
      var newTime = document.createElement("div");
        newTime.setAttribute("class","activity-row");
        newTime.setAttribute("id","timeList");
      
      var html = "<div class='col-xs-2 activity-img'>"+initialValues[i][0]+"</div>"+
    							"<div class='col-xs-6 activity-desc'>"+
    								"<h5><a href='#'>"+initialValues[i][1]+"</a></h5>"+
    								"<p>"+initialValues[i][2]+" min</p>"+
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

//아이탬 Clear
GameTimeList.prototype.resetTime = function(){
  this.listView.innerHTML = '';
  this.count = 0;
  
};





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
                    idCheck = 0;
                } else if (inputed.match(regExp) == null) { //E-mail 형식 확인
                  
                  $("#check_id").css("background-color", "#FFCECE");
                  
                }else if (data == 0) {// 중복아님 확정.
                  //alert('중복ㄴㄴ');
                    $("#check_id").css("background-color", "#B0F6AC");
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
    
    
    