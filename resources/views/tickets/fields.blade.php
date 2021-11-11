<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('priority', 'Priorité:') !!}
    {!! Form::select('priority', $prioritys, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('statut', 'Statut:') !!}
    {!! Form::select('status_id', $status, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','minlength' => 10]) !!}
</div>