<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ContactRepository;
use App\Services\CRUDService\CRUDAbstract;
use Illuminate\Http\Request;

/**
 * Class ContactService
 *
 * @package App\Services
 */
class ContactService extends CRUDAbstract
{
    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * ContactService constructor.
     *
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->repository = $contactRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(Request $request)
    {
        return $this->repository->all([], [
            'notes' => function ($q) {
                $q->orderBy('updated_at', 'DESC');
            }
        ]);
    }
}
