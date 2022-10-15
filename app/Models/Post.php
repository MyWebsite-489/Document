<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property LongText $content
 * @property string $thumbnail
 * @property int $number_view
 * @property enum $status
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';
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
        'content',
        'thumbnail',
        'number_view',
        'status',
        'created_at',
        'updated_at',
    ];
    const STATUS = [
        STATUS_PUBLISH => STATUS_PUBLISH,
        STATUS_DRAFT => STATUS_DRAFT,
    ];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_posts');
    }
}
