<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ContactNoteRepository;
use App\Services\CRUDService\CRUDAbstract;
use Illuminate\Http\Request;

/**
 * Class ContactNoteService
 *
 * @package App\Services
 */
class ContactNoteService extends CRUDAbstract
{
    /**
     * @var ContactNoteRepository
     */
    protected $repository;

    /**
     * ContactNoteService constructor.
     *
     * @param ContactNoteRepository $contactNoteRepository
     */
    public function __construct(ContactNoteRepository $contactNoteRepository)
    {
        $this->repository = $contactNoteRepository;
    }

    /**
     * @param Request $request
     * @param         $contactId
     *
     * @return mixed
     */
    public function createContactNote(Request $request, $contactId)
    {
        $data = $request->all();
        $data['contact_id'] = $contactId;

        return $this->repository->createContactNote($data);
    }
}
