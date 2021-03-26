<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $instructores = Instructor::all();

         
         return view('instructors.lista',['instructores'=>$instructores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instructor = new Instructor();
        $instructor->nombre = $request->nombre;
        $instructor->descripcion = $request->descripcion;
        $instructor->link_foto = $request->link_foto;
        $instructor->save();
        return redirect()->route('instructors.show',$instructor->id);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor = Instructor::find($id);

        $auxList = $this->obtenerCursosRel($instructor);//Obtener cursos relacionados 
     
            
       
        return view('instructors.ver',['instructor'=>$instructor,
                                        'cursosDisp'=> $auxList['cursosDisp'],
                                        'cursosAsig'=> $auxList['cursosAsig']]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::find($id);
        return view('instructors.editar',['instructor'=>$instructor]);
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
        $instructor = Instructor::find($id);
        $instructor->nombre = $request->nombre;
        $instructor->descripcion = $request->descripcion;
        $instructor->link_foto = $request->link_foto;
        $instructor->save();

        return redirect()->route('instructors.show',$instructor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor=Instructor::find($id);
        $instructor->delete();
        
        return redirect()->route('instructors.index'); //es el nombre de la ruta /instructors GET
    }

    public function asignarCurso(Request $request ,$id){
        $instructor = Instructor::find($id);
        $curso = Curso::find($request['id_curso']);
        $instructor->cursos()->attach($curso);

        $auxList = $this->obtenerCursosRel($instructor); //obtener cursos relacionados
       
        return redirect()->route('instructors.show',['instructor'=>$instructor,
                                                    'cursosDisp'=> $auxList['cursosDisp'],
                                                    'cursosAsig'=> $auxList['cursosAsig']]);
    }

    //Obtener cursos relacionados
    function obtenerCursosRel($elemento){

        $cursos = $elemento->cursos; //obtengo los cursos relacionados (lista)

        if(empty($cursos)){
            
            $cursosDisp = Curso::all(); //cursos disponible o  sin asignar
           
            
        }else{
            $ids=array();
            foreach($cursos as $curso){   
                    array_unshift($ids,$curso->id);
            }   
            $cursosDisp = Curso::all()->except($ids); //cursos asignados al instructor
        }

       

        return (['cursosDisp'=>$cursosDisp,'cursosAsig'=>$cursos]);
    }
}
