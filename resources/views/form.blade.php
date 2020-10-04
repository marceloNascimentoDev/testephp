@extends('template')

@section('content')
    <div class="image-container set-full-height" style="background: #726a95">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container" style="padding-top: 10px;">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            <form action="" method="">
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

                                <div class="wizard-header text-center">
                                    <h3 class="wizard-title">Criar sua conta</h3>
                                    <p class="category">Preencha todos os dados corretamente.</p>
                                </div>

                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#personal" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-user"></i>
                                                </div>
                                                Informações pessoais
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#address" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-map-alt"></i>
                                                </div>
                                                Endereço
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#contact" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-mobile"></i>
                                                </div>
                                                Contato
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#finish" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-check"></i>
                                                </div>
                                                Concluir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" style="min-height: 0">
                                    @include('components.personal-form')   
                                    @include('components.address-form')
                                    @include('components.contact-form')
                                    @include('components.finish-form')
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn--save' name='next' value='Avançar' />
                                        <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finalizar' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Voltar' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->
    </div>
@endsection

@section('javascripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            jQuery("#birthday").mask("99/99/9999");
            jQuery(".phone").mask('(99) 9999-99999');
            jQuery('input[name="cep"]').mask('99999-999')
        })
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        jQuery.extend(jQuery.validator.messages, {
            required: "É obrigatório preencher este campo.",
            remote: "Por favor, verifique o valor inserido.",
            email: "Por favor, insira um email válido.",
            maxlength: jQuery.validator.format("Por favor, não insira mais do que {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, insira pelo menos {0} caracteres."),
            max: jQuery.validator.format("Por favor, insira um valor menor ou igual a {0}."),
            min: jQuery.validator.format("Por favor, insira um valor maior ou igual a {0}."),
            onlytext: jQuery.validator.format("Este campo permite somente letras."),
            birthday: jQuery.validator.format("Insira uma data válida."),
            number: jQuery.validator.format('Insira um numero válido.')
        });

        $.validator.addMethod('birthday', function (value, element) {
            if(value.length >= 10) {
                let now = new Date();
                let minDate = new Date('01/01/1850');
                let birthday = new Date(value);
                return birthday < now && birthday >= minDate;
            } else {
                return false;
            }
        });
        
        $.validator.addMethod('onlytext', function (value, element) {
            return value.match(/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]*$/);
        });
    })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let getStates = () => {
                return new Promise((resolve, reject) => {
                    $.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados', (data) => resolve(data));
                })
            }
            const fillStates = async () => {
                const stateInput = $('#input-states');
                let states = await getStates();
                states.map((item) => {
                    let newOption = $('#default-option').clone();
                    $(newOption).val(item.sigla);
                    $(newOption).html(item.nome);
                    $(stateInput).append(newOption);
                })

                $(stateInput).val($('#state-sigla').val())
            }

            fillStates();
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttonSubmit = $('.btn--save');
            $(buttonSubmit).click((e) => { 
                let container = $('.tab-pane.active');
                savePartialForm(container)
            });

            const sleep = (ms) => {
                 return new Promise(resolve => setTimeout(resolve, ms));
            }

            const isValid = (inputs) => {
                let valid = true;
                $(inputs).each((index, element) => {
                    let invalidInput = $(element).attr('aria-invalid') == 'true' || $(element).val() == '';
                    if(invalidInput) {
                        valid = false;
                    }
                });

                return valid;
            }

            const savePartialForm = async (container) => {
                await sleep(1000)
                let inputs = $(container).find(':input:not([type=hidden]), select');
                let items = mapToJson(inputs)
                const valid = isValid(inputs)
                if(valid) {
                    let payload = {
                        type: $(container).attr('id'),
                        items
                    }
                    
                    let request = await reqSavePartial(payload);
                    console.log(request)
                }
            }

            const reqSavePartial = (payload) => {
                return new Promise((resolve, reject) => {
                    $.post(main_url + '/save', payload,(data) =>  {
                        resolve(data);       
                    });
                })
            }

            const mapToJson = (inputs) => {
                let json = {};
                $(inputs).each((index, element) => {
                    let name = $(element).attr('name');
                    let value = $(element).val();
                    json[name] = value;
                });
                
                return json;
            }
        })
    </script>
@endsection