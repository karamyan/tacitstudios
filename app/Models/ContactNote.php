<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactNote
 *
 * @package App\Models
 */
class ContactNote extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'contact_notes';

    /**
     * @var string[] $fillable
     */
    protected $fillable = ['notes', 'contact_id'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'note_id';
}
