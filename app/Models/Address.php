<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $table = "addresses";
    protected $keyType = "int";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;

    protected $guarded = ["id"];


    public function contacts(): BelongsTo {
        return $this->belongsTo(Address::class, "contact_id", "id");
    }
}
