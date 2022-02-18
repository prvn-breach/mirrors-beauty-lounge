<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = [ 'list_type', 'menu_name', 'slug', 'page_title', 'page_content', 'status', 'seo_title', 'seo_keywords', 'seo_page_content' ];

    public function createCMSPage($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        return $this->create($data);
    }

    public function getCMSPages($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $cms_pages_query = $this;

        if (isset($request['list_type'])) {
            $cms_pages_query = $cms_pages_query->where('list_type', $request['list_type']);
        }

        if (isset($request['search'])) {
            $cms_pages_query = $cms_pages_query->where('page_title', 'LIKE', "%{$request['search']}%");
        }

        return $cms_pages_query->paginate($perPage);
    }

    public function getCMSPage($request) {
        return $this->where('id', $request['cms_page_id'])->first();
    }

    public function updateCMSPage($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        return $this->where('id', $request['cms_page_id'])->update($data);
    }

    public function deleteCMSPage($request) {
        return $this->where('id', $request['cms_page_id'])->delete();
    }
}