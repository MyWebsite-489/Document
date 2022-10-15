<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicDocument extends Model
{
    use SoftDeletes;
    protected $table = 'topic_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at',
    ];
    const STATUS = [
        1 => STATUS_PUBLISH,
        2 => STATUS_DRAFT,
    ];

}
