jQuery(function () {
    $("#form_comment").submit(function (){
        let
            libelle = $("#libelle").val(),
            user_id = $("#user_id").val(),
            video_id = $("#video_id").val();

        $.ajax({
            url: 'Submit/Videos/commentaire.php',
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
    $("#dislike").submit(function (){
        let
            libelle = $("#libelle").val(),
            user_id = $("#user_id").val(),
            video_id = $("#video_id").val();

        $.ajax({
            url: 'Submit/Videos/commentaire.php',
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
    $("#like").submit(function (){
        let
            like = 1,
        $.ajax({
            url: 'Submit/Videos/commentaire.php',
            type: 'POST',
            data:{
                'like' : like,

            },
            dataType: 'json',
            success:function (data){
                if(data['success'] == true) {
                    $("#form_comment").hide();

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

});