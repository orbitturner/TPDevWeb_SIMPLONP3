
<div class="form-group {{ $errors->has('owner_id') ? 'has-error' : '' }}">
    <label for="owner_id" class="col-md-2 control-label">Owner</label>
    <div class="col-md-10">
        <select class="form-control" id="owner_id" name="owner_id">
        	    <option value="" style="display: none;" {{ old('owner_id', optional($compteepsx)->owner_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select owner</option>
        	@foreach ($Clientphysiques as $key => $Clientphysique)
			    <option value="{{ $key }}" {{ old('owner_id', optional($compteepsx)->owner_id) == $key ? 'selected' : '' }}>
			    	{{ $Clientphysique }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('accountNumber') ? 'has-error' : '' }}">
    <label for="accountNumber" class="col-md-2 control-label">Account Number</label>
    <div class="col-md-10">
        <input class="form-control" name="accountNumber" type="text" id="accountNumber" value="{{ old('accountNumber', optional($compteepsx)->accountNumber) }}" min="1" max="100" required="true" placeholder="Enter account number here...">
        {!! $errors->first('accountNumber', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cleRIB') ? 'has-error' : '' }}">
    <label for="cleRIB" class="col-md-2 control-label">Cle R I B</label>
    <div class="col-md-10">
        <input class="form-control" name="cleRIB" type="number" id="cleRIB" value="{{ old('cleRIB', optional($compteepsx)->cleRIB) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter cle r i b here...">
        {!! $errors->first('cleRIB', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('solde') ? 'has-error' : '' }}">
    <label for="solde" class="col-md-2 control-label">Solde</label>
    <div class="col-md-10">
        <input class="form-control" name="solde" type="number" id="solde" value="{{ old('solde', optional($compteepsx)->solde) }}" min="-9" max="9" required="true" placeholder="Enter solde here...">
        {!! $errors->first('solde', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dateCreation') ? 'has-error' : '' }}">
    <label for="dateCreation" class="col-md-2 control-label">Date Creation</label>
    <div class="col-md-10">
        <input class="form-control" name="dateCreation" type="text" id="dateCreation" value="{{ old('dateCreation', optional($compteepsx)->dateCreation) }}" minlength="1" maxlength="255" required="true" placeholder="Enter date creation here...">
        {!! $errors->first('dateCreation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('activeDate') ? 'has-error' : '' }}">
    <label for="activeDate" class="col-md-2 control-label">Active Date</label>
    <div class="col-md-10">
        <input class="form-control" name="activeDate" type="text" id="activeDate" value="{{ old('activeDate', optional($compteepsx)->activeDate) }}" maxlength="255" placeholder="Enter active date here...">
        {!! $errors->first('activeDate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nextRemunDate') ? 'has-error' : '' }}">
    <label for="nextRemunDate" class="col-md-2 control-label">Next Remun Date</label>
    <div class="col-md-10">
        <input class="form-control" name="nextRemunDate" type="text" id="nextRemunDate" value="{{ old('nextRemunDate', optional($compteepsx)->nextRemunDate) }}" minlength="1" maxlength="255" required="true" placeholder="Enter next remun date here...">
        {!! $errors->first('nextRemunDate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('closeDate') ? 'has-error' : '' }}">
    <label for="closeDate" class="col-md-2 control-label">Close Date</label>
    <div class="col-md-10">
        <input class="form-control" name="closeDate" type="text" id="closeDate" value="{{ old('closeDate', optional($compteepsx)->closeDate) }}" maxlength="255" placeholder="Enter close date here...">
        {!! $errors->first('closeDate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idUser') ? 'has-error' : '' }}">
    <label for="idUser" class="col-md-2 control-label">Id User</label>
    <div class="col-md-10">
        <select class="form-control" id="idUser" name="idUser">
        	    <option value="" style="display: none;" {{ old('idUser', optional($compteepsx)->idUser ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id user here...</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('idUser', optional($compteepsx)->idUser) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('idUser', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hostAgency') ? 'has-error' : '' }}">
    <label for="hostAgency" class="col-md-2 control-label">Host Agency</label>
    <div class="col-md-10">
        <select class="form-control" id="hostAgency" name="hostAgency" required="true">
        	    <option value="" style="display: none;" {{ old('hostAgency', optional($compteepsx)->hostAgency ?: '') == '' ? 'selected' : '' }} disabled selected>Enter host agency here...</option>
        	@foreach ($Agencies as $key => $Agency)
			    <option value="{{ $key }}" {{ old('hostAgency', optional($compteepsx)->hostAgency) == $key ? 'selected' : '' }}>
			    	{{ $Agency }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('hostAgency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idOpeningFees') ? 'has-error' : '' }}">
    <label for="idOpeningFees" class="col-md-2 control-label">Id Opening Fees</label>
    <div class="col-md-10">
        <select class="form-control" id="idOpeningFees" name="idOpeningFees">
        	    <option value="" style="display: none;" {{ old('idOpeningFees', optional($compteepsx)->idOpeningFees ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id opening fees here...</option>
        	@foreach ($Openingfees as $key => $Openingfee)
			    <option value="{{ $key }}" {{ old('idOpeningFees', optional($compteepsx)->idOpeningFees) == $key ? 'selected' : '' }}>
			    	{{ $Openingfee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('idOpeningFees', '<p class="help-block">:message</p>') !!}
    </div>
</div>

