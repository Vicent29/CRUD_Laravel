<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Http\Resources\ReservaResource;
use App\Http\Requests\StoreReservaRequest;



class ReservaController extends Controller
{

    // INDEX
    public function index()
    {
        return ReservaResource::collection(Reserva::all());
    }

    // STORE with VALIDATE
    public function store(StoreReservaRequest $request)
    {
        return ReservaResource::make(Reserva::create($request->validated()));
    }


    // SHOW
    public function show($id)
    {
        return ReservaResource::make(Reserva::where('id', $id)->firstOrFail());
    }

    // UPDATE with VALIDATE
    public function update(StoreReservaRequest $request, $id)
    {
        $update = Reserva::where('id', $id)->update($request->validated());

        if ($update == 1) {
            ReservaResource::make($update);
            return response()->json([
                "Message" => "Updated reserva succesfully"
            ]);
        } else {
            return response()->json([
                "Status" => "Error Update"
            ], 404);
        };
    }

    // DESTROY
    public function destroy($id)
    {
        $reserva_deletd = ReservaResource::make(Reserva::where('id', $id)->firstOrFail());
        $delete = Reserva::where('id', $id)->delete();

        if ($delete == 1) {
            return response()->json([
                "Message" => "Reserva deleted succesfully",
                "reserva deleted"  => $reserva_deletd
            ], 200);
        } else {
            return response()->json([
                "Message" => "Not found"
            ], 404);
        }
    }
}
