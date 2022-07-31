let loginWindowOpen = false
let debug = true

let landingPageUrl = 'http://localhost/ValoGuesser/index.php'
let loginPageUrl = 'http://localhost/ValoGuesser/login.php'
let registerPageUrl = 'http://localhost/ValoGuesser/register.php'

if(document.getElementById("loginbtn")) {
  document.getElementById("loginbtn").onclick = () => {
    document.getElementById("login-container").style.display = 'block'
    loginWindowOpen = true
  }
}

if(document.getElementById("logoutbtn")) {
  document.getElementById("logoutbtn").onclick = () => {
    window.location = "logout.php"
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

