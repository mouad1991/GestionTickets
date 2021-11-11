<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateticketRequest;
use App\Http\Requests\UpdateticketRequest;
use App\Repositories\ticketRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Type;
use Illuminate\Http\Request;
use Flash;
use Response;

class ticketController extends AppBaseController
{
    /** @var  ticketRepository */
    private $ticketRepository;

    public function __construct(ticketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
        $this->status = Status::all()->pluck('libelle', 'id')->toArray();
        $this->types  = Type::all()->pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of the ticket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tickets = $this->ticketRepository->all();

        return view('tickets.index')
            ->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return Response
     */
    public function create()
    {
        return view('tickets.create')->with([
            'types' => $this->types,
            'prioritys' => Ticket::PRIORITY,
            'status' => $this->status,
        ]);
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param CreateticketRequest $request
     *
     * @return Response
     */
    public function store(CreateticketRequest $request)
    {
        $input = $request->all();

        $ticket = $this->ticketRepository->create($input);

        Flash::success('Ticket saved successfully.');

        return redirect(route('tickets.index'));
    }

    /**
     * Display the specified ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('tickets.index'));
        }

        return view('tickets.show')->with('ticket', $ticket);
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('tickets.index'));
        }
        return view('tickets.edit')->with([
                'ticket' => $ticket,
                'types' => $this->types,
                'prioritys' => Ticket::PRIORITY,
                'status' => $this->status
            ]);
    }

    /**
     * Update the specified ticket in storage.
     *
     * @param int $id
     * @param UpdateticketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateticketRequest $request)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('tickets.index'));
        }

        $ticket = $this->ticketRepository->update($request->all(), $id);

        Flash::success('Ticket updated successfully.');

        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified ticket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('tickets.index'));
        }

        $this->ticketRepository->delete($id);

        Flash::success('Ticket deleted successfully.');

        return redirect(route('tickets.index'));
    }
}
