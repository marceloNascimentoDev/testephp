<div class="tab-pane" id="contact">
    <div class="row">
        <h5 class="info-text"> Por favor nos informe seus dados de contato.</h5>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Telefone Fixo <small>(obrigatório)</small></label>
                <input 
                    name="phone" 
                    type="text" 
                    required
                    class="form-control phone" 
                    placeholder="(12) 38874213"
                    value="{{isset($contactInputs) ? $contactInputs->phone : null}}"
                >
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Telefone Celular <small>(obrigatório)</small></label>
                <input 
                    name="mobile_phone" 
                    type="text" 
                    class="form-control phone"
                    placeholder="(12) 996630912" 
                    required 
                    value="{{isset($contactInputs) ? $contactInputs->mobile_phone : null}}"
                >
            </div>
        </div>
    </div>
</div>