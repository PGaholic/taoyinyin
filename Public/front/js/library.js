
//addLoadEvent.js
function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof(window.onload) != "function") {
        window.onload = func;
    }
    else {
        window.onload = function() {
            oldonload();
            func();
        }
    }
}

//return top
function returnTop() {
    if (!document.getElementById) return false;
    var top = document.getElementById("rt_top");
    if (!top) return false;
    top.onclick = pageScroll;
}
function pageScroll(){
    window.scrollBy(0,-100);
    scrolldelay = setTimeout('pageScroll()',20);
    var sTop=document.documentElement.scrollTop+document.body.scrollTop;
    if(sTop==0) clearTimeout(scrolldelay);

    return false;
}
addLoadEvent(returnTop);

//单选checkbox
function chooseOne(name) {
    if (!document.getElementsByName) return false;
    var checkboxs = document.getElementsByName(name);
    if (checkboxs.length == 0) return false;
    for (var i=0; i < checkboxs.length; i++) {
        checkboxs[i].index = i;
        checkboxs[i].onclick = function() {
            for (var j=0; j < checkboxs.length; j++) {
                if (j != this.index) checkboxs[j].checked = false;
                else checkboxs[j].checked = this.checked;
            }
        }
    }
}
addLoadEvent(function() {
    chooseOne("article");
});