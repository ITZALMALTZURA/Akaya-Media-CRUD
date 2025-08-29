<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //  web
    public function index()
    {
        return response()->json(Product::all());
    }

    public function product($id)
    {
        try {
            return response()->json(Product::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripccion' => 'nullable|string|max:1000',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0'
        ]);

        Product::create([
            'nombre' => $request->nombre,
            'descripccion' => $request->descripccion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio
        ]);

        return redirect('/welcome');
    }

    // PUT /Products/{id}
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $request->validate([
            'u_nombre' => 'required|string|max:255',
            'u_descripccion' => 'nullable|string|max:1000',
            'u_cantidad' => 'required|integer|min:0',
            'u_precio' => 'required|numeric|min:0'
        ]);

        $product->update([
            'nombre' => $request->u_nombre,
            'descripccion' => $request->u_descripccion,
            'cantidad' => $request->u_cantidad,
            'precio' => $request->u_precio
        ]);

        return redirect('/welcome');
    }

    public function delete($id)
    {
        try {
            $task = Product::findOrFail($id);
            $task->delete();

            return response()->json([
                'message' => 'Producto eliminado'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el producto',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
