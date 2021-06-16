/* Da uma tela de loading quando carrega o site */

let html = document.getElementById('html')

$(document).ready(() => {
    $('#loading').delay(2000).fadeOut('slow')
    setTimeout(() => {
        html.style.overflowY = 'scroll'
    }, 2000)
    
})