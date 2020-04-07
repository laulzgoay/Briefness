(function(a) {
    a.extend({
        mouseMoveShow: function(b) {
            var d = 0,
                c = 0,
                h = 0,
                k = 0,
                e = 0,
                f = 0;
            a(window).mousemove(function(g) {
                d = a(window).width();
                c = a(window).height();
                h = g.clientX;
                k = g.clientY;
                e = g.pageX;
                f = g.pageY;
                h + a(b).width() >= d && (e = e - a(b).width() - 5);
                k + a(b).height() >= c && (f = f - a(b).height() - 5);
                a("html").on({
                    contextmenu: function(c) {
                        3 == c.which && a(b).css({
                            left: e,
                            top: f
                        }).show()
                    },
                    click: function() {
                        a(b).hide()
                    }
                })
            })
        },
        disabledContextMenu: function() {
            window.oncontextmenu = function() {
                return !1
            }
        }
    })
})(jQuery);
 
function getSelect() {
    "" == (window.getSelection ? window.getSelection() : document.selection.createRange().text) ? layer.msg("啊噢...你没还没选择文字呢！") : document.execCommand("Copy")
}
function baiduSearch() {
    var a = window.getSelection ? window.getSelection() : document.selection.createRange().text;
    "" == a ? layer.msg("啊噢...你没还没选择文字呢！") : window.open("https://www.baidu.com/s?wd=" + a)
}
$(function() {
    for (var a = navigator.userAgent, b = "Android;iPhone;SymbianOS;Windows Phone;iPad;iPod".split(";"), d = !0, c = 0; c < b.length; c++) if (0 < a.indexOf(b[c])) {
        d = !1;
        break
    }
    d && ($.mouseMoveShow(".usercm"), $.disabledContextMenu())
});