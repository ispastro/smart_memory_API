<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'item_name',
        'location',
        'notes',
        'photo_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($query)
    {
        return self::where('item_name', 'like', "%$query%")
            ->orWhere('location', 'like', "%$query%")
            ->get();
    }
}