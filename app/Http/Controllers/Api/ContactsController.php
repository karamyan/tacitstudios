<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Services\ContactNoteService;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;

/**
 * Class ContactsController
 *
 * @package App\Http\Controllers\Api
 */
class ContactsController extends CRUDController
{
    /**
     * @var ContactService
     */
    private $contactService;
    /**
     * ContactsController constructor.
     *
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService, ContactNoteService $contactNoteService)
    {
        parent::__construct($contactService);
        $this->contactService = $contactService;
        $this->contactNoteService = $contactNoteService;
    }

    /**
     * @param Request $request
     * @param int     $contactId
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function createContactNote(Request $request, int $contactId)
    {
        $isValid =  Validator::make(
            [
                'contact_id' => $contactId,
                'notes' => $request->get('notes')
            ],
            [
                'contact_id' => 'integer|exists:pgsql.contacts',
                'notes' => 'required|string'
            ]
        );

        if (!$isValid->passes()) {
            return response([
                'success' => false,
                'message' => $isValid->errors(),
                'data' => []
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->contactNoteService->createContactNote($request, $contactId);
    }

    /**
     * @param int $noteId
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteNote(int $noteId)
    {
        return $this->contactNoteService->delete($noteId);
    }

    /**
     * @param Request $request
     * @param int     $noteId
     *
     * @return \Illuminate\Http\Response
     */
    public function updateNote(Request $request, int $noteId)
    {
        $isValid = Validator::make(
            [
                'note_id' => $noteId,
                'notes' => $request->get('notes')
            ],
            [
                'note_id' => 'integer|exists:pgsql.contact_notes',
                'notes' => 'required|string'
            ],
        );

        if (!$isValid->passes()) {
            return response([
                'success' => false,
                'message' => $isValid->errors(),
                'data' => []
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->contactNoteService->update($request, $noteId);
    }
}
