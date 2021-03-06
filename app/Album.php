<?php

namespace App;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Model;

/**
 * @property MoneyMoney $full_album_price
 */
class Album extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'full_album_price' => Money::class,
        'has_explicit_lyrics' => 'bool',
        'is_active' => 'bool',
        'year' => 'int',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)
            ->withTimestamps();
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleter_id');
    }

    public function copiesSold()
    {
        return $this->morphMany(OrderItem::class, 'orderable');
    }
}
