<?php
namespace App\Services\Web\OrderComplaints;

use App\Models\Web\Complaint;
use Response,Helper;

class ComplaintService
{
	function __construct(Complaint $complaint){
		$this->complaint = $complaint;
 	}

    public function createComplaint($request) {
        $complaint = $this->complaint->createComplaint($request);
        return Response::json([ 'status'=> 200,'data'=> $complaint]);
    }
}