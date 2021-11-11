<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecommentRequest;
use App\Repositories\commentRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Ticket;
use Flash;
use Response;

class commentController extends AppBaseController
{
    /** @var  commentRepository */
    private $commentRepository;

    public function __construct(commentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param CreatecommentRequest $request
     *
     * @return Response
     */
    public function store(CreatecommentRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        Flash::success('Comment saved successfully.');

        return redirect(route('tickets.show', ['ticket' => $input['ticket_id']]));
    }
}
