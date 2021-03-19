jQuery(function () {
    $("#a_mot_de_passe").click(function () {
        $("#div_connexion").hide();
        $("#div_email").slideDown();
        $("#form_email")[0].reset();
        return false;
    });
    $("#a_connexion").click(function () {
        $("#div_email").hide();
        $("#div_connexion").slideDown();
        $("#form_connexion")[0].reset();
        return false;
    });
    $("#form_sign").submit(function (){
        let
            pseudo = $("#pseudo").val(),
            email = $("#email").val(),
            age = $("#age").val(),
            sexe = $("#gender").val(),
            // photo = $("#libelle").val(),
            password = $("#password").val(),
            password2 = $("#password2").val();
        $("#btn_signup")
            .prop('disabled',true)
            .removeClass('btn-dark')
            .addClass('btn-success')
            .html('Enregistrement...');

        $.ajax({
            url: 'Submit/User/signin.php',
            type: 'POST',
            data:{
                'pseudo' : pseudo,
                'age' : age,
                'sexe' : sexe,
                'password' : password,
                'password2' : password2,
                'email' : email,
            },
            dataType: 'json',
            success:function (data){
                if(data['success'] == true) {
                    $("#form_sign").hide();
                    $("#resultat_insertion").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">\n' +
                        data['message']+'  \n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>');
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }else {
                    $("#resultat_insertion").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">\n' +
                        data['message']+'  \n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>');
                }
            }
        });

        return false;
    });
    $("#form_connexion").submit(function () {
        let login           = $("#code_utilisateur_input").val().trim(),
            mot_de_passe    = $("#mot_de_passe_input").val().trim();
        if(login && mot_de_passe) {
            $("#btn_connexion")
                .prop('disabled',true)
                .removeClass('btn-dark')
                .addClass('btn-warning')
                .html('Vérification...');

            $.ajax({
                url: 'Submit/User/connexion.php',
                type: 'POST',
                data: {
                    'login': login,
                    'mot_de_passe': mot_de_passe
                },
                dataType: 'json',
                success: function (data) {
                    $("#btn_connexion")
                        .prop('disabled',false)
                        .removeClass('btn-warning')
                        .addClass('btn-dark')
                        .html('Connexion');
                    if(data['success'] === true) {
                        $("#form_connexion").hide();
                        $("#p_connexion_resultats").removeClass('alert alert-danger')
                            .addClass('alert alert-success')
                            .html(data['commentaire']);
                        setTimeout(function () {
                            window.location.href= "";
                        },3000);
                    }else {
                        $("#p_connexion_resultats").removeClass('alert alert-success')
                            .addClass('alert alert-danger')
                            .html(data['commentaire']);
                    }

                }
            });
        }
        return false;
    });
});