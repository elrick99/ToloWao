jQuery(function () {
    $("#form_comment").submit(function (){
        let
            libelle = $("#libelle").val(),
            user_id = $("#user_id").val(),
            video_id = $("#video_id").val();

        $.ajax({
            url: '../Submit/Videos/commentaire.php',
            type: 'POST',
            data:{
                'commentaire' : libelle,
                'video_id' : video_id,
                'user_id' : user_id
            },
            dataType: 'json',
            success:function (data){
                if(data['success'] == true) {
                    $("#form_comment").hide();
                    $("#resultat_insertion").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">\n' +
                        data['message']+'  \n' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>');
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }else {
                    $("#resultat_insertion").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">\n' +
                        data['message']+'  \n' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>');
                }
            }
        });

        return false;
    });
    $("#form_agence_status").submit(function () {
        $("#form_agence_status *").prop('disabled',true);
        $("#btn_agence_status").prop('disabled',true);
        $("#btn_agence_status").removeClass('btn-outline-danger');
        $("#btn_agence_status").addClass('btn-outline-warning');
        $("#btn_agence_status").html('<i class="fa fa-save"></i> Enregistrement...');

        let statut = $("#statut_agence").val(),
            code = $("#code_agence").val();

        if(code) {
            $.ajax({
                url: '../_configs/Includes/Submits/Agences/submit_statut_agence.php',
                type: 'POST',
                data: {
                    'statut': statut,
                    'code': code
                },
                dataType: 'json',
                success: function (data) {
                    $("#form_agence_status *").prop('disabled', false);
                    $("#btn_agence_status").prop('disabled', false);
                    $("#btn_agence_status").removeClass('btn-outline-warning');
                    $("#btn_agence_status").addClass('btn-outline-danger');
                    $("#btn_agence_status").html('<i class="fa fa-save"></i> Enregistrer');

                    if (data['status'] == 'success') {
                        $("#form_agence_status").hide();
                        $("#resultat_agence_status_div").html('<div class="alert alert-primary">\n' +
                            data['message'] +
                            '</div>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $("#resultat_agence_status_div").html('<div class="alert alert-warning">\n' +
                            data['message'] +
                            '</div>');
                    }
                }
            });
        }
        return false;
    });
    $("#form_ajouter_responsable_agence").submit(function () {
        $("#form_ajouter_responsable_agence *").prop('disabled',true);
        $("#btn_ajouter_responsable_agence").prop('disabled',true);
        $("#btn_ajouter_responsable_agence").removeClass('btn-outline-danger');
        $("#btn_ajouter_responsable_agence").addClass('btn-outline-warning');
        $("#btn_ajouter_responsable_agence").html('<i class="fa fa-save"></i> Enregistrement...');

        let pseudo_responsable = $("#pseudo_reponsable_agence_input").val(),
            code_agence = $("#code_agence").val();

        if(pseudo_responsable && code_agence) {
            $.ajax({
                url: '../_configs/Includes/Submits/Agences/submit_edition_responsable_agence.php',
                type: 'POST',
                data: {
                    'pseudo_responsable': pseudo_responsable,
                    'code_agence': code_agence
                },
                dataType: 'json',
                success: function (data) {
                    $("#form_ajouter_responsable_agence *").prop('disabled', false);
                    $("#btn_ajouter_responsable_agence").prop('disabled', false);
                    $("#btn_ajouter_responsable_agence").removeClass('btn-outline-warning');
                    $("#btn_ajouter_responsable_agence").addClass('btn-outline-danger');
                    $("#btn_ajouter_responsable_agence").html('<i class="fa fa-save"></i> Enregistrer');

                    if (data['status'] == 'success') {
                        $("#form_ajouter_responsable_agence").hide();
                        $("#resultat_ajouter_responsable_agence_div").html('<div class="alert alert-primary" align="center">\n' +
                            data['message'] +
                            '</div>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $("#resultat_ajouter_responsable_agence_div").html('<div class="alert alert-warning" align="center">\n' +
                            data['message'] +
                            '</div>');
                    }
                }
            });
        }
        return false;
    });
    $("#form_ajouter_produit_agence").submit(function () {
        $("#form_ajouter_produit_agence *").prop('disabled',true);
        $("#btn_ajouter_produit_agence").prop('disabled',true);
        $("#btn_ajouter_produit_agence").removeClass('btn-outline-danger');
        $("#btn_ajouter_produit_agence").addClass('btn-outline-warning');
        $("#btn_ajouter_produit_agence").html('<i class="fa fa-save"></i> Enregistrement...');

        let code_produit = $("#slt_produit_input option:selected").val(),
            code_agence = $("#code_agence").val();

        if(code_produit && code_agence) {
            $.ajax({
                url: '../_configs/Includes/Submits/Agences/submit_attribuer_produit_agence.php',
                type: 'POST',
                data: {
                    'code_produit': code_produit,
                    'code_agence': code_agence
                },
                dataType: 'json',
                success: function (data) {
                    $("#form_ajouter_produit_agence *").prop('disabled', false);
                    $("#btn_ajouter_produit_agence").prop('disabled', false);
                    $("#btn_ajouter_produit_agence").removeClass('btn-outline-warning');
                    $("#btn_ajouter_produit_agence").addClass('btn-outline-danger');
                    $("#btn_ajouter_produit_agence").html('<i class="fa fa-save"></i> Enregistrer');

                    if (data['status'] == 'success') {
                        $("#form_ajouter_produit_agence").hide();
                        $("#resultat_ajouter_produit_agence_div").html('<div class="alert alert-primary" align="center">\n' +
                            data['message'] +
                            '</div>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $("#resultat_ajouter_produit_agence_div").html('<div class="alert alert-warning" align="center">\n' +
                            data['message'] +
                            '</div>');
                    }
                }
            });
        }
        return false;
    });
    $(".btnRetirerProduit").click(function(){
        var idbtn = $(this).attr('id');
        produit = idbtn.split('_');
        var code_produit = produit['1'];
        console.log(code_produit);
        $("#retirer_produit_input").val(code_produit);
    });
    $("#form_retirer_produit_agence").submit(function () {
        $("#form_ajouter_produit_agence *").prop('disabled',true);
        $("#btn_retirer_produit_agence").prop('disabled',true);
        $("#btn_retirer_produit_agence").removeClass('btn-outline-danger');
        $("#btn_retirer_produit_agence").addClass('btn-outline-warning');
        $("#btn_retirer_produit_agence").html('<i class="fa fa-check"></i> Validation en cours...');

        let code_produit = $("#retirer_produit_input").val(),
            code_agence = $("#code_agence").val();

        if(code_produit && code_agence) {
            $.ajax({
                url: '../_configs/Includes/Submits/Agences/submit_retirerproduit_agence.php',
                type: 'POST',
                data: {
                    'code_produit': code_produit,
                    'code_agence': code_agence
                },
                dataType: 'json',
                success: function (data) {
                    $("#form_retirer_produit_agence *").prop('disabled', false);
                    $("#btn_retirer_produit_agence").prop('disabled', false);
                    $("#btn_retirer_produit_agence").removeClass('btn-outline-warning');
                    $("#btn_retirer_produit_agence").addClass('btn-outline-danger');
                    $("#btn_retirer_produit_agence").html('<i class="fa fa-check"></i> oui');

                    if (data['status'] == 'success') {
                        $("#form_retirer_produit_agence").hide();
                        $("#resultat_retirer_produit_agence_div").html('<div class="alert alert-primary" align="center">\n' +
                            data['message'] +
                            '</div>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $("#resultat_retirer_produit_agence_div").html('<div class="alert alert-warning" align="center">\n' +
                            data['message'] +
                            '</div>');
                    }
                }
            });
        }
        return false;
    });
});