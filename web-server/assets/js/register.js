let errorOpen = false

document.getElementById("registerbtn").onclick = () =>  {
    if(!errorOpen) {
        document.getElementById("error-dialog").style.opacity = 1;
        document.getElementById("error-dialog").classList.add("fadeIn");
        errorOpen = true
    }
    return
}

document.getElementById("error-close").onclick = () =>  {
    document.getElementById("error-dialog").style.opacity = 0;
    errorOpen = false
}