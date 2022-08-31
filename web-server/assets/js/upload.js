let ranks = ['iron', 'bronze', 'silver', 'gold', 'platin', 'diamond', 'ascendant', 'immortal', 'radiant']
let divisions = ['1', '2', '3', 'radiant']
let currentBoxShadowElement = undefined

let boxShadowValues = '0px 0px 20px 10px rgba(255,255,255,.6)';

document.getElementById("uploadform").onsubmit = () => {
    if(!ranks.includes(document.getElementById("hidden-rank").value) || !divisions.includes(document.getElementById("hidden-division").value) || document.getElementById("yt-url").value.length < 4) {
        //Show error
        console.log('blocked')
        return false;
    }
}

//Excluding radiant
for(let i = 0; i < ranks.length - 1; i++) {
    document.getElementById('rank-' + ranks[i] + '-img').onclick = () => {
        document.getElementById("hidden-rank").value = ranks[i]
        //Show division selector
        document.getElementById("division-wrapper").style.display = 'block'
        for(let x = 1; x <= 3; x++) {
            document.getElementById("division-" + x).style.backgroundImage = "url('assets/img/rank-badges/" + document.getElementById("hidden-rank").value + "-" + x + ".png')"
            document.getElementById("division-" + x).onclick = () => {
                document.getElementById("hidden-division").value = x
                document.getElementById("division-wrapper").style.display = 'none'
                removeBoxShadows(currentBoxShadowElement)
                document.getElementById('rank-' + ranks[i] + '-img').style.boxShadow = boxShadowValues
                currentBoxShadowElement = document.getElementById('rank-' + ranks[i] + '-img')

                //Change shown badge
                document.getElementById("rank-" + document.getElementById("hidden-rank").value + "-img").style.backgroundImage = "url('assets/img/rank-badges/" + document.getElementById("hidden-rank").value + "-" + x + ".png')"
            }
        }
    }
}

document.getElementById("rank-radiant-img").onclick = () => {
    document.getElementById("hidden-rank").value = 'radiant'
    document.getElementById("hidden-division").value = 'radiant'
    removeBoxShadows(currentBoxShadowElement)
    document.getElementById("rank-radiant-img").style.boxShadow = boxShadowValues
    currentBoxShadowElement = document.getElementById("rank-radiant-img")
}

function removeBoxShadows(element) {
    if(element !== undefined) {
        element.style.boxShadow = '0px 0px 0px 0px rgba(255,255,255,0)';
    }
}