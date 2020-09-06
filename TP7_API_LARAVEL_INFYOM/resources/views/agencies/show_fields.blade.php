<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $agency->nom }}</p>
</div>

<!-- Creationdate Field -->
<div class="form-group">
    {!! Form::label('creationDate', 'Creationdate:') !!}
    <p>{{ $agency->creationDate }}</p>
</div>

<!-- Lieu Field -->
<div class="form-group">
    {!! Form::label('lieu', 'Lieu:') !!}
    <p>{{ $agency->lieu }}</p>
</div>

<!-- Numagency Field -->
<div class="form-group">
    {!! Form::label('numAgency', 'Numagency:') !!}
    <p>{{ $agency->numAgency }}</p>
</div>

