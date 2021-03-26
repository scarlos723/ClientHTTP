<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::all();
        
        return view('subcategorias.lista',['subcategorias'=>$subcategorias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->objetivo = $request->objetivo;
        $subcategoria->link_video = $request->link_video;
        $subcategoria->save();

       

        return redirect()->route('subcategorias.show',$subcategoria->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategoria = Subcategoria::find($id);
        $niveles = $subcategoria->niveles; //traigo los niveles relacionados a esa categoria
        if(isset($niveles)){ //si existen niveles
            $data=array();
            foreach($niveles as $nivel){
                $cursos =$nivel->cursos;
                $data[]= array('nombre_nivel'=>$nivel->nombre,'cursos'=>$cursos); 
                
            }
            //print (json_encode($data));
            //print($niveles);
        }
        return view('subcategorias.ver',['subcategoria'=>$subcategoria,'niveles'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategoria = Subcategoria::find($id);
        
        return view('subcategorias.editar',['subcategoria'=>$subcategoria]);
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
        $subcategoria = Subcategoria::find($id);
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->objetivo = $request->objetivo;
        $subcategoria->link_video = $request->link_video;

        // for($i = 1; $i <= $request->num_niveles ; $i++){ //creo los nivles dependiendo del número de niveles
        //     $nivel = new Nivel();
        //     $nivel->nombre = 'Nivel'.$i;
        //     $nivel->subcategoria_id = $id;
        //     $nivel->save();
        // }
        $subcategoria->save();

        return redirect()->route('subcategorias.show',$subcategoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria = Subcategoria::find($id);
        $subcategoria->delete();
        return redirect()->route('subcategorias.index');
    }

    public function agregarNivel(Request $request, $id){ //se agrega un nivel relacionandolo con el id de la subcategoria
        $nivel = new Nivel();
        $nivel-> nombre = $request->nombre_nivel;
        $nivel ->subcategoria_id = $id;
        $nivel -> save();
        return redirect()->route('subcategorias.show',$id);

    }

    //Funciones relacionadas con la API

    public function verSubcategorias(){
        $subcategorias = Subcategoria::all();
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
        return json_encode($subcategorias);
    }
    public function verSubcategoria($id){
        $subcategoria = Subcategoria::find($id);
        $niveles=$subcategoria->niveles;
        $suma=0; //variable para calculcar el total de cursos
        foreach($niveles as $nivel){ //Recorro niveles
            $cursos = $nivel->cursos; //saco los cursos de cada nivel
            $suma=$suma + ($cursos->count()); //sumo la cantiodad de los cursos
        }
        $subcategoria['numero_cursos'] = $suma; //agrego el numero de curosos a la consulta
        
    
        return json_encode($subcategoria);
    }
}
