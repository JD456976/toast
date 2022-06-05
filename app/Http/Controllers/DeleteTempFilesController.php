<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Services\FilepondService;

class DeleteTempFilesController extends Controller
{
    public function delete(Request $request, FilepondService $service)
    {
        $file = $service->retrieve($request->getContent())->filepath;

        Files::deleteTemp($service->retrieve($request->getContent())->id);

        Storage::delete($file);

        return Response::make('File Deleted', 200, ['content-type' => 'text/plain']);
    }
}
