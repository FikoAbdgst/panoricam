<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameImage extends Model
{
    use HasFactory;

    protected $fillable = ['id_frame', 'frame1', 'frame2', 'frame3', 'frame4'];

    public function frame()
    {
        return $this->belongsTo(Frame::class, 'id_frame');
    }
}
