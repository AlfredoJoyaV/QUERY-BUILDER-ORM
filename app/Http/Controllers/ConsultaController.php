<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Usuario;
use DB;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
     // Insertar registros
    public function insertarRegistros()
    {
        
        // Inserta 5 usuarios
        Usuario::insert([
            ['nombre' => 'Fernando Aguilar', 'correo' => 'fernando.aguilar@mail.com', 'telefono' => '76787910'],
            ['nombre' => 'Alexander Vasquez', 'correo' => 'alexander.vasquez@mail.com', 'telefono' => '67879710'],
            ['nombre' => 'Erick Joya', 'correo' => 'erick.joya@mail.com', 'telefono' => '61402545'],
            ['nombre' => 'Armando Campos', 'correo' => 'armando.campos@mail.com', 'telefono' => '67678010'],
            ['nombre' => 'Eder', 'correo' => 'Eder@mail.com', 'telefono' => '76076000'],
        ]);

        // Inserta 5 pedidos
        Pedido::insert([
            ['producto' => 'Teclado', 'cantidad' => 1, 'total' => 120, 'id_usuario' => 1],
            ['producto' => 'Mouse', 'cantidad' => 2, 'total' => 200, 'id_usuario' => 2],
            ['producto' => 'Monitor', 'cantidad' => 1, 'total' => 250, 'id_usuario' => 3],
            ['producto' => 'Laptop', 'cantidad' => 1, 'total' => 999, 'id_usuario' => 4],
            ['producto' => 'USB', 'cantidad' => 5, 'total' => 75, 'id_usuario' => 5],
        ]);

        return response()->json(['message' => 'Registros insertados correctamente']);
    }

     /**
     * 2️⃣ Recupera todos los pedidos asociados al usuario con ID 2.
     */
    public function pedidosUsuario2()
    {
        $pedidos = Pedido::where('id_usuario', 2)->get();
        return response()->json($pedidos);
    }

    /**
     * 3️⃣ Obtén la información detallada de los pedidos, incluyendo
     *     el nombre y correo electrónico del usuario.
     */
    public function detallesPedidos()
    {
        $detalles = Pedido::join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.id', 'pedidos.producto', 'pedidos.total', 'usuarios.nombre', 'usuarios.correo')
            ->get();

        return response()->json($detalles);
    }

    /**
     * 4️⃣ Recupera todos los pedidos cuyo total esté entre $100 y $250.
     */
    public function pedidosRango()
    {
        $pedidos = Pedido::whereBetween('total', [100, 250])->get();
        return response()->json($pedidos);
    }

    /**
     * 5️⃣ Encuentra todos los usuarios cuyos nombres comiencen con "R".
     */
    public function usuariosLetraR()
    {
        $usuarios = Usuario::where('nombre', 'LIKE', 'R%')->get();
        return response()->json($usuarios);
    }

    /**
     * 6️⃣ Calcula el total de registros en la tabla pedidos para el usuario con ID 5.
     */
    public function totalPedidosUsuario5()
    {
        $total = Pedido::where('id_usuario', 5)->count();
        return response()->json(['total_pedidos_usuario_5' => $total]);
    }

    /**
     * 7️⃣ Recupera todos los pedidos con info de usuario,
     *     ordenados de forma descendente según el total.
     */
    public function pedidosOrdenadosPorTotal()
    {
        $pedidos = Pedido::join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
            ->orderBy('pedidos.total', 'desc')
            ->get();

        return response()->json($pedidos);
    }

    /**
     * 8️⃣ Obtén la suma total del campo "total" en la tabla pedidos.
     */
    public function sumaTotalPedidos()
    {
        $suma = Pedido::sum('total');
        return response()->json(['suma_total' => $suma]);
    }

    /**
     * 9️⃣ Encuentra el pedido más económico, junto con el nombre del usuario.
     */
    public function pedidoMasEconomico()
    {
        $pedido = Pedido::join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre')
            ->orderBy('pedidos.total', 'asc')
            ->first();

        return response()->json($pedido);
    }

    /**
     * 🔟 Obtén el producto, cantidad y total de cada pedido, agrupándolos por usuario.
     */
    public function pedidosAgrupadosPorUsuario()
    {
        $resultados = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('usuarios.nombre', DB::raw('SUM(pedidos.total) as total_por_usuario'), DB::raw('COUNT(pedidos.id) as cantidad_pedidos'))
            ->groupBy('usuarios.nombre')
            ->get();

        return response()->json($resultados);
    }

    /**
     * 1️⃣1️⃣ (Opcional) Mostrar todos los usuarios con sus pedidos (relación Eloquent)
     */
    public function usuariosConPedidos()
    {
        $usuarios = Usuario::with('pedidos')->get();
        return response()->json($usuarios);
    }
}
