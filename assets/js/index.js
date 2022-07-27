let loginWindowOpen = false

document.getElementById("loginbtn").onclick = function() {
    document.getElementById("login-container").style.display = 'block'
    loginWindowOpen = true
}

document.getElementById("playfreebtn").onclick = function() {
    document.getElementById("login-container").style.display = 'block'
    loginWindowOpen = true
}

document.getElementById("close-login").onclick = function() {
    document.getElementById("login-container").style.display = 'none'
    loginWindowOpen = false
}

document.getElementById("loginclick").onclick = () => {
    window.location = "login.html"
}