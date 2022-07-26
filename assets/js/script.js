$(function(){

    function burger() {
        $('.header__burger').toggleClass('open-burger');
        $('body').toggleClass('lock');
        $('.header__nav').slideToggle();
        $('.header__auth').slideToggle();
    }

    function validForm(form) {
        $(form,'.form__input').focus(function (e) { 
            let i = 0
            $(this).keypress(function (e) { 
                i++
                if (i > 0) {
                    $(this).siblings().addClass('_keypress');
                }
            });
            $(this).keydown(function (e) { 
                if (e.keyCode === 8 && i > 0) {
                    i--
                }
                if (i == 0) {
                    $(this).siblings().removeClass('_keypress');
                }
            });
    
            $(this).siblings('.form__clear').click(function (e) { 
                $(this).siblings('.form__input').val("");
                $(this).siblings().removeClass('_keypress');
                $(this).removeClass('_keypress');
                
            });
            
        });
    }

    function clearForm(form) {
        $(form).find('input').val('');
        $(form).find('._keypress').removeClass('_keypress');
    }


    function signIn() { 
        validForm($('#signIn')) 

        $('#signIn').submit(function (e) { 
            e.preventDefault();
    
            $.post("/modules/signIn.php", 
                $(this).serialize(),
                function (data, textStatus, jqXHR) {
                    $('.header__auth span').text(data);
                    sessionStorage.setItem('user', data);
                },
            );
            clearForm($(this))
            $('.modal').removeClass('open-modal');
        });
    }

    function signUp() {
        validForm($('#signUp')) 

        $('#signUp').submit(function (e) { 
            e.preventDefault();
    
            $.post("/modules/signUp.php", 
                $(this).serialize(),
                function (data, textStatus, jqXHR) {
                    $('.header__auth span').text(data);
                    sessionStorage.setItem('user', data);
                },
            );
            clearForm($(this))
            $('.modal').removeClass('open-modal');
        });
    }

    function logout() { 
        $.post("/modules/logout.php", 
                $(this),
                function (data, textStatus, jqXHR) {
                    $('.header__auth span').text('Войти');
                    sessionStorage.removeItem('user');
                },
            );
    }



    $('.header__burger').click(burger)

    $('.header__auth').click(function () { 
        if (sessionStorage.getItem('user')) {
            logout()
        } else {
            $('.modal_signin').addClass('open-modal');
            signIn()
        }
        
        if ($('.header__burger').hasClass('open-burger')) {
            burger()
        }
    });

    $('.modal__close').click(function () { 
        $('.modal').removeClass('open-modal');
    });

    $('#link-signup').click(function (e) { 
        e.preventDefault();
        $('.open-modal').removeClass('open-modal');
        $('.modal_signup').addClass('open-modal');
    });

    $('#link-signin').click(function (e) { 
        e.preventDefault();
        $('.open-modal').removeClass('open-modal');
        $('.modal_signin').addClass('open-modal');
    });

    if (sessionStorage.getItem('user')) {
        $('.header__auth span').text(sessionStorage.getItem('user'));
    }





























});