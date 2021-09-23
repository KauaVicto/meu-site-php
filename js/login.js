const labellogin = document.getElementsByClassName("labellogin")
const inputs = document.getElementsByClassName("inputs")

for(let i = 0;i < inputs.length;i++){
    inputs[i].addEventListener('focus', () => {
        if(inputs[i].value == ''){
            labellogin[i].style.bottom = '30px'
            labellogin[i].style.left = '1px'
            labellogin[i].style.fontSize = '1rem'
            labellogin[i].style.opacity = '1'
        }
    })

    inputs[i].addEventListener('blur', () => {
        if(inputs[i].value == ''){
            labellogin[i].style.bottom = '4px'
            labellogin[i].style.left = '3px'
            labellogin[i].style.fontSize = '1.1rem'
            labellogin[i].style.opacity = '.56'
        }
    })
}

function carregar(){
    for(let i = 0;i < inputs.length;i++){
        if(inputs[i].value == ''){
            labellogin[i].style.bottom = '4px'
            labellogin[i].style.left = '3px'
            labellogin[i].style.fontSize = '1.1rem'
            labellogin[i].style.opacity = '.56'
        }
        if(inputs[i].value != ''){
            labellogin[i].style.bottom = '40px'
            labellogin[i].style.left = '1px'
            labellogin[i].style.fontSize = '1rem'
            labellogin[i].style.opacity = '1'
        }
    }
}



