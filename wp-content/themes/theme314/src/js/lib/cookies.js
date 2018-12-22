jQuery.noConflict();
(function( $ ) {
  $(function() {
 
    var sName = "314";
    $("#cookies #exit").click(function(){
        var oExpire = new Date();
        oExpire.setTime((new Date()).getTime() + 3600000*24*365);
        document.cookie = sName + "=1;expires=" + oExpire;
    //    document.cookie = sName + "; expires=Thu, 18 Dec 2017 12:00:00 UTC; path=/";
        $("#cookies").fadeOut();
    });
 
    var sStr = '; '+ document.cookie +';';
    var nIndex = sStr.indexOf('; '+ escape(sName) +'=');
    if (nIndex === -1) {
        $("#cookies").show();
    }
  });
})(jQuery);

/*
$(document).ready(function(){

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("username");
        if (user != "") {
            $('#cookies').hide();
        } else {
            user = 'Habitat WS';
            $('#cookies').show();
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }
    
    function closeCookie(){
        $('#cookies a').click(function(e){
            //e.preventDefault();
            $('#cookies').hide();
        });
    }

});

*/