<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Writer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response(Request $request, Collection $data, string $viewName) {
        $format = $this->parseFormat($request);

        if($format === 'html') {
            return view($viewName, [ 'data' => $data ]);
        } else if($format === 'csv') {
            $contents = $this->formatCsv($data);
            $filename = $viewName . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response($contents, 200, [
                'Content-Type' => 'text/csv',
                'Content-Transfer-Encoding' => 'binary',
                'Content-Disposition' => 'attachment; filename="' . $viewName . '.csv"',
            ]);
        }

        return response()->json($data);
    }

    public function formatCsv(Collection $data): string {
        if($data->count() === 0) return '';
        
        $csv = Writer::createFromFileObject(new \SplTempFileObject);

        $csv->insertOne(array_keys($data[0]->getAttributes()));

        foreach ($data as $item) {
            $values = $item->toArray();
            foreach($values as $key => $val) {
                if ( is_array($val) ) $values[$key] = '';
            }
            $csv->insertOne($values);
        }

        return $csv->getContent();
    }

    public function parseFormat(Request $request): string {
        $formats = ['text/csv' => 'csv', 'application/json' => 'json', 'text/html' => 'html'];
        $accept = $request->header('accept');
        $fmt = $request->input('fmt');

        if( !is_null($fmt) ) {
            return $fmt;
        }

        foreach($formats as $mime => $format) {
            if( strpos($accept, $mime) !== false ) {
                return $format;
            }
        }
    }
}
