<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class GadForm extends Model
{
    protected $fillable = [
    	'project_id',
        'uuid',
        'file_name',
        'file_path',
        'file_size',
        'file_extension',
        'file_type',
        'file_path',
        'dropbox_link',
        'remarks',
        'uploaded_by'
    ];

    protected $casts = [
        'dropbox_link' => 'array'
    ];

    public function project(): BelongsTo
    {
    	return $this->belongsTo(Project::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class,'uploaded_by','id');
    }

    public function deleter(): BelongsTo
    {
        return $this->belongsTo(User::class,'uploaded_by','id');
    }
}
