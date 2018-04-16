
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
});



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
    
    
    //생년월일 set 시작 날자 변경. 
    var checkCalClick = 0;    //최초 1회 체크용 변수
    function checkDate(yaer, month, day){
      if(checkCalClick == 0){
        $('#dateOfBirth').data('DateTimePicker').date(new Date(yaer,month,day,0,0,0))
        checkCalClick++;
      }
    }
    
    