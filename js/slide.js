let count = 1

const list = document.getElementsByClassName('list')
const radios = document.getElementsByClassName('radio')
const sele = document.getElementById('sele')
const imgs = document.getElementsByClassName('imgs')


let proj = document.getElementsByClassName('proj')


list[0].addEventListener('click', () => {
    designBtn()
    tamsele('design')
    clickbtn('design')
})

list[1].addEventListener('click', () => {
    escolBtn()
    tamsele('escolar')
    clickbtn('escolar')
})

list[2].addEventListener('click', () => {
    webBtn()
    tamsele('web')
    clickbtn('web')
})

function designBtn() {
    list[0].classList.add('on')
    list[1].classList.remove('on')
    list[2].classList.remove('on')
}
function webBtn() {
    list[0].classList.remove('on')
    list[1].classList.remove('on')
    list[2].classList.add('on')
}
function escolBtn() {
    list[0].classList.remove('on')
    list[1].classList.add('on')
    list[2].classList.remove('on')
}

function clickbtn(classe) {
    for (let i = 0; i < radios.length; i++) {
        if ($(radios[i]).hasClass(classe)) {
            count = i
            radios[i].checked = true
        }

    }
}

function tamsele(classe, elem1, elem2) {
    let qtimg = 0

    for (let i = 0; i <= imgs.length; i++) {
        if ($(imgs[i]).hasClass(classe)) {
            qtimg++
            if(qtimg == 1){
                elem1 = document.querySelector('.auto-btn'+(1)).getBoundingClientRect()
            }
        }
    }
    console.log(elem1)
    sele.style.width = (qtimg * 34) + 'px'
}

/* MANUAL */


for (let i = 0; i < radios.length; i++) {
    radios[i].addEventListener('click', () => {
    let elem1 = 0
    let elem2 = 0
        if ($(imgs[i]).hasClass("design")) {
            designBtn()
            tamsele('design', elem1, elem2)
        } else if ($(imgs[i]).hasClass("web")) {
            webBtn()
            tamsele('web', elem1, elem2)
        } else if ($(imgs[i]).hasClass("escolar")) {
            escolBtn()
            tamsele('escolar', elem1, elem2)
        }
        count = i
    })
}

/* Automatic */

setInterval(() => {
    radios[count].checked = true

    if ($(imgs[count]).hasClass("design")) {
        designBtn()
        tamsele('design')
    } else if ($(imgs[count]).hasClass("web")) {
        webBtn()
        tamsele('web')
    } else if ($(imgs[count]).hasClass("escolar")) {
        escolBtn()
        tamsele('escolar')
    }
    count++

    if (count >= radios.length) {
        count = 0
    }
}, 60000)

/* Abrindo img */

let img = document.createElement('img')

for (let i = 0; i < imgs.length; i++) {
    imgs[i].addEventListener('click', () => {

        img.src = $(imgs[i]).attr("src")

        img.style.height = '80vh'
        img.style.maxWidth = (i == 2) ? '80vh' : '100vw'
        img.style.objectFit = 'cover'
        img.style.position = 'fixed'
        img.style.top = '50%'
        img.style.left = '50%'
        img.style.border = '50vw solid rgba(0, 0, 0, 0.6)'
        img.style.transform = 'translate(-50%, -50%)'
        img.style.opacity = '0'
        img.style.transition = '.5s all ease'
        img.style.zIndex = '20'

        document.body.appendChild(img)
        setTimeout(() => {
            img.style.opacity = '1'
        }, 1)
    })
}


img.addEventListener('click', () => {
    img.style.opacity = '0'

    setTimeout(() => {
        img.remove()
    }, 500)
})