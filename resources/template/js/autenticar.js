$(function (){
   
    var form = $('form[name="frm_login"]');
    
    
    form.submit(function (){
       
       var dados = $(this).serialize();
       
       $.ajax({
          type: 'POST',
          url : 'http://localhost/CONTA_AZUL/login/ver',
          data: dados,
          dataType :'Json',
          beforeSend: function () {
                alert('Enviando');  
          },
          success:    function (response){
              if(response.autenticado){
                  window.location.href = 'http://localhost/CONTA_AZUL/';
              }else{
                    alert(response.mensagem);
              }               
          }
       });    
    });
   
    return  false;
    
});


