<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $content
 * @property enum $status
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'contacts';
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
        'fullname',
        'phone',
        'email',
        'content',
        'status',
        'created_at',
        'updated_at',
    ];

    const STATUS = [
        'Unprocessed' => 'Chưa xử lý',
        'Processing' => 'Đang xử lý',
        'Processed' => 'Đã xử lý'
    ];
}
