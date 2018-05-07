$(function () {
    
    
    
    $('form[name="user"').submit(function () {
        var form  = $(this);
        var dados = $(this).serialize();
        
        $.ajax({
            url: 'http://localhost/CONTA_AZUL/user/create',
            data: dados,
            type: 'POST',
            dataType: 'Json',
            beforeSend: function () {
                $('.logo').removeClass('hidden');   
            },
            success:function (resposta){
                var id = (resposta.id);
                if(id > 0){
                    $("#user_id").val(id);
                }
                form.find('.alert').removeClass('hidden');
                form.find('img').addClass('hidden');
            }
        });
        return false;
    });
});

