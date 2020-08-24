
<div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">
    <label for="libelle" class="col-md-2 control-label">Libelle</label>
    <div class="col-md-10">
        <input class="form-control" name="libelle" type="text" id="libelle" value="{{ old('libelle', optional($openingfee)->libelle) }}" minlength="1" maxlength="255" required="true" placeholder="Enter libelle here...">
        {!! $errors->first('libelle', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('montant') ? 'has-error' : '' }}">
    <label for="montant" class="col-md-2 control-label">Montant</label>
    <div class="col-md-10">
        <input class="form-control" name="montant" type="number" id="montant" value="{{ old('montant', optional($openingfee)->montant) }}" min="-9" max="9" required="true" placeholder="Enter montant here...">
        {!! $errors->first('montant', '<p class="help-block">:message</p>') !!}
    </div>
</div>

