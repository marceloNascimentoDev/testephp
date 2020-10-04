<div class="tab-pane" id="personal">
    <div class="row">
        <h5 class="info-text"> Conte-nos um pouco sobre você.</h5>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nome completo <small>(obrigatório)</small></label>
            <input 
                name="name" 
                type="text" 
                class="form-control onlytext" 
                required 
                placeholder="Andrew..." 
                value="{{isset($personalInputs) ? $personalInputs->name : null }}"
            >
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Data de nascimento <small>(obrigatório)</small></label>
                <input 
                    name="birthday" 
                    type="text" 
                    id="birthday" 
                    class="form-control birthday" 
                    placeholder="mm/dd/aaaa" 
                    required 
                    value="{{isset($personalInputs) ? $personalInputs->birthday : null }}">
            </div>
        </div>
    </div>
</div>