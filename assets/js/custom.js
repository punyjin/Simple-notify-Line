//เผื่อมีการทำระบบ Register Account 

function clickLogout() { //ฟังชั่น ออกจากระบบ
    $.ajax({
        type: "POST",
        url: "system/action.php",
        data: "action=logout",
        success: function(result_) {
            var result = JSON.parse(result_);
            switch(result.status){
                case "success":
                    getSuccess(result.desc, result.title);
                    break;
                case "error":
                    getError(result.desc, result.title);
                    break;
                default:
                    getError();
            }
            if(result.reload == "true"){
                setTimeout(function(){ location.reload(); }, 1500);
            }
        }
    });
}

function clickLogin() { //ฟังชั่น เข้าสู่ระบบ
    $.ajax({
        type: "POST",
        url: "system/action.php",
        data: $("#login-form").serialize() + "&action=login",
        success: function(result_) {
            var result = JSON.parse(result_);
            switch(result.status){
                case "success":
                    getSuccess(result.desc, result.title);
                    break;
                case "error":
                    getError(result.desc, result.title);
                    break;
                default:
                    getError();
            }
            if(result.reload == "true"){
                setTimeout(function(){ location.reload(); }, 1500);
            }
        }
    });
}

function clickRegister() { //ฟังชั่นสมัครใช้งาน *ใช้กับ button *
    $.ajax({
        type: "POST",
        url: "system/action.php",
        data: $("#register-form").serialize() + "&action=register",
        success: function(result_) {
            var result = JSON.parse(result_);
            switch(result.status){
                case "success":
                    getSuccess(result.desc, result.title);
                    break;
                case "error":
                    getError(result.desc, result.title);
                    break;
                default:
                    getError();
            }
            if(result.reload == "true"){
                setTimeout(function(){ location.replace('index.php?page=home'); }, 1500);
            }
        }
    });
}
