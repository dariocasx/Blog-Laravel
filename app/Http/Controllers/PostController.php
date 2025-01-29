<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // se obtienen los posts con paginacion de 10 por pagina
        $posts = Post::paginate(10);

        // se devuelve la lista de posts como respuesta en formato JSON
        return response()->json($posts);
    }

    public function show($id)
    {
        // se busca un post por su id, si no se encuentra lanza un error 404
        $post = Post::findOrFail($id);

        // se devuelve el post encontrado como respuesta en formato JSON
        return response()->json($post);
    }

    public function store(Request $request)
    {
        // se crea un nuevo post con los datos recibidos en la solicitud
        $post = Post::create($request->all());

        // se devuelve el post creado como respuesta en formato JSON con el codigo 201 (creado)
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        // se busca el post por su id, si no se encuentra lanza un error 404
        $post = Post::findOrFail($id);

        // se actualizan los datos del post con los nuevos valores recibidos en la solicitud
        $post->update($request->all());

        // se devuelve el post actualizado como respuesta en formato JSON
        return response()->json($post);
    }

    public function destroy($id)
    {
        // se busca el post por su id, si no se encuentra lanza un error 404
        $post = Post::findOrFail($id);

        // se elimina el post de la base de datos
        $post->delete();

        // se devuelve un mensaje indicando que el post fue eliminado correctamente
        return response()->json(['message' => 'post deleted successfully']);
    }
}
