<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Contact;
use App\Models\ContactNote;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactRepository
 *
 * @package App\Repositories
 */
class ContactRepository extends BaseRepository
{
    /**
     * @var array|string[]
     */
    protected array $fillable = [
        'name'
    ];

    /**
     * ContactRepository constructor.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }
}
