<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @author Mateusz Kozikowski <matkozikowski@gmail.com>
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'status',
    ];

    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
