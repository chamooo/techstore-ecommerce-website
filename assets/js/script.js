$(function(){

    function burger() {
        $('.header__burger').toggleClass('open-burger');
        $('body').toggleClass('lock');
        $('.header__nav').slideToggle();
        $('.header__auth').slideToggle();
    }

    function validForm(form) {

        $($('input', form)).focus(function (e) { 

            fillForm(form)

            $($('input', form)).each((i, el) => {
                if ($(el).val() != '') {
                    $(el).siblings().addClass('_keypress');
                } else {
                    $(el).siblings().removeClass('_keypress');
                }
            })

            
            let i = 0
            $(this).keypress(function (e) { 
                i++
                if (i > 0) {
                    $(this).siblings().addClass('_keypress');
                }
                fillForm(form)
                $('.modal__error').hide();
            });

            $(this).keydown(function (e) { 
                if (e.keyCode === 8 && i > 0) {
                    i--
                }
                if (i == 0) {
                    $(this).siblings().removeClass('_keypress');
                }
                fillForm(form)
                $('.modal__error').hide();
            });
    
            $(this).siblings('.form__clear').click(function (e) { 
                $(this).siblings('.form__input').val("");
                $(this).siblings().removeClass('_keypress');
                $(this).removeClass('_keypress');
                fillForm(form)
                $('.modal__error').hide();
            });
            
        });

    }

    function fillForm(form) {
        let count = 0
        $($('input', form)).each((i, el) => {
            if ($(el).val() != '') {
                count++
            }
        })
        if (count == $('input', form).length) {
            $($('.form__button', form)).removeClass('form__button_disabled');
        } else {
            $($('.form__button', form)).addClass('form__button_disabled');
        }
    }

    function clearForm(form) {
        $(form).find('input').val('');
        $(form).find('._keypress').removeClass('_keypress');
        $('.modal__error').hide();
    }


    function signIn() { 
        $('.open-modal').removeClass('open-modal');
        $('.modal_signin').addClass('open-modal');
        clearForm($('#signIn'))
        validForm($('#signIn')) 
    }

    function signUp() {
        $('.open-modal').removeClass('open-modal');
        $('.modal_signup').addClass('open-modal');
        clearForm($('#signUp'))
        validForm($('#signUp')) 
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
    
    function signUpError() {
        $('.modal_error-signup').addClass('open-modal');
    }

    function signInError() {
        $('.modal__error').show();
    }


    $('.header__burger').click(burger)

    $('.header__auth').click(function () { 
        if (sessionStorage.getItem('user')) {
            logout()
        } else {
            signIn()
        }
        
        if ($('.header__burger').hasClass('open-burger')) {
            burger()
        }
    });

    $('.modal__close').click(function () { 
        $('.modal').removeClass('open-modal');
    });


    $('#signIn').submit(function (e) { 
        e.preventDefault();

        $.post("/modules/signIn.php", 
            $(this).serialize(),
            function (data, textStatus, jqXHR) {
                if (data == 0) {
                    signInError()
                } else {
                    $('.header__auth span').text(data);
                    sessionStorage.setItem('user', data);
                    clearForm($(this))
                    $('.open-modal').removeClass('open-modal');
                }
            },
        );
    });


    $('#signUp').submit(function (e) { 
        e.preventDefault();

        $.post("/modules/signUp.php", 
            $(this).serialize(),
            function (data, textStatus, jqXHR) {
                if (data == 1) {
                    signUpError()
                } else {
                    $('.header__auth span').text(data);
                    sessionStorage.setItem('user', data);
                }
            },
        );

        clearForm($(this))
        $('.open-modal').removeClass('open-modal');
    });


    $('.link-signup').click(function (e) { 
        e.preventDefault();
        signUp()
    });

    $('.link-signin').click(function (e) { 
        e.preventDefault();
        signIn()
    });

    if (sessionStorage.getItem('user')) {
        $('.header__auth span').text(sessionStorage.getItem('user'));
    }





























});