<?php
namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Import\ImportService;

class ImportController extends Controller
{
    function __construct(ImportService $importService){
		$this->importService = $importService;
	}

    public function import(Request $request) {
        return $this->importService->import($request);
    }
}