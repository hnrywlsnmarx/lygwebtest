<?php

namespace App\Http\Controllers;

use App\Models\Lygsewingoutput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SewingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Lygsewingoutput::select('trnDate', 'styleCode', DB::raw('SUM(QtyOutput) as totalQtyOutput'), DB::raw('COUNT(sizeName) as totalSizeName'))
            ->groupBy('trnDate', 'styleCode')
            ->orderBy('trnDate', 'asc')
            ->get();

        return view('sewing.index', [
            'data'    => $data
        ]);
    }

    public function show($styleCode, $trnDate)
    {
        if ($styleCode == 'BOSSE FANCY OH HOOD S.9') {
            $data = Lygsewingoutput::select(
                'operatorName',
                'lygsewingoutput.destinationCode',
                // 'lygdestination.destinationName',
                DB::raw('SUM(CASE WHEN sizeName = "XS" THEN QtyOutput ELSE 0 END) AS xs'),
                DB::raw('SUM(CASE WHEN sizeName = "S" THEN QtyOutput ELSE 0 END) AS s'),
                DB::raw('SUM(CASE WHEN sizeName = "M" THEN QtyOutput ELSE 0 END) AS m'),
                DB::raw('SUM(CASE WHEN sizeName = "L" THEN QtyOutput ELSE 0 END) AS l'),
                DB::raw('SUM(CASE WHEN sizeName = "XL" THEN QtyOutput ELSE 0 END) AS xl'),
                DB::raw('SUM(CASE WHEN sizeName = "XXL" THEN QtyOutput ELSE 0 END) AS xxl'),
                DB::raw('SUM(QtyOutput) AS totalQtyOutput')
            )
                // ->join('lygdestination', 'lygsewingoutput.destinationCode', '=', 'lygdestination.destinationCode')
                ->where('styleCode', $styleCode)
                ->where('trnDate', $trnDate)
                ->groupBy('operatorName', 'lygsewingoutput.destinationCode')
                ->orderBy('operatorName', 'desc')
                ->get();
        } else if ($styleCode == 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9') {
            $data = Lygsewingoutput::select(
                'operatorName',
                'lygsewingoutput.destinationCode',
                // 'lygdestination.destinationName',
                DB::raw('SUM(CASE WHEN sizeName = "92" THEN QtyOutput ELSE 0 END) AS a'),
                DB::raw('SUM(CASE WHEN sizeName = "98" THEN QtyOutput ELSE 0 END) AS b'),
                DB::raw('SUM(CASE WHEN sizeName = "104" THEN QtyOutput ELSE 0 END) AS c'),
                DB::raw('SUM(CASE WHEN sizeName = "110" THEN QtyOutput ELSE 0 END) AS d'),
                DB::raw('SUM(CASE WHEN sizeName = "116" THEN QtyOutput ELSE 0 END) AS e'),
                DB::raw('SUM(CASE WHEN sizeName = "122" THEN QtyOutput ELSE 0 END) AS f'),
                DB::raw('SUM(CASE WHEN sizeName = "128" THEN QtyOutput ELSE 0 END) AS g'),
                DB::raw('SUM(CASE WHEN sizeName = "134" THEN QtyOutput ELSE 0 END) AS h'),
                DB::raw('SUM(CASE WHEN sizeName = "140" THEN QtyOutput ELSE 0 END) AS i'),
                DB::raw('SUM(CASE WHEN sizeName = "146" THEN QtyOutput ELSE 0 END) AS j'),
                DB::raw('SUM(CASE WHEN sizeName = "152" THEN QtyOutput ELSE 0 END) AS k'),
                DB::raw('SUM(QtyOutput) AS totalQtyOutput')
            )
                // ->join('lygdestination', 'lygsewingoutput.destinationCode', '=', 'lygdestination.destinationCode')
                ->where('styleCode', $styleCode)
                ->where('trnDate', $trnDate)
                ->groupBy('operatorName', 'lygsewingoutput.destinationCode')
                ->orderBy('operatorName', 'desc')
                ->get();
        }

        return response()->json($data);
    }

    public function showBak($styleCode, $trnDate)
    {
        if ($styleCode == 'BOSSE FANCY OH HOOD S.9') {
            $data = Lygsewingoutput::select(
                'operatorName',
                'lygsewingoutput.destinationCode',
                'lygdestination.destinationName',
                DB::raw('SUM(CASE WHEN sizeName = "XS" THEN QtyOutput ELSE 0 END) AS xs'),
                DB::raw('SUM(CASE WHEN sizeName = "S" THEN QtyOutput ELSE 0 END) AS s'),
                DB::raw('SUM(CASE WHEN sizeName = "M" THEN QtyOutput ELSE 0 END) AS m'),
                DB::raw('SUM(CASE WHEN sizeName = "L" THEN QtyOutput ELSE 0 END) AS l'),
                DB::raw('SUM(CASE WHEN sizeName = "XL" THEN QtyOutput ELSE 0 END) AS xl'),
                DB::raw('SUM(CASE WHEN sizeName = "XXL" THEN QtyOutput ELSE 0 END) AS xxl'),
                DB::raw('SUM(QtyOutput) AS totalQtyOutput')
            )
                ->join('lygdestination', 'lygsewingoutput.destinationCode', '=', 'lygdestination.destinationCode')
                ->where('styleCode', $styleCode)
                ->where('trnDate', $trnDate)
                ->groupBy('operatorName', 'lygsewingoutput.destinationCode', 'lygdestination.destinationName')
                ->orderBy('operatorName', 'desc')
                ->get();
        } else if ($styleCode == 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9') {
            $data = Lygsewingoutput::select(
                'operatorName',
                'lygsewingoutput.destinationCode',
                'lygdestination.destinationName',
                DB::raw('SUM(CASE WHEN sizeName = "92" THEN QtyOutput ELSE 0 END) AS a'),
                DB::raw('SUM(CASE WHEN sizeName = "98" THEN QtyOutput ELSE 0 END) AS b'),
                DB::raw('SUM(CASE WHEN sizeName = "104" THEN QtyOutput ELSE 0 END) AS c'),
                DB::raw('SUM(CASE WHEN sizeName = "110" THEN QtyOutput ELSE 0 END) AS d'),
                DB::raw('SUM(CASE WHEN sizeName = "116" THEN QtyOutput ELSE 0 END) AS e'),
                DB::raw('SUM(CASE WHEN sizeName = "122" THEN QtyOutput ELSE 0 END) AS f'),
                DB::raw('SUM(CASE WHEN sizeName = "128" THEN QtyOutput ELSE 0 END) AS g'),
                DB::raw('SUM(CASE WHEN sizeName = "134" THEN QtyOutput ELSE 0 END) AS h'),
                DB::raw('SUM(CASE WHEN sizeName = "140" THEN QtyOutput ELSE 0 END) AS i'),
                DB::raw('SUM(CASE WHEN sizeName = "146" THEN QtyOutput ELSE 0 END) AS j'),
                DB::raw('SUM(CASE WHEN sizeName = "152" THEN QtyOutput ELSE 0 END) AS k'),
                DB::raw('SUM(QtyOutput) AS totalQtyOutput')
            )
                ->join('lygdestination', 'lygsewingoutput.destinationCode', '=', 'lygdestination.destinationCode')
                ->where('styleCode', $styleCode)
                ->where('trnDate', $trnDate)
                ->groupBy('operatorName', 'lygsewingoutput.destinationCode', 'lygdestination.destinationName')
                ->orderBy('operatorName', 'desc')
                ->get();
        }

        return response()->json($data);
    }

    public function update(Request $request, $operatorName, $destinationCode)
    {
        
        $data = $request->all();

        
    }
}
