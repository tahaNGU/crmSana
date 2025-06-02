<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service\StorageService;
use Illuminate\Http\Request;

class StorageController extends Controller
{
   public function __construct(
       private StorageService $storageService
   )
   {

   }

    public function download(Request $request)
    {
        $fileContent = $this->storageService->download($request->path);
        $headers = [
            'Content-Type' => $fileContent['mime'],
            'Content-Disposition' => 'attachment; filename="' . basename($request->path) . '"',
        ];
        return response($fileContent['content'], 200, $headers);
    }
}
