<?php
namespace App\Http\Controllers\Admin\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Export\ExportService;

class ExportController extends Controller
{
    function __construct(ExportService $exportService){
		$this->exportService = $exportService;
	}

    public function export(Request $request) {
        return $this->exportService->export($request);
    }
}