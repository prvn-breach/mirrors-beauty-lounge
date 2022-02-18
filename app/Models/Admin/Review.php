<?php
namespace App\Models\Admin;

use App\Helpers\ExcelResponse;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [ 'user_id', 'order_id', 'product_id', 'star', 'title', 'description', 'item_id', 'approved' ];

    protected function serializeDate(\DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }


    public function product() {
        return $this->belongsTo(ProductCatlog::class)->withTrashed();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getProductReviews($request) {
        $order = [];
        $perPage = 10;
        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        $reviews = $this->has('product')->with(['product','user']);

        if (isset($request['created_by'])) {
            $reviews->whereHas('product', function($query) use ($request) {
                $query->where('created_by', $request['created_by']);
            });
        }

        if (isset($request['search'])) {
            $reviews->whereHas('product', function($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request['search']}%")
                    ->orWhere('product_code', 'LIKE', "%{$request['search']}%");
            })->orWhereHas('user', function($query) use ($request) { 
                $query->where('email', 'LIKE', "%{$request['search']}%");
            })
            ->orWhere('title', 'LIKE', "%{$request['search']}%")
            ->orWhere('description', 'LIKE', "%{$request['search']}%")
            ->orWhere('star', 'LIKE', "%{$request['search']}%");
        }

        if ($perPage == 'all') {
            $reviews = $reviews->get();
        } else {
            $reviews = $reviews->paginate($perPage);
        }

        // Excel Download
        if (isset($request['response_type'])) {
            $columns = [ 'Date', 'Product Code', 'Product name', 'Customer Email', 'Review Title', 'Review Description', 'Rating', 'Reply Review', 'Approved' ];
            $rows = [];
            foreach($reviews as $review) {
                array_push($rows, [ 
                    $review['created_at'], $review['product']['product_code'], $review['product']['name'],
                    $review['user']['email'], $review['title'], $review['description'],
                    $review['star'], $review['reply_message'], $review['approved']
                ]);
            }
            return ExcelResponse::export('ProductReviews', $rows, $columns, 'ProductReviews');
        }

        return $reviews;
    }

    public function getProductReview($request) {
        return $this->where('id', $request['review_id'])->first();
    }

    public function updateProductReview($request) {
        $data = $request->all();
        $review_id = $data['review_id'];
        unset($data['review_id']);
        return $this->where('id', $review_id)->update($data);
    }

    public function deleteProductReview($request) {
        return $this->where('id', $request['review_id'])->delete();
    }

    public function deleteProductReviews($request) {
        if ($request['product_review_id']) {
            return $this->where('id', $request['product_review_id'])->delete();
        }

        if ($request['product_review_ids']) {
            return $this->whereIn('id', $request['product_review_ids'])->delete();
        }
        
        return true;
    }
}
