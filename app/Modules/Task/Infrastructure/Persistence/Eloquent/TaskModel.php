<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TaskModel extends Model
{
    protected $table = 'task_information';

    protected $primaryKey = 'task_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'task_label',
        'task_description',
        'task_status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->task_id) {
                $model->task_id = (string) Str::uuid();
            }
        });
    }
}
