<?php

    $divi = 100 / count($_SESSION['imgs']);

?>

<style>

.slide{
    width: 30%;
    height: 80%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

.menu-slide{
    width: 100%;
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
    width: <?= 100 * count($_SESSION['imgs']) ?>%;
    height: 100%;
    display: flex;
    position: relative;
}

.proj input{
    display: none;
}

.proj .img{
    width: <?= $divi ?>%;
    transition: 1s all ease;
}

.proj .img img{
    border-radius: 10px;
    width: 100%;
    height: 89%;
    object-fit: cover;
    object-position: top left;
}

/* manual slide */

.manual{
    position: absolute;
    bottom: 10px;
    width: 14.28%;
    display: flex;
    justify-content: center;
}

.manual #sele{
    content: '';
    width: 92px;
    height: 20px;
    background-color: rgba(14, 0, 70, 0.582);
    position: absolute;
    z-index: 0;
    top: -3px;
    border-radius: 10px;
    margin-right: 139px;
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

<?php for($i = 1; $i <= count($_SESSION['imgs']); $i++){ ?>

    .proj <?="#radio$i"?>:checked ~ .first{
        margin-left: <?= -$divi * ($i - 1) ?>%;
    }

<?php } ?>

/* .proj #radio2:checked ~ .first{
    margin-left: -12.5%;
}
.proj #radio3:checked ~ .first{
    margin-left: -25%;
}
.proj #radio4:checked ~ .first{
    margin-left: -37.5%;
}
.proj #radio5:checked ~ .first{
    margin-left: -50%;
}
.proj #radio6:checked ~ .first{
    margin-left: -62.5%;
}
.proj #radio7:checked ~ .first{
    margin-left: -75%;
}
.proj #radio8:checked ~ .first{
    margin-left: -87.5%;
} */

/* Automatic */

.navegacao{
    position: absolute;
    z-index: 1;
    display: flex;
    width: 14.28%;
    justify-content: center;
    bottom: 10px;
}

.navegacao div{
    border: 2px solid #FFFFFF;
    padding: 5px;
    border-radius: 10px;
    transition: .3s all ease;
    margin: 0 10px;
}

<?php for($i = 1; $i <= count($_SESSION['imgs']); $i++){ ?>

    .proj.on <?="#radio$i"?>:checked ~ .navegacao <?= ".auto-btn$i"?> {
        background-color: #FFFFFF;
    }
<?php } ?>

</style>