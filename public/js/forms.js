$(document).ready(function(){
    $('#chart').mask('000000');
    $('#rg').mask('000000000000000');
    $('#cpf').mask('000.000.000-00');
    $('#cns').mask('000 0000 0000 0000');
    $('#cep').mask('00.000-000');
    $('#phone').mask('(00) 00000-0000');
});
  
$("#name").on("input", function() {
    var regexp = /[^a-zA-Zà-úÀ-Ú '-.]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});
  
$("#social_name").on("input", function() {
    var regexp = /[^a-zA-Zà-úÀ-Ú '-.]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});
  
$("#affiliation1").on("input", function() {
    var regexp = /[^a-zA-Zà-úÀ-Ú '-.]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});
  
$("#affiliation2").on("input", function() {
    var regexp = /[^a-zA-Zà-úÀ-Ú '-.]/g;
    if(this.value.match(regexp)){
        $(this).val(this.value.replace(regexp,''));
    }
});

$("#cep").blur(function(){
    var cep = this.value.replace(/[^0-9]/, "");
    cep = cep.replace(/[^0-9]/, "");
    
    if(cep.length != 8){
        return false;
    }
    
    var url = "https://viacep.com.br/ws/"+cep+"/json/";
    
    $.getJSON(url, function(dateReturn){
        try{
            $("#address").val(dateReturn.logradouro.toUpperCase() + ',  - ' + dateReturn.bairro.toUpperCase() + ' - ' + dateReturn.localidade.toUpperCase() + '-' + dateReturn.uf.toUpperCase());
        }catch(ex){}
    });
});

function Social_Name(){
    if(document.getElementById('use_sn').checked){
        document.getElementById('social_name').removeAttribute("disabled");
    } else{
        document.getElementById('social_name').setAttribute("disabled", "disabled");
    }
}
