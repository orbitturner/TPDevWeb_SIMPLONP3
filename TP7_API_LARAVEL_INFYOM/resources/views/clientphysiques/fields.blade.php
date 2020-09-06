<!-- Numid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numId', 'Numid:') !!}
    {!! Form::text('numId', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni', 'Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sexe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexe', 'Sexe:') !!}
    {!! Form::text('sexe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Datenaiss Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateNaiss', 'Datenaiss:') !!}
    {!! Form::text('dateNaiss', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Datecreation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateCreation', 'Datecreation:') !!}
    {!! Form::text('dateCreation', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Features Field -->
<div class="form-group col-sm-6">
    {!! Form::label('features', 'Features:') !!}
    {!! Form::text('features', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Issalarie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isSalarie', 'Issalarie:') !!}
    {!! Form::text('isSalarie', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientphysiques.index') }}" class="btn btn-default">Cancel</a>
</div>
