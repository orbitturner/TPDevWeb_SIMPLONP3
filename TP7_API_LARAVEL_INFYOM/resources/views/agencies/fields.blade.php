<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Creationdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('creationDate', 'Creationdate:') !!}
    {!! Form::text('creationDate', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Lieu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lieu', 'Lieu:') !!}
    {!! Form::text('lieu', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Numagency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numAgency', 'Numagency:') !!}
    {!! Form::text('numAgency', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('agencies.index') }}" class="btn btn-default">Cancel</a>
</div>
