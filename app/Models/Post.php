<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $post_type_id
 * @property string $url_id
 * @property string $created_at
 * @property string $updated_at
 * @property PostType $postType
 * @property Product $product
 * @property User $user
 * @property PostTransaction[] $postTransactions
 */
class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'post_type_id', 'url_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postType()
    {
        return $this->belongsTo('App\Models\PostType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postTransactions()
    {
        return $this->hasMany('App\Models\PostTransaction');
    }
}
