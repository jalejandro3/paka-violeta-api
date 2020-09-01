<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property CategorySize[] $categorySizes
 */
class Category extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizes()
    {
        return $this->hasMany(CategorySize::class);
    }
}
