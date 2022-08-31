let loginWindowOpen = false
let debug = true

let landingPageUrl = 'http://localhost/ValoGuesser/web-server/index.php'
let loginPageUrl = 'http://localhost/ValoGuesser/web-server/login.php'
let registerPageUrl = 'http://localhost/ValoGuesser/web-server/register.php'

if(document.getElementById("loginbtn")) {
  document.getElementById("loginbtn").onclick = () => {
    document.getElementById("login-container").style.display = 'block'
    loginWindowOpen = true
  }
}

if(document.getElementById("logoutbtn")) {
  document.getElementById("logoutbtn").onclick = () => {
    window.location = "web-server/logout.php"
  }
}


document.getElementById("close-login").onclick = function() {
  document.getElementById("login-container").style.display = 'none'
  loginWindowOpen = false
}

document.getElementById("loginclick").onclick = () => {
  window.location = loginPageUrl
}

document.getElementById("logoholder").onclick = () => {
  window.location = landingPageUrl
}

document.getElementById("registerclick").onclick = () => {
  window.location = registerPageUrl
}

document.getElementById("dropdown").onmouseenter = () => {
  document.getElementById("login-container").style.display = 'block'
}
document.getElementById("dropdown").onmouseleave = () => {
  document.getElementById("login-container").style.display = 'none'
}