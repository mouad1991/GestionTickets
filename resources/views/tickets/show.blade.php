@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ticket Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('tickets.index') }}">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="row justify-content-center">
        <div class="col-7">
            <div class="content px-3">
                <div class="card">
                    <div class="card-body"> 
                        @foreach($ticket->comments as $comment)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>
                                <span class="direct-chat-timestamp float-right">{{ \Carbon\Carbon::parse($comment->updated_at)->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="direct-chat-text">
                                    {{ $comment->content }}
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group col-sm-12 col-lg-12">
                            {!! Form::open(['route' => 'comments.store', 'method' => 'POST']) !!}
                            {!! Form::label('content', 'Ajouter un commentaire:') !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control','minlength' => 10, 'rows' => 2,]) !!}
                            {!! Form::hidden('ticket_id', $ticket->id) !!}
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary mt-2']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="content px-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('tickets.edit', [$ticket->id]) }}" class='btn btn-default btn-s float-right'>
                            <i class="far fa-edit"></i>
                        </a>
                        <div class="row">
                            @include('tickets.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
