let user={
    login: function (username, userpwd) {
        var p = new Promise(function (resolve, reject) {
            $.ajax({
                type: "get",
                url: config.url + "1903/php/login.php",
                data: {
                    username: username,
                    userpwd: userpwd
                },
                dataType: "json",
                success: function (obj) {
                    resolve(obj);
                }
            })
        });
        return p;
    },
    register: function(username,userpwd,usertel){
        var p = new Promise(function (resolve, reject) {
            $.ajax({
                type: "get",
                url: config.url + "1903/php/register.php",
                data: {
                    username: username,
                    userpwd: userpwd,
                    usertel:usertel
                },
                dataType: "json",
                success: function (obj) {
                    resolve(obj);
                }
            })
        });
        return p;
    }
}