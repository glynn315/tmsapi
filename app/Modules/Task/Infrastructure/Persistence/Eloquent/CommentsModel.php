<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CommentsModel extends Model
{
    protected $table = 'comment_list';

    protected $primaryKey = 'comment_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'comment_description',
        'comment_attachment',
        'task_id',
        'comment_status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if (!$model->comment_id) {
                $model->comment_id = (string)Str::uuid();
            }
        });
    }
}
