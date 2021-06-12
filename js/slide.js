let count = 1

let list = document.getElementsByClassName('list')
let radios = document.getElementsByClassName('radio')
let sele = document.getElementById('sele')
let imgs = document.getElementsByClassName('imgs')

let proj = document.getElementsByClassName('proj')


list[0].addEventListener('click', () => {
    designBtn()

    clickbtn('design')
})

list[1].addEventListener('click', () => {
    escolBtn()

    clickbtn('escolar')
})

list[2].addEventListener('click', () => {
    webBtn()

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

function tamsele(classe) {
    let qtimg = 0

    for (let i = 0; i <= imgs.length; i++) {
        if ($(imgs[i]).hasClass(classe)) {
            qtimg++
        }
    }
    sele.style.width = (qtimg * 34) + 'px'
}


for (let i = 0; i < radios.length; i++) {
    radios[i].addEventListener('click', () => {
        if ($(imgs[i]).hasClass("design")) {
            designBtn()
            tamsele('design')
        } else if ($(imgs[i]).hasClass("web")) {
            webBtn()
            tamsele('web')
        } else if ($(imgs[i]).hasClass("escolar")) {
            escolBtn()
            tamsele('escolar')
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
}, 4000)

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