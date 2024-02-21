<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluateRequest;
use App\Models\Evaluation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EvaluationController extends Controller
{
    public function index($shop_id)
    {
        $shop_detail = Shop::where('id', $shop_id)->with('prefecture', 'genre')->first();
        return view('general/evaluate_new', compact('shop_detail'));
    }

    public function create(EvaluateRequest $request, $shop_id)
    {
        $image_file = $request->image_url;
        $file_name = uniqid(rand() . '_');
        $extension = $image_file->extension();
        $resized_image = Image::make($image_file)->resize(300, 300)->encode();
        $file_name_store = $file_name . '.' . $extension;
        Storage::put('public/evaluations/' . $file_name_store, $resized_image);

        Evaluation::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop_id,
            'star_id' => $request->input('star_id'),
            'comments' => $request->input('comments'),
            'image_url' => $file_name_store
        ]);
        return view('general/evaluate_done');
    }

    public function edit($evaluation_id)
    {
        $evaluation_past = Evaluation::where('id', $evaluation_id)->first();
        $shop_detail = Shop::where('id', $evaluation_past->shop_id)->first();
        return view('general/evaluate_edit', compact('evaluation_past', 'shop_detail'));
    }

    public function update(EvaluateRequest $request, $evaluation_id)
    {
        $evaluate_edit = $request->only(['star_id', 'comments', 'image_url']);
        Evaluation::find($evaluation_id)->update($evaluate_edit);
        return view('general/evaluate_done');
    }

    public function destroy($evaluation_id)
    {
        $evaluation = Evaluation::where('id', $evaluation_id)->first();
        $evaluation->delete();

        return redirect()->back();
    }
}
