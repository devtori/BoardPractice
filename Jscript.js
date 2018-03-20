$(document).ready(function(){

    $('#user_id').blur(function(){

            $.ajax({ // ajax실행부분
                type: "post",
                url : "http://localhost/checkid.php",
                data : {
                    id : $('#user_id').val()
                },
                success : function s(a){ $('#id_check').html(a); },
                error : function error(){ alert('시스템 문제발생');}
            });
    });
    
});
