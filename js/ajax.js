$(function(){

    $('#btnSign').click(function(e){
        e.preventDefault()
        
        var dados = {
            nome: $('#nome').val(),
            email: $('#email').val(),
            loginSign: $('#loginSign').val(),
            senhaSign: $('#senhaSign').val(),
            RsenhaSign: $('#RsenhaSign').val(),
        }

        $.post('login_cadastrar.php', dados, function(retorna){
            $('.msg-sign').html(retorna)
            $('#nome').val('')
            $('#email').val('')
            $('#loginSign').val('')
            $('#senhaSign').val('')
            $('#RsenhaSign').val('')
            carregar()
        })
    })

    $('#btnLogin').click(function(e){
        e.preventDefault()
        var dados = {
            login: $('#login').val(),
            pass: $('#pass').val()
        }

        $.post('login_entrar.php', dados, function(retorna){
            // location.reload(true)
            if(retorna.length <= 83){
                $('.msg-login').html(retorna)
            }else{
                $('li.login').html(retorna)
                $('#modal-container').removeClass('on')
                $('.li-pri.menu-drop').css({display: 'flex'})
                $('#btn-login').css('display', 'none')
            }
            console.log(retorna.length)
        })
    })
})