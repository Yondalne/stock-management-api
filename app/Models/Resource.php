<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity'
    ];

    public function providers() {
        return $this->belongsToMany(Provider::class);
    }

    public function operations() {
        return $this->belongsToMany(Operation::class)->withPivot('used_qty');
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
