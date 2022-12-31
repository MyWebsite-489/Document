<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $href
 * @property string $description
 * @property string $thumbnail
 * @property enum $status
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Slider extends Model
{
    use SoftDeletes;
    protected $table = 'sliders';
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
        'href',
        'description',
        'thumbnail',
        'status',
        'created_at',
        'updated_at',
    ];
    const STATUS = [
        'publish' => 'publish',
        'draft' => 'draft',
    ];
}
