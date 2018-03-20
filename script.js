function blank_up(){
    var du = document.userinput;

    if(!du.user_id.value){
        alert("아이디를 입력하시오");
        du.id.focus();
        return false;
    }
    // 부분 추가
    if(du.use.value == '0'){
        alert("아이디 중복을 확인해주세요.");
        du.id.focus();
        return false;
    }  // 여기까지


    if(!du.user_pw.value){
        alert("패스워드를 입력하시오");
        du.pw.focus();
        return false;
    }

    if(du.user_pw.value != du.user_pwcheck.value){
        alert("패스워드를 정확하게 입력해주세요.");
        du.pwch.focus();
        return false;
    }

    if(!du.user_name.value){
        alert("이름을 입력하시오");
        du.name.focus();
        return false;
    }

    if(!du.user_studentID.value){
        alert("학번을 입력하시오");
        du.nickname.focus();
        return false;
    }

    if(!du.user_email.value){
        alert("이메일을 입력하시오");
        du.nickname.focus();
        return false;
    }

}
