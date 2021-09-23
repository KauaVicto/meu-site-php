<?php

    $qtImg = 100 / count($_SESSION['imgs']); /* Define de quanto em quanto % a img irá rolar */

?>

<style>

.slide{
    width: 30%;
    height: 90%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

.menu-slide{
    width: 100%;
    margin-bottom: 20px;
}

.menu-slide ul{
    display: flex;
    justify-content: space-around;
    align-items: center;
    list-style: none;
}

.menu-slide ul li{
    font-size: 2rem;
    font-family: 'Poppins';
    padding: 5px 30px;
    border-radius: 10px;
    cursor: pointer;
    border: 2px solid #0D1F2D;
    transition: .3s all ease;
}

.menu-slide ul li.on{
    background-color: #0D1F2D;
}

.menu-slide ul li:hover{
    background-color: #0D1F2D;
}

.slider{
    width: 100%;
    height: 350px;
    position: relative;
    overflow: hidden;
}

.proj{
    width: <?= 100 * count($_SESSION['imgs']).'%' ?>; /* Pega a quantidade de imgs e multiplica por 100 para definir o tamanho do slide em % */
    height: 100%;
    display: flex;
    position: relative;
}

.proj input{
    display: none;
}

.proj .img{
    width: <?= "$qtImg%" ?>; /* Pega x% do tamanho inteiro do slide para cada img a depender da quantidade delas */
    transition: 1s all ease;
    margin-bottom: 20px;
}

.proj .img img{
    border-radius: 10px;
    width: 100%;
    height: 89%;
    object-fit: cover;
    object-position: top left;
}

/* manual slide */

.btns{
    position: absolute;
    bottom: 10px;
    width: <?= "$qtImg%" ?>; /* Pega x% do tamanho inteiro do slide para a navegação inferior a depender da quantidade de imgs */
    height: 28px;
    margin-top: 20px;
}

.manual{
    position: relative;
    width: <?= "$qtImg%" ?>; /* Pega x% do tamanho inteiro do slide para a navegação inferior a depender da quantidade de imgs */
    display: flex;
    justify-content: center;
    width: 100%;
}

.manual #sele{
    content: '';
    width: <?= $_SESSION['qt1class']*34 ?>px; /* Verifica a quantidade de imagens da primeira classe e define a largura do agrupamento na navegação */
    height: 20px;
    background-color: rgba(14, 0, 70, 0.582);
    position: absolute;
    z-index: 0;
    top: -3px;
    border-radius: 10px;
    transition: .7s all ease-in-out;
}

.manual .manual-btn{
    border: 2px solid #FFFFFF;
    padding: 5px;
    border-radius: 10px;
    cursor: pointer;
    margin: 0 10px;
    transition: .3s all ease;
    position: relative;
    z-index: 1;
}

.manual .manual-btn:hover{
    background-color: #FFFFFF;
}

/* Verifica qual img está selecionada e modifica o margin-left */
<?php for($i = 1; $i <= count($_SESSION['imgs']); $i++){ ?>

    .proj <?="#radio$i"?>:checked ~ .first{
        margin-left: <?= -$qtImg * ($i - 1) ?>%
    }

<?php } ?>

/* Automatic */

.navegacao{
    position: relative;
    z-index: 1;
    display: flex;
    width: 100%;
    top: 50%;
    justify-content: center;
}

.navegacao div{
    border: 2px solid #FFFFFF;
    padding: 5px;
    border-radius: 10px;
    transition: .3s all ease;
    margin: 0 10px;
}

/* Deixa marcado o botão inferior que está selecionado */
<?php for($i = 1; $i <= count($_SESSION['imgs']); $i++){ ?>

    .proj <?="#radio$i"?>:checked ~ .btns .navegacao <?= ".auto-btn$i"?> {
        background-color: #FFFFFF
    }
<?php } ?>



/* RESPONSIVIDADE */

@media (max-width: 1400px){
    .menu-slide ul li{
        font-size: 1.5rem;
    }
}

</style>