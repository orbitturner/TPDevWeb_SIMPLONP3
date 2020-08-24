
<div class="form-group {{ $errors->has('numEmployee') ? 'has-error' : '' }}">
    <label for="numEmployee" class="col-md-2 control-label">Num Employee</label>
    <div class="col-md-10">
        <input class="form-control" name="numEmployee" type="text" id="numEmployee" value="{{ old('numEmployee', optional($employee)->numEmployee) }}" minlength="1" maxlength="255" required="true" placeholder="Enter num employee here...">
        {!! $errors->first('numEmployee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
    <label for="telephone" class="col-md-2 control-label">Telephone</label>
    <div class="col-md-10">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone', optional($employee)->telephone) }}" minlength="1" maxlength="255" required="true" placeholder="Enter telephone here...">
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($employee)->email) }}" minlength="1" maxlength="255" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cni') ? 'has-error' : '' }}">
    <label for="cni" class="col-md-2 control-label">Cni</label>
    <div class="col-md-10">
        <input class="form-control" name="cni" type="text" id="cni" value="{{ old('cni', optional($employee)->cni) }}" minlength="1" maxlength="255" required="true" placeholder="Enter cni here...">
        {!! $errors->first('cni', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
    <label for="adresse" class="col-md-2 control-label">Adresse</label>
    <div class="col-md-10">
        <input class="form-control" name="adresse" type="text" id="adresse" value="{{ old('adresse', optional($employee)->adresse) }}" minlength="1" maxlength="255" required="true" placeholder="Enter adresse here...">
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sexe') ? 'has-error' : '' }}">
    <label for="sexe" class="col-md-2 control-label">Sexe</label>
    <div class="col-md-10">
        <input class="form-control" name="sexe" type="text" id="sexe" value="{{ old('sexe', optional($employee)->sexe) }}" minlength="1" maxlength="255" required="true" placeholder="Enter sexe here...">
        {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
    <label for="service" class="col-md-2 control-label">Service</label>
    <div class="col-md-10">
        <input class="form-control" name="service" type="text" id="service" value="{{ old('service', optional($employee)->service) }}" minlength="1" maxlength="255" required="true" placeholder="Enter service here...">
        {!! $errors->first('service', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dateNaiss') ? 'has-error' : '' }}">
    <label for="dateNaiss" class="col-md-2 control-label">Date Naiss</label>
    <div class="col-md-10">
        <input class="form-control" name="dateNaiss" type="text" id="dateNaiss" value="{{ old('dateNaiss', optional($employee)->dateNaiss) }}" minlength="1" maxlength="255" required="true" placeholder="Enter date naiss here...">
        {!! $errors->first('dateNaiss', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idUser') ? 'has-error' : '' }}">
    <label for="idUser" class="col-md-2 control-label">Id User</label>
    <div class="col-md-10">
        <select class="form-control" id="idUser" name="idUser">
        	    <option value="" style="display: none;" {{ old('idUser', optional($employee)->idUser ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id user here...</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('idUser', optional($employee)->idUser) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('idUser', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('agencyhost') ? 'has-error' : '' }}">
    <label for="agencyhost" class="col-md-2 control-label">Agencyhost</label>
    <div class="col-md-10">
        <select class="form-control" id="agencyhost" name="agencyhost" required="true">
        	    <option value="" style="display: none;" {{ old('agencyhost', optional($employee)->agencyhost ?: '') == '' ? 'selected' : '' }} disabled selected>Enter agencyhost here...</option>
        	@foreach ($Agencies as $key => $Agency)
			    <option value="{{ $key }}" {{ old('agencyhost', optional($employee)->agencyhost) == $key ? 'selected' : '' }}>
			    	{{ $Agency }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('agencyhost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

