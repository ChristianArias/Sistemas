var table= document.getElementById("datos");
var html = table.outerHTML;
window.open('data:application/vnd.ms-excel,' + escape(html));
