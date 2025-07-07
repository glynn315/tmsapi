<?php

namespace App\Modules\User\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    protected $table = 'user_account';

    protected $primaryKey = 'user_id'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'user_Role',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->user_id) {
                $model->user_id = (string) Str::uuid();
            }
        });
    }
}
