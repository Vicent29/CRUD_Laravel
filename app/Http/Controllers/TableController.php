<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Table;
use App\Http\Resources\TableResource;
use App\Http\Requests\StoreTableRequest;
// use Illuminate\Http\Client\ResponseSequence;


class TableController extends Controller
{

    // INDEX
    public function index()
    {
        // $table = Table::all();
        // return response()->json($table);
        return TableResource::collection(Table::all());
    }

    // STORE with VALIDATE
    public function store(StoreTableRequest $request)
    {
        return TableResource::make(Table::create($request->validated()));
    }

    //STORE without validate
    public function store_sin_valid(Request $request)
    {
        error_log($request->data);
        $table = new Table;
        $table->name = $request->name;
        $table->capacity = $request->capacity;
        $table->type = $request->type;
        $table->save();
        return response()->json([
            "message" => "Creted new table"
        ], 201);
    }

    // SHOW
    public function show($id)
    {
        return TableResource::make(Table::where('id', $id)->firstOrFail());
    }

    // UPDATE with VALIDATE
    public function update(StoreTableRequest $request, $id)
    {
        $update = Table::where('id', $id)->update($request->validated());

        if ($update == 1) {
            TableResource::make($update);
            return response()->json([
                "Message" => "Updated table succesfully"
            ]);
        } else {
            return response()->json([
                "Status" => "Error Update"
            ], 404);
        };
    }

    // UPDATE without validation
    public function update_sin_valid(Request $request, $id)
    {
        if (Table::where('id', $id)->exists()) {
            $table = Table::find($id);
            $table->name = $request->name;
            $table->save();
            return response()->json([
                "message" => "Table Updated Successfully",
                "updated" => $table
            ], 200);
        } else {
            return response()->json([
                "message" => "Error"
            ], 404);
        }
    }
    // DESTROY
    public function destroy($id)
    {
        $table_deletd = TableResource::make(Table::where('id', $id)->firstOrFail());
        $delete = Table::where('id', $id)->delete();

        if ($delete == 1) {
            return response()->json([
                "Message" => "Table deleted succesfully",
                "table deleted"  => $table_deletd
            ], 200);
        } else {
            return response()->json([
                "Message" => "Not found"
            ], 404);
        }


        // if(Table::where('id', $id)->exists()) {
        //     $table = Table::find($id);
        //     $table->delete();
        //     return response()->json([
        //       "message" => "Table deleted"
        //     ], 202);
        //   } else {
        //     return response()->json([
        //       "message" => "Table not found"
        //     ], 404);
        //   }
    }
}
