function Page(str, json) {
    this.ele = document.querySelector(str);
    this.pageIndex = 1; //默认显示第一页
    //用json把option替换掉
    this.option = {
        count: 100, //表示数据总数
        shownum: 10, //表示每页显示10条
        showpage: 7, //表示页码连续出现5个
        prev: "上一页",
        next: "下一页"
    }
    Object.assign(this.option, json);
    //对象的修改和补充

    this.create(); //结构
    this.bindData(); //绑定数据
}
Page.prototype.bindEvent = function () {
    var that = this;
    this.prevBtn.style.backgroundColor = "#aaa";
    this.prevBtn.onclick = function () {
        // this.pageIndex--;
        that.pageIndex--;
        that.bindData();
    }
    this.nextBtn.style.backgroundColor = "#aaa";
    this.nextBtn.onclick = function () {
        // this.pageIndex--;
        that.pageIndex++;
        that.bindData();
    }

    if (this.pageIndex == 1) {
        this.prevBtn.onclick = null;
        this.prevBtn.style.backgroundColor = "#eee";
    }
    if (this.pageIndex == this.allPage) {
        this.nextBtn.onclick = null;
        this.nextBtn.style.backgroundColor = "#eee";
    }
}
Page.prototype.bindData = function () {
    var that = this;
    //根据option 去生成 content中的li
    var allPage = Math.ceil(this.option["count"] / this.option["shownum"]); //得到所有的页码总数
    this.allPage = allPage;
    var middle = Math.floor(this.option["showpage"] / 2); // 2

    var start = 1;
    //12>5 
    //3>5
    var end = allPage > this.option["showpage"] ? this.option["showpage"] : allPage;
    //控制开头

    //大于2 应该  pageIndex -2    pageIndex+2 控制中间
    if (this.pageIndex > middle) {
        start = this.pageIndex - middle;
        end = this.pageIndex + middle;
    }
    //控制最后一节
    if (this.pageIndex >= (allPage - middle)) {
        //10 - 6 
        start = allPage - this.option["showpage"] + 1; //10-7
        end = allPage;
    }

    start = start < 1 ? 1 : start;

    this.content.innerHTML = ""; //内容清空
    for (var i = start; i <= end; i++) {
        var li = document.createElement("li");
        li.innerHTML = i;
        if (i == this.pageIndex) {
            li.style.backgroundColor = "#fa3b88";
        }
        this.content.appendChild(li);

        li.onclick = function () {
            // alert(this.innerHTML);
            // this.pageIndex = this.innerHTML;
            that.pageIndex = this.innerHTML * 1;
            that.bindData();
        }
    }
    this.bindEvent();

    if (this.option["callBack"]) {
        //回调
        this.option["callBack"](this.pageIndex);
    }


}
Page.prototype.create = function () {
    this.ele.className = "page";
    this.ele.innerHTML = "";

    this.prevBtn = document.createElement("span");
    this.prevBtn.className = "pagePrev";
    this.prevBtn.innerHTML = this.option["prev"];
    this.ele.appendChild(this.prevBtn);

    this.content = document.createElement("ul");
    this.content.className = "pageContent";
    this.ele.appendChild(this.content);

    this.nextBtn = document.createElement("span");
    this.nextBtn.className = "pageNext";
    this.nextBtn.innerHTML = this.option["next"];

    this.ele.appendChild(this.nextBtn);
}