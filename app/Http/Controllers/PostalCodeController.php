<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostalCodeController extends Controller
{
    public function handleForm(Request $request)
    {
        if (!$request->input('code')) return (view('welcome'));

        $city = "";
        $givenCode = (int)$request->input('code');
        $data = $this->getData();
        foreach ($data as $cities) {
            foreach ($cities as $c) {
                if ((int)$c['IRSZ'] == $givenCode) $city = $c;
            }
        }

        if ($city == "") return view('welcome', ['result' => 'helytelen']);

        return view('welcome', [
            'result' => $city
        ]);
    }

    private function getData()
    {
        $viewData = [];
        $path = 'data.json';

        try {

            $jsonString = Storage::get($path);

            $decodedData = json_decode($jsonString, true);

            if (isset($decodedData[0])) {
                $viewData['items'] = $decodedData;
            } else {
                $viewData['items'] = [$decodedData];
            }
        } catch (Exception $e) {
            $viewData['error'] = 'Hiba történt a fájl olvasása közben: ' . $e->getMessage();
        }

        return $viewData;
    }
}
