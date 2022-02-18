<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class NewsletterSubscriber extends Model
{
    protected $fillable = [ 'email' ];

    public function getNewsletters($request) {
        $news_letters = $this;
        $perPage = 10;

        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['search'])) {
            $news_letters = $news_letters->where('email', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $news_letters = $news_letters->get();
            $columns = [ 'ID', 'Email' ];
            $rows = [];
            foreach ($news_letters as $subscriber) {
                array_push($rows, [ $subscriber['id'], $subscriber['email'] ]);
            }
            return ExcelResponse::export('NewsLetters', $rows, $columns, 'NewsLetters');
        }

        if ($perPage == 'all') {
            return $news_letters->get();
        }

        return $news_letters->paginate($perPage);
    }
}