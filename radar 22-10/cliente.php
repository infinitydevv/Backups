<!DOCTYPE html>
<html lang="pt-br">
 <head>
 <script type="text/javascript" src="funcoes_cpf.js"></script>
 
 <meta charset="UTF-8">
 <title>Buscando informações de um endereço através do CEP</title>
 </head>
 <body>
 <form name="frmcpf" method="post" action="default.html" onsubmit="VerificaCPF();">
 CEP: <input type="text" id="cep" maxlength="9" placeholder="Ex: 13483-087"/><br/>
 Endereço: <input type="text" id="endereco"/> - Nº: <input type="text" id="num" /> <br/>
 Bairro: <input type="text" id="bairro"/><br/>
 Cidade: <input type="text" id="cidade"/><br/>
 UF: <input type="text" id="uf"/><br/>
 
 
 Nome:<input type="text" id="nome" maxlength="200" placeholder="Ex: João da Silva"/><br/>
 CPF: <input type="text" id="cpf" placeholder="Ex: 11188877733"  maxlength="14" onblur="return verificarCPF(this.value)" /><br/>
 
 E-mail: <input type="email" id="bairro" maxlength="250" placeholder="Ex: joao@dominio.com"/><br/>
 Conjugue: <input type="text" id="conjugue" maxlength="200" placeholder="Ex: Nome da Esposa(o)"/><br/>
 CPF:<input type="text" id="cpfconjugue" maxlength="11" placeholder="Ex: 11188877733" onblur="return verificarCPF(this.value)"/><br/>
 <input type="button" name="Submit" value="Salvar" >
 </form>
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script>
 // Registra o evento blur do campo "cep", ou seja, quando o usuário sair do campo "cep" faremos a consulta dos dados
 $("#cep").blur(function(){
 // Para fazer a consulta, removemos tudo o que não é número do valor informado pelo usuário
 var cep = this.value.replace(/[^0-9]/, "");
 
 // Validação do CEP; caso o CEP não possua 8 números, então cancela a consulta
 if(cep.length!=8){
 return false;
 }
 
 // Utilizamos o webservice "viacep.com.br" para buscar as informações do CEP fornecido pelo usuário.
 // A url consiste no endereço do webservice ("http://viacep.com.br/ws/"), mais o cep que o usuário
 // informou e também o tipo de retorno que desejamos, podendo ser "xml", "piped", "querty" ou o que
 // iremos utilizar, que é "json"
 var url = "http://viacep.com.br/ws/"+cep+"/json/";
 
 // Aqui fazemos uma requisição ajax ao webservice, tratando o retorno com try/catch para que caso ocorra algum
 // erro (o cep pode não existir, por exemplo) o usuário não seja afetado, assim ele pode continuar preenchendo os campos
 $.getJSON(url, function(dadosRetorno){
 try{
 // Insere os dados em cada campo
 $("#endereco").val(dadosRetorno.logradouro);
 $("#bairro").val(dadosRetorno.bairro);
 $("#cidade").val(dadosRetorno.localidade);
 $("#uf").val(dadosRetorno.uf);
 }catch(ex){}
 });
 });
 
 </script>
 
 <script>
    function validarCPF() {
        if (vercpf(document.frmcpf.cpf.value))
        {
            document.frmcpf.submit();
        } else {
            errors = "1";
            if (errors)
                alert('CPF inválido');
            document.retorno = (errors == '');
        }
    }

    function vercpf(cpf) {
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;

        add = 0;

        for (i = 0; i &lt; 9; i++)
                add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        add = 0;
                for (i = 0; i &lt; 10; i++)
                add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        alert('O CPF INFORMADO É VÁLIDO.');
        return true;
    }

    $j(document).ready(function () {

        $j("#meuForm").validate({
            rules: {
                NrCpf: {NrCpf: true, required: true}
            },
            messages: {
                NrCpf: {NrCpf: alert('CPF Inválido')}
            }
        });
    });
</script>
 
 </body>
</html>
