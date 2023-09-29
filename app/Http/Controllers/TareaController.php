<?php

namespace App\Http\Controllers;

use App\Models\TareaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;


class TareaController extends Controller
{
    //
    // DB::raw('LOCK TABLE '. $Tabla  .' READ');
    // DB::raw('LOCK TABLE '. $Tabla  .' WRITE');

    // DB::commit();
    // DB::raw('UNLOCK TABLES');

    // DB::rollBack();

    public function insertarTarea(Request $request)
    {
        try {
            DB::raw('LOCK TABLE tarea READ');
            DB::raw('LOCK TABLE tarea_categoria READ');

            $Tarea = new Tarea();

            $Tarea->id = 95;
            $Tarea->titulo = 'titulo123';
            $Tarea->contenido = 'contenido123';
            $Tarea->estado = 'estado123';
            $Tarea->usuario_id = 1;

            $Tarea = new Tarea();
            $Tarea->save();

            for ($i = 1; $i < 3; $i++) {
                $Tarea_Categoria = new TareaCategoria();
                $Tarea_Categoria->categoria = `categoria-$i`;
                $Tarea_Categoria->tarea_id = 95;
                $Tarea_Categoria->save();
            }
            DB::commit();
            DB::raw('UNLOCK TABLES');

        } catch (\Throwable $th) {
            DB::rollBack();
            return response(['message' => 'Something Went Wrong'], 404);
        }
    }
}