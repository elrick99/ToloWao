jQuery(function () {
    $("#form_agence").submit(function (){
        let
            code_agence = $("#code_agence_input").val(),
            raison_sociale = $("#raison_social_input").val(),
            telephone = $("#num_telephone_input").val();

        $.ajax({
            url: '../_configs/Includes/Submits/Agences/submit_agence.php',
            type: 'POST',
            data:{
                'code_agence' : code_agence,
                'raison_sociale' : raison_sociale,
                'telephone' : telephone
            },
            dataType: 'json',
            success:function (data){
                if(data['success'] == true) {
                    $("#form_agence").hide();
                    $("#resultat_insertion").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">\n' +
                        data['message']+'  \n' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>');
                    window.location.href = "../agence/";
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

});