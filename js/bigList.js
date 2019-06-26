var upperCodeList = [];
    var lowCodeList = [];
    var numberList = [];
    var otherList = ["$", "_"];


    for (var code = 65; code <= (65 + 25); code++) {
        var char = String.fromCharCode(code);
        upperCodeList.push(char);
    }
    for (var i = 97; i <= (97 + 25); i++) {
        var char = String.fromCharCode(i);
        lowCodeList.push(char);
    }
    for (var i = 0; i <= 9; i++) {
        numberList.push(String(i));
    }
    var bigList = upperCodeList.concat(lowCodeList, numberList, otherList);