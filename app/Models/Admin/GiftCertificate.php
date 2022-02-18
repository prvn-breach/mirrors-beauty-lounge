<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ExcelResponse;

class GiftCertificate extends Model
{
    protected $fillable = [ 'certificate_title', 'certificate_code', 'start_date', 'end_date', 'logic', 'condition_amount', 'certificate_discount_type', 'discount', 'accessibility', 'status' ];

    public function getGiftCertificates($request) {
        $gift_certificates = $this;
        $perPage = 10;

        if (isset($request['perPage'])) {
            $perPage = $request['perPage'];
        }

        if (isset($request['search'])) {
            $gift_certificates = $gift_certificates->where('certificate_title', 'LIKE', "%{$request['search']}%");
        }

        if (isset($request['response_type'])) {
            $gift_certificates = $gift_certificates->get();
            $columns = [ 'ID', 'Certificate Title', 'Certificate Code', 'Start Date', 'End Date', 'Certificate Discount Type', 'Discount', 'Accessibility', 'status' ];
            $rows = [];
            foreach ($gift_certificates as $gift) {
                array_push($rows, [
                    $gift['id'], $gift['certificate_title'], $gift['certificate_code'],
                    $gift['start_date'], $gift['end_date'], $gift['certificate_discount_type'],
                    $gift['discount'], $gift['accessibility'], $gift['status']
                ]);
            }
            return ExcelResponse::export('GiftCertificates', $rows, $columns, 'GiftCertificates');
        }

        return $gift_certificates->paginate($perPage);
    }

    public function getGiftCertificate($request) {
        return $this->where('id', $request['gift_certificate_id'])->first();
    }

    public function createGiftCertificate($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->create($data);
    }

    public function updateGiftCertificate($request) {
        $data = [];
        foreach ($this->fillable as $index => $field) {
            if (isset($request[$field])) {
                $data[$field] = $request[$field];
            }
        }
        return $this->where('id', $request['gift_certificate_id'])->update($data);
    }

    public function deleteGiftCertificate($request) {
        return $this->where('id', $request['gift_certificate_id'])->delete();
    }
}