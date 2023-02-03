<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }
}
