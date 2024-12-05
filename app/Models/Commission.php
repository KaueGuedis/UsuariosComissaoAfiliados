<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['affiliate_id', 'valor', 'data'];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
