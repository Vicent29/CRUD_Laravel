<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thematic;
use App\Http\Resources\ThematicResource;
use App\Http\Requests\StoreThematicRequest;



class ThematicController extends Controller
{

    // INDEX
    public function index()
    {
        // $thematic = Thematic::all();
        // return response()->json($thematic);
        return ThematicResource::collection(Thematic::all());
    }

    // STORE with VALIDATE
    public function store(StoreThematicRequest $request)
    {
        return ThematicResource::make(Thematic::create($request->validated()));
    }

    //STORE without validate
    public function store_sin_valid(Request $request)
    {
        error_log($request->data);
        $thematic = new Thematic;
        $thematic->name = $request->name;
        $thematic->location = $request->location;
        $thematic->save();
        return response()->json([
            "message" => "Creted new thematic"
        ], 201);
    }

    // SHOW
    public function show($id)
    {
        return ThematicResource::make(Thematic::where('id', $id)->firstOrFail());
    }

    // UPDATE with VALIDATE
    public function update(StoreThematicRequest $request, $id)
    {
        $update = Thematic::where('id', $id)->update($request->validated());

        if ($update == 1) {
            ThematicResource::make($update);
            return response()->json([
                "Message" => "Updated thematic succesfully"
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
        if (Thematic::where('id', $id)->exists()) {
            $thematic = Thematic::find($id);
            $thematic->name = $request->name;
            $thematic->save();
            return response()->json([
                "message" => "Thematic Updated Successfully",
                "updated" => $thematic
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
        $thematic_deletd = ThematicResource::make(Thematic::where('id', $id)->firstOrFail());
        $delete = Thematic::where('id', $id)->delete();

        if ($delete == 1) {
            return response()->json([
                "Message" => "Thematics and related tables deleted correctly",
                "thematic deleted"  => $thematic_deletd
            ], 200);
        } else {
            return response()->json([
                "Message" => "Not found"
            ], 404);
        }


        // if(Thematic::where('id', $id)->exists()) {
        //     $thematic = Thematic::find($id);
        //     $thematic->delete();
        //     return response()->json([
        //       "message" => "Thematic deleted"
        //     ], 202);
        //   } else {
        //     return response()->json([
        //       "message" => "Thematic not found"
        //     ], 404);
        //   }
    }
}