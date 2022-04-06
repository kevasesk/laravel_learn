<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'url'
    ];

    public function getContentFormatted()
    {
        $formatted = substr(strip_tags($this->content), 0, 255 * 4);//TODO can be improved (remove spaces, tabs, new lines correctly)
        return $formatted . (strlen($formatted) > 255 * 4 ? '...' : '');
    }
}
