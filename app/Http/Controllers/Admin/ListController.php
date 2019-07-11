<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\BaseController as Controller;

class ListController extends Controller
{
    public function index(Request $request, $table)
    {
        $paginate = $results = collect([]);

        if ($table === "events") {
            $paginate = DB::table($table)
                ->select('id', 'name', 'location', 'start_dt')
                ->where('name', 'like', '%' . $request->search['value'] . '%')
                ->orWhere('location', 'like', '%' . $request->search['value'] . '%')
                ->paginate($request->length);

            $results = collect($paginate->items())->map(function ($item, $key) {
                return array(
                    'DT_RowId' => $item->id,
                    'name' => '<a href="#" class="eventView" data-action="view" data-id="'.$item->id.'">'.$item->name.'</a>',
                    'date' => Carbon::parse($item->start_dt)->format('l, F d, Y h:iA'),
                    'location' => $item->location,
                    'guests' => 40,
                    'actions' => '<a href="'.route('events.edit', ['event' => $item->id]).'" class="btn btn-success eventEdit">' .
                        '   <i class="fa fa-edit"></i> Edit' .
                        '</a>' .
                        '<button class="btn btn-danger eventDelete" type="button" data-action="delete" data-id="'.$item->id.'">' .
                        '   <i class="fa fa-trash-o"></i> Delete' .
                        '</button>'
                );
            })->toArray();
        }

        return response()->json([
            "data" => $results,
            "draw" => $request->draw,
            "recordsTotal" => $paginate->total(),
            "recordsFiltered" => $paginate->total()
        ]);
    }
}
