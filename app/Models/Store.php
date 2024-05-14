<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $table = 'stores';

    protected $fillable = [
        'name',
        'address',
        'active'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'store_id', 'id');
    }
}
