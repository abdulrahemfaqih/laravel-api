<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = ["id"];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function addresses(): HasMany {
        return $this->hasMany(Address::class, "contact_id", "id");
    }
}
