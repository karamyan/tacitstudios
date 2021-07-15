<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Constants\Setting;
use App\Models\ContactNote;

/**
 * Class ContactNoteRepository
 *
 * @package App\Repositories
 */
class ContactNoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected array $meta = [
        'perPage' => setting::PAGE_SIZE,
        'columns' => setting::COLUMNS,
        'orderType' => setting::ASC,
        'orderBy' => setting::DEFAULT_ORDER,
    ];

    /**
     * @var array|string[]
     */
    protected array $fillable = [
        'notes', 'contact_id'
    ];

    /**
     * ContactNoteRepository constructor.
     *
     * @param ContactNote $contactNote
     */
    public function __construct(ContactNote $contactNote)
    {
        $this->model = $contactNote;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function createContactNote(array $data)
    {
        return $this->model->create($data);
    }
}
