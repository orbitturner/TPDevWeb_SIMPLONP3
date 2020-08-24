
<div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
    <label for="nom" class="col-md-2 control-label">Nom</label>
    <div class="col-md-10">
        <input class="form-control" name="nom" type="text" id="nom" value="{{ old('nom', optional($agency)->nom) }}" minlength="1" maxlength="255" required="true" placeholder="Enter nom here...">
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('creationDate') ? 'has-error' : '' }}">
    <label for="creationDate" class="col-md-2 control-label">Creation Date</label>
    <div class="col-md-10">
        <input class="form-control" name="creationDate" type="text" id="creationDate" value="{{ old('creationDate', optional($agency)->creationDate) }}" minlength="1" maxlength="255" required="true" placeholder="Enter creation date here...">
        {!! $errors->first('creationDate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lieu') ? 'has-error' : '' }}">
    <label for="lieu" class="col-md-2 control-label">Lieu</label>
    <div class="col-md-10">
        <input class="form-control" name="lieu" type="text" id="lieu" value="{{ old('lieu', optional($agency)->lieu) }}" minlength="1" maxlength="255" required="true" placeholder="Enter lieu here...">
        {!! $errors->first('lieu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numAgency') ? 'has-error' : '' }}">
    <label for="numAgency" class="col-md-2 control-label">Num Agency</label>
    <div class="col-md-10">
        <input class="form-control" name="numAgency" type="text" id="numAgency" value="{{ old('numAgency', optional($agency)->numAgency) }}" min="1" max="255" required="true" placeholder="Enter num agency here...">
        {!! $errors->first('numAgency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

