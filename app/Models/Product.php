<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $color_id
 * @property string $sku
 * @property string $description
 * @property string $size
 * @property string $image
 * @property boolean $is_sold
 * @property string $created_at
 * @property string $updated_at
 * @property Color $color
 * @property Post[] $posts
 * @property ProductTransaction[] $productTransactions
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['color_id', 'sku', 'description', 'size', 'image', 'is_sold', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTransactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
