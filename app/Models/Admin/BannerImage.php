<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Banner;
use Helper;

class BannerImage extends Model
{
    protected $fillable = [ 'banner_id', 'image', 'mobile_image', 'link', 'status' ];

    public $banner_image_path = 'images/banners/';

    public function banner() {
        return $this->belongsTo(Banner::class);
    }

    public function getBannerImages($request) {
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $banners_query = $this->with('banner');

        if (isset($request['search'])) {
            $banners_query = $banners_query->whereHas('banner', function($query) use ($request){
                $query->where('name', 'LIKE', "%{$request['search']}%");
            });
        }

        if (isset($request['banner_type'])) {
            $banners_query = $banners_query->whereHas('banner', function($query) use ($request){
                $query->where('type', $request['banner_type']);
            });
        }

        return $banners_query->paginate($perPage);
    }

    public function getBannerImage($request) {
        return $this->where('id', $request['banner_image_id'])->with('banner')->first();
    }

    public function createBannerImage($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        $data['image'] = $this->banner_image_path.Helper::uploadImageBase64($data['image'],'banner','banners');
        $data['mobile_image'] = $this->banner_image_path.Helper::uploadImageBase64($data['mobile_image'],'banner','banners');
        return $this->create($data);
    }

    public function updateBannerImage($request) {
        $data = [];
        foreach ($this->fillable as $column) {
            if (isset($request[$column])) {
                $data[$column] = $request[$column];
            }
        }
        if (isset($data['image'])) {
            $data['image'] = $this->banner_image_path.Helper::uploadImageBase64($data['image'],'banner','banners');
        }
        if (isset($data['mobile_image'])) {
            $data['mobile_image'] = $this->banner_image_path.Helper::uploadImageBase64($data['mobile_image'],'banner','banners');
        }
        return $this->where('id', $request['banner_image_id'])->update($data);
    }

    public function deleteBannerImage($request) {
        return $this->where('id', $request['banner_image_id'])->delete();
    }
}
