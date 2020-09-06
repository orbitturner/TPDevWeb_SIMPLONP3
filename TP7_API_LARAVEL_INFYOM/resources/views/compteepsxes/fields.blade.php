<!-- Owner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_id', 'Owner Id:') !!}
    {!! Form::number('owner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Accountnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accountNumber', 'Accountnumber:') !!}
    {!! Form::text('accountNumber', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Clerib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cleRIB', 'Clerib:') !!}
    {!! Form::number('cleRIB', null, ['class' => 'form-control']) !!}
</div>

<!-- Solde Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solde', 'Solde:') !!}
    {!! Form::number('solde', null, ['class' => 'form-control']) !!}
</div>

<!-- Datecreation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateCreation', 'Datecreation:') !!}
    {!! Form::text('dateCreation', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Activedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activeDate', 'Activedate:') !!}
    {!! Form::text('activeDate', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nextremundate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nextRemunDate', 'Nextremundate:') !!}
    {!! Form::text('nextRemunDate', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Closedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('closeDate', 'Closedate:') !!}
    {!! Form::text('closeDate', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Iduser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Iduser:') !!}
    {!! Form::number('idUser', null, ['class' => 'form-control']) !!}
</div>

<!-- Hostagency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hostAgency', 'Hostagency:') !!}
    {!! Form::number('hostAgency', null, ['class' => 'form-control']) !!}
</div>

<!-- Idopeningfees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idOpeningFees', 'Idopeningfees:') !!}
    {!! Form::number('idOpeningFees', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('compteepsxes.index') }}" class="btn btn-default">Cancel</a>
</div>
