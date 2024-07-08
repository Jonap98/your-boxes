<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Locations;

class LocationsController extends Controller
{
    public function index() {
        $locations = Locations::select(
            'location',
        )
        ->get();

        if( !$locations ) {
            return response([
                'msg' => 'No se pudo encontrar información',
            ]);
        }

        return response([
            'msg' => '¡Información encontrada exitosamente!',
            'data' => $locations,
        ]);
    }

    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'location' => 'required|string|max:25',
        ]);

        if ($validator->fails()) {
            return response([
                'msg' => $validator->errors,
            ]);
        }
        
        $location = Locations::create( $validator->validated() );
        
        return response([
            'msg' => '¡Registro creado exitosamente!',
            'data' => $location,
        ]);
    }

    public function update( Request $request, $id ) {

        $validator = Validator::make($request->all(), [
            'location' => 'sometimes|string|max:25',
        ]);

        if ($validator->fails()) {
            return response([
                'msg' => $validator->errors,
            ]);
        }

        $location = Locations::find($id);

        if (!$location) {
            return response([
                'msg' => 'No se encontró el registro para actualizar',
            ]);
        }

        $location->update($validator->validated());

        return response([
            'msg' => '¡Registro actualizado exitosamente!',
            'data' => $location,
        ]);
    }

    public function delete( $id ) {
        
        $location = Locations::find($id);
        
        if( !$location ) {
            return response([
                'msg' => 'No se encontró registro para eliminar',
            ]);
        }

        $location->delete();

        return response([
            'msg' => '¡Registro eliminado exitosamente!',
        ]);
    }
}
