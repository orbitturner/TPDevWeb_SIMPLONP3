
<div class="form-group {{ $errors->has('numId') ? 'has-error' : '' }}">
    <label for="numId" class="col-md-2 control-label">Num Id</label>
    <div class="col-md-10">
        <input class="form-control" name="numId" type="text" id="numId" value="{{ old('numId', optional($clientphysique)->numId) }}" minlength="1" maxlength="255" required="true" placeholder="Enter num id here...">
        {!! $errors->first('numId', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
    <label for="nom" class="col-md-2 control-label">Nom</label>
    <div class="col-md-10">
        <input class="form-control" name="nom" type="text" id="nom" value="{{ old('nom', optional($clientphysique)->nom) }}" minlength="1" maxlength="255" required="true" placeholder="Enter nom here...">
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
    <label for="prenom" class="col-md-2 control-label">Prenom</label>
    <div class="col-md-10">
        <input class="form-control" name="prenom" type="text" id="prenom" value="{{ old('prenom', optional($clientphysique)->prenom) }}" minlength="1" maxlength="255" required="true" placeholder="Enter prenom here...">
        {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($clientphysique)->email) }}" minlength="1" maxlength="255" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cni') ? 'has-error' : '' }}">
    <label for="cni" class="col-md-2 control-label">Cni</label>
    <div class="col-md-10">
        <input class="form-control" name="cni" type="text" id="cni" value="{{ old('cni', optional($clientphysique)->cni) }}" minlength="1" maxlength="255" required="true" placeholder="Enter cni here...">
        {!! $errors->first('cni', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
    <label for="telephone" class="col-md-2 control-label">Telephone</label>
    <div class="col-md-10">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone', optional($clientphysique)->telephone) }}" minlength="1" maxlength="255" required="true" placeholder="Enter telephone here...">
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
    <label for="adresse" class="col-md-2 control-label">Adresse</label>
    <div class="col-md-10">
        <input class="form-control" name="adresse" type="text" id="adresse" value="{{ old('adresse', optional($clientphysique)->adresse) }}" minlength="1" maxlength="255" required="true" placeholder="Enter adresse here...">
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sexe') ? 'has-error' : '' }}">
    <label for="sexe" class="col-md-2 control-label">Sexe</label>
    <div class="col-md-10">
        <input class="form-control" name="sexe" type="text" id="sexe" value="{{ old('sexe', optional($clientphysique)->sexe) }}" minlength="1" maxlength="255" required="true" placeholder="Enter sexe here...">
        {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dateNaiss') ? 'has-error' : '' }}">
    <label for="dateNaiss" class="col-md-2 control-label">Date Naiss</label>
    <div class="col-md-10">
        <input class="form-control" name="dateNaiss" type="text" id="dateNaiss" value="{{ old('dateNaiss', optional($clientphysique)->dateNaiss) }}" minlength="1" maxlength="255" required="true" placeholder="Enter date naiss here...">
        {!! $errors->first('dateNaiss', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dateCreation') ? 'has-error' : '' }}">
    <label for="dateCreation" class="col-md-2 control-label">Date Creation</label>
    <div class="col-md-10">
        <input class="form-control" name="dateCreation" type="text" id="dateCreation" value="{{ old('dateCreation', optional($clientphysique)->dateCreation) }}" minlength="1" maxlength="255" required="true" placeholder="Enter date creation here...">
        {!! $errors->first('dateCreation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('features') ? 'has-error' : '' }}">
    <label for="features" class="col-md-2 control-label">Features</label>
    <div class="col-md-10">
        <input class="form-control" name="features" type="text" id="features" value="{{ old('features', optional($clientphysique)->features) }}" minlength="1" maxlength="255" required="true" placeholder="Enter features here...">
        {!! $errors->first('features', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('isSalarie') ? 'has-error' : '' }}">
    <label for="isSalarie" class="col-md-2 control-label">Is Salarie</label>
    <div class="col-md-10">
        <input class="form-control" name="isSalarie" type="text" id="isSalarie" value="{{ old('isSalarie', optional($clientphysique)->isSalarie) }}" minlength="1" maxlength="255" required="true" placeholder="Enter is salarie here...">
        {!! $errors->first('isSalarie', '<p class="help-block">:message</p>') !!}
    </div>
</div>

