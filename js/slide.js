/* CONTROLA TODO O SLIDE */

let count = 1

const list = document.getElementsByClassName('list')
const radios = document.getElementsByClassName('radio')
const sele = document.getElementById('sele')
const imgs = document.getElementsByClassName('imgs')
const proj = document.getElementsByClassName('proj')


tamSele('design', 0) /* inicializa na posição certa o agrupamento na navegação */

/* Eventos de click no menu do slide */
list[0].addEventListener('click', () => {
    designBtn()
    tamSele('design')
    clickbtn('design')
})

list[1].addEventListener('click', () => {
    escolBtn()
    tamSele('escolar')
    clickbtn('escolar')
})

list[2].addEventListener('click', () => {
    webBtn()
    tamSele('web')
    clickbtn('web')
})

/* Funções para mudar de cor os itens do menu do slide */
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

/* Direciona o slide para a primeira img da classe quando clicado no menu */
function clickbtn(classe) {
    for (let i = 0; i < radios.length; i++) {
        if ($(radios[i]).hasClass(classe)) {
            count = i
            radios[i].checked = true
        }

    }
}

/* Calcula o tamanho e a posição do agrupamento a depender da quantidade de imgs de cada classe */
function tamSele(classe) {
    let qtimg = 0
    let elem1 = 0

    for (let i = 0; i <= imgs.length; i++) { // Conta quantas imgs tem na classe atual 
        if ($(imgs[i]).hasClass(classe)) {
            qtimg++
            if(qtimg == 1){
                elem1 = ($('.auto-btn'+(i+qtimg)).offset().left - 10) - $('.navegacao').offset().left // verifica a posição do agrupamento
            }
        }
    }
    //let left = (elem1 + (elem1 + (qtimg * 34)))/2

    sele.style.left = elem1 + 'px'
    sele.style.width = (qtimg * 34) + 'px'
}

/* NAVEGAÇÃO MANUAL */

for (let i = 0; i < radios.length; i++) {
    radios[i].addEventListener('click', () => {
        if ($(imgs[i]).hasClass("design")) { /* Verifica a classe da img atual e altera o agrupamento e o menu */
            designBtn()
            tamSele('design')
        } else if ($(imgs[i]).hasClass("web")) {
            webBtn()
            tamSele('web')
        } else if ($(imgs[i]).hasClass("escolar")) {
            escolBtn()
            tamSele('escolar')
        }
        count = i
    })
}

/* NAVEGAÇÃO AUTOMÁTICA */

setInterval(() => {
    radios[count].checked = true

    if ($(imgs[count]).hasClass("design")) {
        designBtn()
        tamSele('design')
    } else if ($(imgs[count]).hasClass("web")) {
        webBtn()
        tamSele('web')
    } else if ($(imgs[count]).hasClass("escolar")) {
        escolBtn()
        tamSele('escolar')
    }
    count++

    if (count >= radios.length) {
        count = 0
    }
}, 4000)

/* AMPLIANDO A IMG NA TELA */

let img = document.createElement('img')

for (let i = 0; i < imgs.length; i++) {
    imgs[i].addEventListener('click', () => {

        img.src = $(imgs[i]).attr("src")

        img.style.height = '80vh'
        img.style.maxWidth = (i == 2 || i == 5) ? '80vh' : '100vw'
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

/* evento para fechar a img */

img.addEventListener('click', () => {
    img.style.opacity = '0'

    setTimeout(() => {
        img.remove()
    }, 500)
})