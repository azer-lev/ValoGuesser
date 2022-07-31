document.getElementById("playfreebtn").onclick = function() {
    if(getCookie("loggedIn") == 'true') {
        window.location = "play.php"
    }else {
        document.getElementById("login-container").style.display = 'block'
        loginWindowOpen = true
    }
}

function getCookie(user) {
    var cookieArr = document.cookie.split(";");
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if(user == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}