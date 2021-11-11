
<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $ticket->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $ticket->description }}</p>
</div>

<!-- Statut Field -->
<div class="col-sm-12">
    {!! Form::label('statut', 'Statut:') !!}
    <p>{{ $ticket->status->libelle }}</p>
</div>

<!-- priority Field -->
<div class="col-sm-12">
    {!! Form::label('priorité', 'Priorité:') !!}
    <p>{{ App\Models\Ticket::PRIORITY[$ticket->priority] }}</p>
</div>

<!-- updated_at Field -->
<div class="col-sm-12">
    {!! Form::label('dernière activité', 'Dernière activité:') !!}
    <p>{{ $ticket->user->name . ' le ' . \Carbon\Carbon::parse($ticket->updated_at)->format('d/m/Y') }}</p>
</div>


