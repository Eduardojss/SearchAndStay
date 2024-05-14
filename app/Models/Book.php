<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $table = 'books';

    protected $fillable = [
        'name',
        'ISBN',
        'value'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

}
