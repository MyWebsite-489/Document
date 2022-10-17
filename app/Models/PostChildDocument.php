<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * class PostChildDocument
*/
class PostChildDocument extends Model
{
    use SoftDeletes;
    protected $table = 'post_child_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'topic_document_id',
        'name',
        'description',
        'content',
        'status',
        'created_at',
        'updated_at',
    ];
    const STATUS = [
        1 => STATUS_PUBLISH,
        2 => STATUS_DRAFT,
    ];
    public function topicDocument()
    {
        return $this->belongsTo(TopicDocument::class);
    }
}
