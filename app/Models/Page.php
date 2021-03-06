<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class Page extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'content',
        'is_active'
    ];

    public function getContentFormatted()
    {
        $formatted = substr(strip_tags($this->content), 0, 255 * 4);//TODO can be improved (remove spaces, tabs, new lines correctly)
        return $formatted . (strlen($formatted) > 255 * 4 ? '...' : '');
    }
    public function getUrl()
    {
        $redirect = Redirect::query()
            ->where('entity_id','=', $this->id)
            ->where('type','=', Redirect::TYPE_PAGE)
            ->first()
        ;
        return url($redirect->url);
    }
}
