<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
@session_start();

include "../bibliotecas/vendor/autoload.php";
include "Config.php";
include "Transporter.php";

use \GuzzleHttp\Client;
use \PagSeguro\Config;
use \PagSeguro\Transporter;

$client = new Client();

$session_id_pag = Transporter::createSession();  
?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/color.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <?php require_once('header.php'); ?>
  <div class="container">
    <div class="red lighten-4 z-depth-1 hide" id="containerError" style="padding: 20px; border: 1px solid #ef9a9a!important;">
      <span id="msgError" >Error</span>
    </div>
  </div>

  <div class="container" id="loading">
    <div class="row center">
      <div class="col s12 center">
        <div class="preloader-wrapper active">
          <div class="spinner-layer spinner-red-only">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div><div class="gap-patch">
              <div class="circle"></div>
            </div><div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="pagamentos-tal" class="hide">

    <ul class="tabs">
      <div class="row">
        <li class="tab col s4"><a class="active" href="#tab-boleto">Boleto</a></li>
        <li class="tab col s4"><a href="#tab-debito">Debito</a></li>
        <li class="tab col s4"><a href="#tab-credito">Crédito</a></li>
      </div>
    </ul> 

    <div class="container">

      <div id="tab-boleto" class="container">

        <form action="/payment/boleto" class="checkout" method="post" name="checkout" style="padding:10px;" id="form-boleto">
          <div class="row">
            <div class="input-field col s12">
              <label class="" for="cpf_field">CPF:</label>
              <input type="text" required="required" id="cpf_field" name="cpf" >
            </div>
            <div class="input-field col s12">
              <label class="active" for="nascimento_field">Data de nascimento:</label>
              <input type="date" required="required" placeholder="" id="nascimento_field" name="birth" >
            </div>
            <div class="input-field col s2">
              <label>Telefone:</label>
              <input type="text" required="required" maxlength="2" minlength="2" placeholder="DDD" id="ddd_field" name="ddd" style="float:left;">
            </div>
            <div class="input-field col s10">
                <input type="text" required="required" maxlength="9" minlength="8" placeholder="Número" id="telefone_field" name="phone" style="float: left; margin-left: 10px;">
            </div>
          </div>
          <div class="center" style="margin-top: 10px;">
            <button type="submit" id="place_order_boleto" name="woocommerce_checkout_place_order" class="btn waves-effect waves-light red"><i class="fa fa-refresh fa-spin fa-fw margin-bottom hide"></i>Continuar</button>
          </div>
          <div class="clear"></div>
        </form>
      </div>

      <div id="tab-debito" class="container">

        <form action="/payment/debit" class="checkout" method="post" name="checkout" style="padding:10px;" id="form-debit">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" required="required" id="cpf_field" name="cpf">
              <label class="" for="cpf_field">CPF:</label>
            </div>
            <div class="input-field col s12">
              <label for="cpf_field" class="active">Data de nascimento:</label>
              <input type="date" required="required" min="1900-01-01" placeholder="" id="nascimento_field" name="birth" >
            </div>
            <div class="input-field col s2">
              <label>Telefone:</label>
              <input type="text" required="required" maxlength="2" minlength="2" placeholder="DDD" id="ddd_field" name="ddd" style="float:left;">
            </div>
            <div class="input-field col s10">
              <input type="text" required="required" maxlength="9" minlength="8" placeholder="Número" id="telefone_field" name="phone"" style="float: left; margin-left: 10px;">
            </div>
          </div>
          <fieldset>
            <div class="col s12 contents"></div>
          </fieldset>
          <div class="center" style="margin-top: 10px;">
            <button type="submit" id="place_order_debit" name="woocommerce_checkout_place_order" class="btn waves-effect waves-light red"><i class="fa fa-refresh fa-spin fa-fw margin-bottom hide"></i>Continuar</button>
          </div>
          <div class="clear"></div>
        </form>
      </div>

      <div id="tab-credito">

        <form action="/payment/credit" class="checkout" method="post" name="checkout" style="padding:10px;" id="form-credit">
          <input type="hidden" name="brand" id="brand-field">
          <div class="row">
            <div class="col s12">
              <div class="input-field">
                <label class="" for="cpf_field">CPF:</label>
                <input type="text" required="required" placeholder="" id="cpf_field" name="cpf" class="input-text">
              </div>
            </div>
            <div class="col s12 m5">
              <div class="input-field">
                <label class="active" for="nascimento_field">Data de nascimento:</label>
                <input type="date" required="required" placeholder="" id="nascimento_field" name="birth" class="input-text" >
              </div>
            </div>
            <div class="input-field col s2">
              <label>Telefone:</label>
              <input type="text" required="required" maxlength="2" minlength="2" placeholder="DDD" id="ddd_field" name="ddd"  style="float:left;">
            </div>
            <div class="input-field col s5">
              <input type="text" required="required" maxlength="9" minlength="8" placeholder="Número" id="telefone_field" name="phone"  style="float: left; margin-left: 10px; ">
            </div>
            
          </div>

          <div class="row">
            <div class="col s12">
              <div class="input-field">
                <label class="" for="name_field">Nome impresso no cartão:</label>
                <input type="text" required="required" placeholder="" id="name_field" name="name" >
              </div>
            </div>
            <div class="col s12 m9">
              <div class="input-field">
                <label class="" for="number_field">Número do cartão:</label>
                <input type="text" required="required" placeholder="" id="number_field" name="number" >
              </div>
            </div>
            <div class="col s12 m3">
              <div class="input-field">
                <label class="" for="cvv_field">Código de segurança:</label>
                <input type="text" required="required" placeholder="" id="cvv_field" name="cvv" >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s6 m3">
              <div class="input-field">
                <label class="active" for="month_name">Validade:</label>
                <select name="month"  required="required">
                  <option disabled="disabled" selected="selected" value="">Mês</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
            </div>
            <div class="col s6 m3">
              <div class="input-field">
                <label class="" for="month_name">&nbsp;</label>
                <select name="year"  required="required">
                  <option disabled="disabled" selected="selected" value="">Ano</option>
                  {loop="$years"}
                  <option value="{$value}">{$value}</option>
                  {/loop}
                </select>
              </div>
            </div>
            <input type="hidden" name="installments_qtd">
            <input type="hidden" name="installments_value">
            <input type="hidden" name="installments_total">
            <div class="col s12 m6">
              <div class="input-field">
                <select name="installments" id="installments_field"  required="required">
                  <option disabled="disabled" selected="selected">Carregando...</option>
                </select>
                <label class="" for="installments_field">Parcelamento</label>
              </div>
            </div>
            <div class="col s12">
              <div class="input-field" style="margin-bottom:10px; display:inline-block;">
                <h5>Bandeiras aceitas</h5>
                <div class="contents">
                  <div class="row"></div>
                </div>
              </div>
            </div>
          </div>                                                            

          <div class="center" style="margin-top: 10px;">
            <button type="submit" id="place_order_credit" name="woocommerce_checkout_place_order" class="btn waves-effect waves-light red"><i class="fa fa-refresh fa-spin fa-fw margin-bottom hide"></i>Continuar</button>
          </div>

          <div class="clear"></div>

        </form>

      </div>
    </div>
  </div>

  <script id="tpl-payment-debit" type="text/x-handlebars-template">
    <div style="padding: 10px;">
      <input type="radio" name="bank" id="{{value}}" value="{{value}}">
      <label for="{{value}}"><img src="https://stc.pagseguro.uol.com.br/{{image}}" alt="{{value}}">
      {{text}}</label>
    </div>
  </script>
  <script id="tpl-payment-credit" type="text/x-handlebars-template">
    <div class="col s4 m2 center" style=" border-right: 1px solid #dcdcdc; margin-top: 15px; border-left: 1px solid #dcdcdc;">
      <img src="https://stc.pagseguro.uol.com.br/{{image}}" alt="{{name}}" style="">
    </div>
  </script>
  <script id="tpl-installment-free" type="text/x-handlebars-template">
    <option>{{quantity}}x de {{installmentAmount}} sem juros</option>
  </script>
  <script id="tpl-installment" type="text/x-handlebars-template">
    <option>{{quantity}}x de {{installmentAmount}} com juros ({{totalAmount}})</option>
  </script>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../bibliotecas/materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="<?php echo Config::getUrlJS(); ?>"></script>
  <script type="text/javascript"> PagSeguroDirectPayment.setSessionId('<?php echo $session_id_pag; ?>');</script>
  <?php require_once('footer.php'); ?>
  <script>
    $(document).ready(function(){
      $('ul.tabs').tabs();
    });
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
  <script>
    script.push(function(){

      function showError(error){
        var errado = [];

        for(var code in error){
          errado.push(error[code]);
        }

        $("#msgError").text(errado.toString());
        $("#containerError").removeClass("hide");
      }

      PagSeguroDirectPayment.getPaymentMethods({
        amount: 200.00,
        success: function(response) {
          $('#loading').show();

          var tplDebit = Handlebars.compile($("#tpl-payment-debit").html());
          var tplCredit = Handlebars.compile($("#tpl-payment-credit").html());

          $.each(response.paymentMethods.ONLINE_DEBIT.options, function(index, option){
            $('#tab-debito .contents').append(tplDebit({
              value: option.name,
              image: option.images.MEDIUM.path,
              text: option.displayName
            }));
          });

          $.each(response.paymentMethods.CREDIT_CARD.options, function(index, option){
            $('#tab-credito .contents .row').append(tplCredit({
              name: option.name,
              image: option.images.MEDIUM.path,
            }));
          });

          $('#loading').hide();
          $('#pagamentos-tal').removeClass('hide');

        },
        error: function(response) {
          showError(response.errors);
        },
        complete: function(response) {

        }
      });
    });
  </script>
  <script>
    $('#number_field').keyup(function(){
      var val = $('#number_field').val();
      if(val.length > 6){
          PagSeguroDirectPayment.getBrand({
          cardBin: val.substring(0, 6),
          success: function(response) {
            $('#brand-field').val(response.brand.name);
            $("#cvv_field").attr('maxlength', response.brand.cvvSize);

            PagSeguroDirectPayment.getInstallments({
                amount: 200.00,
                brand: response.brand.name,
                maxInstallmentNoInterest: <?php echo Config::MAX_INSTALLMENT_NO_INTEREST; ?>,
                success: function(response) {
                    $("#installments_field").html('<option id="removeOption" disabled="disabled"></option>');

                    var tplInstallmentFree = Handlebars.compile($('#tpl-installment-free').html());
                    var tplInstallment = Handlebars.compile($('#tpl-installment').html());

                    var formatReal = {
                      minimunFractionDigits:2,
                      style:"currency",
                      currency:"BRL"
                    }

                    $.each(response.installments[$('#brand-field').val()], function(index, install){

                      if(parseInt(<?php echo Config::MAX_INSTALLMENT; ?>) > index){

                        if(install.interestFree === true){
                          var $option = $(tplInstallmentFree({
                            quantity: install.quantity,
                            installmentAmount: install.installmentAmount.toLocaleString('pt-BR', formatReal)
                          }));
                        }else{
                         var $option = $(tplInstallment({
                            quantity: install.quantity,
                            installmentAmount: install.installmentAmount.toLocaleString('pt-BR', formatReal),
                            totalAmount: install.totalAmount.toLocaleString('pt-BR', formatReal)
                          }));
                        }

                        $option.data("install", install);
                        $("#installments_field").append($option);
                        $('select').material_select();
                      }
                    });
                },
                error: function(response) {
                    showError(response);
                },
                complete: function(response) {
                    
                }
            });
          },
          error: function(response) {
          
          },
          complete: function(response) {
          
          }
        });
      }
    });
  </script>
</body>
</html>