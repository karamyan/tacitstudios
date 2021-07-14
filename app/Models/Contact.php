<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @package App\Models
 */
class Contact extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'contacts';

    /**
     * @var string[] $fillable
     */
    protected $fillable = ['name'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'contact_id';

    /**
     * Get contact notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(ContactNote::class, 'contact_id', 'contact_id');
    }
}
