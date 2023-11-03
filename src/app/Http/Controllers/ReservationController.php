<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Shop;

class ReservationController extends Controller
{
    public function index($id)
    {
        $shop_detail = Shop::with('prefecture', 'genre')->find($id);

        $business_hour = $shop_detail->business_hours->pluck('business_hour');

        return view('shop_detail', compact('business_hour', 'shop_detail'));
    }

    public function store(Request $request, $shop_id)
    {
        $reserve_history = Reservation::where('shop_id', $shop_id)->get();

        if(is_null($reserve_history)){
            Reservation::create([
                'user_id' => Auth::id(),
                'shop_id' => $shop_id,
                'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                'number' => $request->input('number')
            ]);
            return view('done');
        }

        $required_date = Carbon::parse($request->input('reserve_date'))->format('Y-m-d');
        $reserve_history_date = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->get();

        if(is_null($reserve_history_date)){
            Reservation::create([
                'user_id' => Auth::id(),
                'shop_id' => $shop_id,
                'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                'number' => $request->input('number')
            ]);
            return view('done');
        }

        $required_reserve_number = $request->input('number');
        $required_reserve_start = Carbon::parse($request->input('start_time'))->format('H:i:s');
        $required_reserve_start_before_hour = Carbon::parse($required_reserve_start)->addHour()->format('H:i:s');
        $required_reserve_start_after_hour = Carbon::parse($required_reserve_start)->subHour()->format('H:i:s');
        $same_reserve_start = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start)->get();
        $partial_match_reserve_time_before = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start_before_hour)->get();
        $partial_match_reserve_time_after = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start_after_hour)->get();

        if(is_null($same_reserve_start) && is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)){
            Reservation::create([
                'user_id' => Auth::id(),
                'shop_id' => $shop_id,
                'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                'number' => $request->input('number')
            ]);
            return view('done');
        }

        if(is_null($same_reserve_start) && !is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)){
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number_before + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && is_null($partial_match_reserve_time_before)) {
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            if ($other_reserve_number_after + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && !is_null($partial_match_reserve_time_before)) {
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number_after + $other_reserve_number_before + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number + $other_reserve_number_before + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && is_null($partial_match_reserve_time_before)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            if ($other_reserve_number + $other_reserve_number_after + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && !is_null($partial_match_reserve_time_before)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number + $other_reserve_number_after + $other_reserve_number_before + $required_reserve_number <= 10) {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'shop_id' => $shop_id,
                    'reserve_date' => Carbon::parse($request->input('reserve_date'))->format('Y-m-d'),
                    'start_time' => Carbon::parse($request->input('start_time'))->format('H:i:s'),
                    'number' => $request->input('number')
                ]);
                return view('done');
            } else {
                return redirect()->route('reserve.index', ['shop_id' => $shop_id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }
    }

    public function edit(Request $request, $reserve_id)
    {
        $reserve = Reservation::with('shop')->where('id', $reserve_id)->first();
        $business_hour = $reserve->shop->business_hours->pluck('business_hour');
        return view('mypage_reserve_edit', compact('reserve', 'business_hour'));
    }

    public function update(Request $request, $reserve_id)
    {
        $reserve = Reservation::with('shop')->where('id', $reserve_id)->first();
        $shop_id = $reserve->shop->id;
        $required_date = Carbon::parse($request->input('reserve_date'))->format('Y-m-d');
        $required_reserve_number = $request->input('number');
        $required_reserve_start = Carbon::parse($request->input('start_time'))->format('H:i:s');
        $required_reserve_start_before_hour = Carbon::parse($required_reserve_start)->addHour()->format('H:i:s');
        $required_reserve_start_after_hour = Carbon::parse($required_reserve_start)->subHour()->format('H:i:s');
        $same_reserve_start = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start)->get();
        $partial_match_reserve_time_before = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start_before_hour)->get();
        $partial_match_reserve_time_after = Reservation::where('shop_id', $shop_id)->where('reserve_date', $required_date)->where('start_time', $required_reserve_start_after_hour)->get();

        if (is_null($same_reserve_start) && is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)) {
            $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
            Reservation::find($reserve->id)->update($reserve_edit);
            return view('mypage_reserve_update_done');
        }

        if (is_null($same_reserve_start) && !is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)) {
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number_before + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && is_null($partial_match_reserve_time_before)) {
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            if ($other_reserve_number_after + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && !is_null($partial_match_reserve_time_before)) {
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number_after + $other_reserve_number_before + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_before) && is_null($partial_match_reserve_time_after)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number + $other_reserve_number_before + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && is_null($partial_match_reserve_time_before)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            if ($other_reserve_number + $other_reserve_number_after + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }

        if (!is_null($same_reserve_start) && !is_null($partial_match_reserve_time_after) && !is_null($partial_match_reserve_time_before)) {
            $other_reserve_number = $same_reserve_start->sum('number');
            $other_reserve_number_after = $partial_match_reserve_time_after->sum('number');
            $other_reserve_number_before = $partial_match_reserve_time_before->sum('number');
            if ($other_reserve_number + $other_reserve_number_after + $other_reserve_number_before + $required_reserve_number <= 10) {
                $reserve_edit = $request->only(['reserve_date', 'start_time', 'number']);
                Reservation::find($reserve->id)->update($reserve_edit);
                return view('mypage_reserve_update_done');
            } else {
                return redirect()->route('reserve.edit', ['reserve_id' => $reserve->id])->with('message', '予約をお取りすることができませんでした。日時を再度ご検討ください。');
            }
        }
    }

    public function destroy($id)
    {
        $reserve = Reservation::where('id', $id)->first();
        $reserve->delete();

        return redirect()->back();
    }

}