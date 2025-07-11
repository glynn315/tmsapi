<?php

namespace App\Modules\Task\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AttachmentModel extends Model
{
    protected $table = 'task_attachment';

    protected $primaryKey = 'attachment_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'details_attachment',
        'details_status',
        'task_id',
    ];
}
