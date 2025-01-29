<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // se obtienen los usuarios con paginacion de 10 por pagina
        $users = User::paginate(10);

        // se devuelve la lista de usuarios como respuesta en formato JSON
        return response()->json($users);
    }

    public function show($id)
    {
        // se busca un usuario por su id, si no se encuentra lanza un error 404
        $user = User::findOrFail($id);

        // se devuelve el usuario encontrado como respuesta en formato JSON
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // se busca el usuario por su id, si no se encuentra lanza un error 404
        $user = User::findOrFail($id);

        // se actualizan los datos del usuario con los nuevos valores recibidos en la solicitud
        $user->update($request->all());

        // se devuelve el usuario actualizado como respuesta en formato JSON
        return response()->json($user);
    }

    public function destroy($id)
    {
        // se busca el usuario por su id, si no se encuentra lanza un error 404
        $user = User::findOrFail($id);

        // se elimina el usuario de la base de datos
        $user->delete();

        // se devuelve un mensaje indicando que el usuario fue eliminado correctamente
        return response()->json(['message' => 'user deleted successfully']);
    }
}
