<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class comment
 * @package App\Models
 * @version November 11, 2021, 12:26 pm UTC
 *
 * @property string $content
 */
class Comment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'content',
        'user_id',
        'ticket_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'content' => 'required|min:10'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
