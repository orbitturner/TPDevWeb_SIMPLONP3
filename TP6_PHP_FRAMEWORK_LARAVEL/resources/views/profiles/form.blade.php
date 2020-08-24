
<div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
    <label for="nom" class="col-md-2 control-label">Nom</label>
    <div class="col-md-10">
        <input class="form-control" name="nom" type="text" id="nom" value="{{ old('nom', optional($profile)->nom) }}" minlength="1" maxlength="255" required="true" placeholder="Enter nom here...">
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($profile)->description) }}" minlength="1" maxlength="255" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

