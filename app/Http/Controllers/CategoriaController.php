<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $categorias = Categoria::all();

         
         return view('categorias.lista',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->link_logo = $request->link_logo;
        $categoria->save();

      
        return redirect()->route('categorias.show',$categoria->id );
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        $subcategorias = $categoria->subcategorias;
        
        
        // foreach($subcategorias as $subcategoria){
        //     $suma=0;
        //     $subcategoria['num_cursos']=  20;
        //     $subcategoriasAux[]=$subcategoria;
        // }
        foreach($subcategorias as $subcategoria){
            $niveles = $subcategoria->niveles;//obtengo los niveles de cada categoria
            $suma=0;
            foreach($niveles as $nivel){
                $cursos = $nivel->cursos;
                $suma=$suma + ($cursos->count());
            }
            $subcategoria['num_cursos'] = $suma;   
            
        }
        $subCatDisp = Subcategoria::whereNull('categoria_id')->get();
        //print(json_encode($subCatDisp));
        //print(json_encode($subcategorias));

        return view('categorias.ver',['categoria'=>$categoria,'subcategorias'=>$subcategorias,'subCatDisp'=>$subCatDisp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        
        return view('categorias.editar',['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->link_foto = $request->link_foto;
        $categoria->save();

        return redirect()->route('categorias.show',$categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
        
        return redirect()->route('categorias.index'); //es el nombre de la ruta /categorias GET
    }

    function agregarSubcategoria(Request $request ,$id){
        $subCat = Subcategoria::find($request->subcategoria_id);
        $subCat->categoria_id = $id;
        $subCat->save();
        return redirect()->route('categorias.show',$id);
    }


    //Funciones relacionada con la API

    public function verCategorias(){ // Retorna todas las categorias
        $categorias = Categoria::all();
        return json_encode($categorias); 
    }

    public function verCategoria($id){ // Retorna todas las categorias
        $categoria = Categoria::find($id);
        $subcategorias = $categoria->subcategorias;
        foreach($subcategorias as $subcat){
            $niveles=$subcat->niveles;
            $suma=0; //variable para calculcar el total de cursos
            foreach($niveles as $nivel){ //Recorro niveles
                $cursos = $nivel->cursos; //saco los cursos de cada nivel
                $suma=$suma + ($cursos->count()); //sumo la cantiodad de los cursos
            }
            $subcat['numero_cursos'] = $suma; //agrego el numero de curosos a la consulta
            unset($subcat['niveles']); //quito niveles de la consulta
        }

        return json_encode($categoria); 
    }

}
