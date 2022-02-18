<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = [ 'list_type', 'menu_name', 'slug', 'page_title', 'page_content', 'status', 'seo_title', 'seo_keywords', 'seo_page_content' ];

    public function getCMSPages($request) {
        $cms_pages_query = $this;

        if (isset($request['list_type'])) {
            $cms_pages_query = $cms_pages_query->where('list_type', $request['list_type']);
        }

        return $cms_pages_query->where('status', 1)->get();
    }

    public function getCMSPage($request) {
        return $this->where('slug', $request['slug'])
            ->where('status', 1)
            ->first();
    }
}