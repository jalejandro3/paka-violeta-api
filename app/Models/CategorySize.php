<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $size
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 */
class CategorySize extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'size', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
