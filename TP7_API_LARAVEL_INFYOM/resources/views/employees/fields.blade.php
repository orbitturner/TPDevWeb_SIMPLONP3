<!-- Numemployee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numEmployee', 'Numemployee:') !!}
    {!! Form::text('numEmployee', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni', 'Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sexe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexe', 'Sexe:') !!}
    {!! Form::text('sexe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service', 'Service:') !!}
    {!! Form::text('service', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Datenaiss Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateNaiss', 'Datenaiss:') !!}
    {!! Form::text('dateNaiss', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Iduser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Iduser:') !!}
    {!! Form::number('idUser', null, ['class' => 'form-control']) !!}
</div>

<!-- Agencyhost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agencyhost', 'Agencyhost:') !!}
    {!! Form::number('agencyhost', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('employees.index') }}" class="btn btn-default">Cancel</a>
</div>
