<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Parts;

class PartsController extends Controller
{
    public function index() {
        $parts = Parts::select(
            'part_number',
            'description',
            'um',
        )
        ->where('active', true)
        ->get();

        if( !$parts ) {
            return response([
                'msg' => 'No se pudo encontrar información',
            ]);
        }

        return response([
            'msg' => '¡Información encontrada exitosamente!',
            'data' => $parts,
        ]);
    }

    public function store( Request $request ) {
        $validator = Validator::make($request->all(), [
            'part_number' => 'required|string|max:25',
            'description' => 'required|string|max:255',
            'um' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response([
                'msg' => $validator->errors,
            ]);
        }
        
        $part = Parts::create( $validator->validated() );
        
        return response([
            'msg' => '¡Registro creado exitosamente!',
            'data' => $part,
        ]);
    }

    public function update( Request $request, $id ) {

        $validator = Validator::make($request->all(), [
            'part_number' => 'sometimes|string|max:25',
            'description' => 'sometimes|string|max:255',
            'um' => 'sometimes|string|max:10',
        ]);

        if ($validator->fails()) {
            return response([
                'msg' => $validator->errors,
            ]);
        }

        $part = Parts::find($id);

        if (!$part) {
            return response([
                'msg' => 'No se encontró el registro para actualizar',
            ]);
        }

        $part->update($validator->validated());

        return response([
            'msg' => '¡Registro actualizado exitosamente!',
            'data' => $part,
        ]);
    }

    public function delete( $id ) {
        
        $part = Parts::find($id);
        
        if( !$part ) {
            return response([
                'msg' => 'No se encontró registro para eliminar',
            ]);
        }

        $part->delete();

        return response([
            'msg' => '¡Registro eliminado exitosamente!',
        ]);
    }
}
