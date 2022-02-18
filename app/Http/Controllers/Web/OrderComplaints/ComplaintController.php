<?php
namespace App\Http\Controllers\Web\OrderComplaints;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Web\OrderComplaints\ComplaintService;

class ComplaintController extends Controller
{
    function __construct(ComplaintService $complaintService){
		$this->complaintService = $complaintService;
	}

    public function createComplaint(Request $request) {
        return $this->complaintService->createComplaint($request);
    }
}