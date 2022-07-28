$(function(){

    let isMobile = {
        Android: function() {return navigator.userAgent.match(/Android/i);},
        BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},
        iOS: function() {return navigator.userAgent.match(/iPhone|iPad|iPod/i);},
        Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},
        Windows: function() {return navigator.userAgent.match(/IEMobile/i);},
        any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}
    };

    function burger() {
        $('.header__burger').toggleClass('open-burger');
        $('body').toggleClass('lock');
        $('.header__nav').slideToggle();
        $('.header__buttons').slideToggle();
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
                    $('.header__auth span').text('Увійти');
                    sessionStorage.removeItem('user');
                },
            );
    }
    
    function signUpError() {
        $('.modal_error-signup').addClass('open-modal');
    }

    function signUpSuccess() {
        $('.modal_success-signup').addClass('open-modal');
    }

    function signInError() {
        $('.modal__error').show();
    }


    if (isMobile.any()) {
        $('.header__auth').click(function () { 
            if (sessionStorage.getItem('user')) {
                let role = JSON.parse(sessionStorage.getItem('user')).role
                if (role == 'admin') {
                    $('.admin-link').css('display', 'block')
                }
    
                $('.header__buttons-list').slideToggle();
            }
            
        });
    } else {
        $('.header__buttons').mouseenter(function () { 
            if (sessionStorage.getItem('user')) {
                let role = JSON.parse(sessionStorage.getItem('user')).role
                if (role == 'admin') {
                    $('.admin-link').css('display', 'block')
                }
    
                $('.header__buttons-list').slideDown();
            }
            
        });
    
        $('.header__buttons').mouseleave(function () { 
            if (sessionStorage.getItem('user')) {
                $('.header__buttons-list').slideUp();
            }
        });
    }
    


    $('.header__burger').click(burger)

    $('.header__auth').click(function () { 
        if (!sessionStorage.getItem('user')) {
            signIn()

            if ($('.header__burger').hasClass('open-burger')) {
                burger()
            }
        }
    });

    $('.logout').click(function (e) { 
        e.preventDefault();
        $('.header__buttons-list').slideUp();
        logout()
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
                    let user = JSON.parse(data)
                    $('.header__auth span').text(user.username);
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
                    signUpSuccess()
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
        $('.header__auth span').text(JSON.parse(sessionStorage.getItem('user')).username);
    }





























});