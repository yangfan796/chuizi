var $ = {
            ajax: function (json) {
            var xhr = new XMLHttpRequest();
            //http://localhost:8055/1903/php/register.php?username=leson&userpwd=123&usertel=12121;
            var url = json["url"];
            if (json.data) { //{username: "leson111",  userpwd: "122", usertel: "1212121"// }//如果有值解析
                url += "?";
                for (var attr in json.data) {
                    url += attr + "=" + json.data[attr] + "&";
                }

                url = url.substring(0, url.length - 1);
            }

            xhr.open(json.type, url, true);
            xhr.send();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let result = xhr.responseText;
                    //这里处理 接口返回数据的  业务逻辑
                    if (json["dataType"] == "json") {
                        try {
                            result = JSON.parse(result);
                        } catch (e) {
                            if (json.error) {
                                json.error("数据转化异常");
                            }
                        }

                    }
                    json.success(result);
                } else {
                    if (json.sendBefore) {
                        json.sendBefore();
                    }
                }
            }
            }
}