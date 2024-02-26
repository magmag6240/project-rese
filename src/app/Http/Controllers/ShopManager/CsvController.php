<?php

namespace App\Http\Controllers\ShopManager;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class CsvController extends Controller
{
    public function import()
    {
        return view('shop_manager/shop/create_csv');
    }

    public function upload(Request $request)
    {
        $shop = new Shop();
        if ($request->hasFile('file')) {
            if ($request->file->getClientOriginalExtension() !== "csv") {
                return redirect('/shop_manager/csv_import')->with('message', 'ファイルは.csv形式で登録してください');
            }
            $newCsvFileName = $request->file->getClientOriginalName();
            $request->file->storeAs('public/csv', $newCsvFileName);
        } else {
            return redirect('/shop_manager/csv_import')->with('message', 'ファイルが選択されていません');
        }

        $csv = Storage::disk('local')->get("public/csv/{$newCsvFileName}");
        $csv = str_replace(array("\r\n", "\r"), "\n", $csv);
        $uploadedData = collect(explode("\n", $csv));

        $header = collect($shop->csvHeader());
        $uploadedHeader = collect(explode(",", $uploadedData->shift()));
        if ($header->count() !== $uploadedHeader->count()) {
            return redirect('/shop_manager/csv_import')->with('message', 'ヘッダーが一致しません');
        }

        $shops = $uploadedData->map(fn($oneRecord) => $header->combine(collect(explode(",", $oneRecord))));

        DB::table('shops')->insert($shops->toArray());

        return view('shop_manager/shop/create_done');
    }

}

