<div class="table-responsive">
    <table class="table" id="tickets-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priorité</th>
                <th>Dernière activité</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->type->name }}</td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->status->libelle }}</td>
                <td>{{ App\Models\Ticket::PRIORITY[$ticket->priority] }}</td>
                <td>{{ $ticket->user->name . ' le ' . \Carbon\Carbon::parse($ticket->updated_at)->format('d/m/Y') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tickets.show', [$ticket->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tickets.edit', [$ticket->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous êtes sûr?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
