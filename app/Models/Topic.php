<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Topic
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $thumbnail
 * @property int $user_id
 * @property enum $status
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Topic extends Model
{
    use SoftDeletes;
    protected $table = 'topics';
    /**
     * Define primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'alias',
        'description',
        'thumbnail',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];

    const STATUS = [
        STATUS_PUBLISH => STATUS_PUBLISH,
        STATUS_DRAFT => STATUS_DRAFT,
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'topic_posts');
    }
}
