<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ticket
 * @package App\Models
 * @version November 11, 2021, 12:25 pm UTC
 *
 * @property string $title
 * @property string $description
 */
class Ticket extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tickets';
    

    protected $dates = ['deleted_at'];

    const PRIORITY = [
        1 => 'Faible',
        2 => 'Moyen',
        3 => 'Elevé'
    ];

    public $fillable = [
        'title',
        'description',
        'priority',
        'type_id',
        'user_id',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'priority' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:10'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Type()
    {
        return $this->belongsTo(Type::class);
    }

    public function Status()
    {
        return $this->belongsTo(Status::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
