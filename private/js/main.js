$("#signup_form").submit(function(e){
    e.preventDefault();
    if($("#signup_name").val() === ""){
        alert("Отсутствует имя!");
        return;
    }
    if($("#signup_email").val() === ""){
        alert("Отсутствует email!");
        return;
    }
    if($("#signup_password").val() === ""){
        alert("Отсутствует пароль!");
        return;
    }
    if($("#signup_password_repeat").val() === ""){
        alert("Отсутствует подтверждение пароля!");
        return;
    }
    if($("#signup_password").val() !== $("#signup_password_repeat").val()){
        alert("Пароль и подтверждение пароля не совпадают!");
        return;
    }
    let postData = {
        name: $("#signup_name").val(),
        email: $("#signup_email").val(),
        password: $("#signup_password").val(),
        password_repeat: $("#signup_password_repeat").val()
    };
    $.ajax({
        url: 'private/php/signup_request.php',
        type: "post",
        dataType: 'json',
        data: postData,
        success: function (data) {
          alert(data.message);
          if(data.result === true) {
            window.location = "/";
          }
        //   if(data.result) 
        //     $("#signup_form")[0].reset();
        },
        error: function (data) {
          alert("Произошла неизвестная ошибка");
        }
      });

});