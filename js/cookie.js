
    function setCookie(key, value, days, path = "/") {
        var date = new Date();
        date.setDate(date.getDate() + days);
        date.setHours(0);
        date.setMinutes(0);
        date.setSeconds(0);
        document.cookie = encodeURIComponent(key) + "=" + encodeURIComponent(value) + ";expires=" + date + ";path=" +
            path;
    }

    function getCookie(key) {
        var str = document.cookie;
        if (str) {
            var cookieList = str.split("; ");
            for (var i = 0; i < cookieList.length; i++) {
                var cookie = cookieList[i]; //"key=value"
                var cookieItem = cookie.split("="); //["key","value"]
                var cookieKey = decodeURIComponent(cookieItem[0]);
                var cookieValue = decodeURIComponent(cookieItem[1]);
                if (key == cookieKey) {
                    return cookieValue;
                }
            }
            return "";
        } else {
            return "";
        }
    }