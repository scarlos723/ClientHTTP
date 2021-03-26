<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        
        $postsRequest = Http::get('https://jsonplaceholder.typicode.com/photos');
        $postslist = $postsRequest->json();

        return view('cursos.lista',['cursos'=>$cursos,'postslist'=>$postslist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postsRequest = Http::get('https://jsonplaceholder.typicode.com/photos');
        $postsRequest = $postsRequest->json();
        $postsAux=array();
        for($i = 1; $i <= 100; ++$i){
            $photos=[];
            foreach($postsRequest as $post){
                if($post['albumId']==$i){
                    $photos[]=array('id'=>$post['id'],
                                    'title'=>$post['title'],
                                    'url'=>$post['url']);
                }

            }
            $postsAux[]=['albumId'=>$i, 'photos'=> $photos];
            
        }
        //print(json_encode($postsAux));
        return view('cursos.crear',['albums'=>$postsAux]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->id_externo = $request ->id_externo;
        $curso->nombre = $request ->nombre;
        $curso->link_logo = $request ->link_logo;
        $curso->descripcion = $request ->descripcion;
        $curso->conceptos_importantes = $request ->conceptos_importantes;
        $curso->tiempo_curso = $request ->tiempo_curso;
        $curso->num_videos = $request ->num_videos;
        $curso->num_lecturas = $request ->num_lecturas;
        $curso->link_video = $request ->link_video;

        $curso->save();

        return redirect()->route('cursos.show',$curso->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);

        $curso->instructores; //obtengo los instructores relacionados al curso

        $postsRequest = Http::get('https://jsonplaceholder.typicode.com/photos');//traer info de appi externa
        $postsRequest =$postsRequest->json();
        
        $infoExterna=[];
        foreach( $postsRequest as $var){ //recorro el resultado para seleccionar la solo la info que id sea igual a id_externo
            if($var['albumId'] == $curso->id_externo){
                $infoExterna = Arr::prepend($infoExterna,$var);
                
            }
        }
        $niveles = $curso->niveles; //obtengo los niveles relacionados
        foreach($niveles as $nivel){
            $nivel->subcategoria =Subcategoria::find($nivel['subcategoria_id']);//agrago informacion de la subcategoria asociada al nivel
        }
        
        //obtener info para alimentar el firmulario de agregar a nivel subcategoria
        $formSubcats = Subcategoria::all();
        foreach($formSubcats as $subCat){
            $subCat->niveles; 
        }
        
       
        //print(json_encode($formSubcats));
        
        return view('cursos.ver',['curso'=>$curso,'infoExterna'=>$infoExterna, 
                                    //'instructores' =>$instructores,
                                    'formSubcats'=>$formSubcats
                                    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);

        

        return view('cursos.editar',['curso'=>$curso]);
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
        $curso = Curso::find($id);
        $curso->nombre = $request ->nombre;
        $curso->link_logo = $request ->link_logo;
        $curso->descripcion = $request ->descripcion;
        $curso->conceptos_importantes = $request ->conceptos_importantes;
        $curso->tiempo_curso = $request ->tiempo_curso;
        $curso->num_videos = $request ->num_videos;
        $curso->num_lecturas = $request ->num_lecturas;
        $curso->link_video = $request ->link_video;

        $curso->save();

        return redirect()->route('cursos.show',$curso->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('cursos.index');
    }


    public function agregarNivelSubcat(Request $request, $id){
        $curso = Curso::find($id);
        $nivel = Nivel::find($request->nivel_id);
        $curso->niveles()->attach($nivel);
        return redirect()->route('cursos.show',$curso->id);
    }

    public function verCursosApi(Request $request)
    {
        $cursos = Curso::all();
        
        if(isset($cursos)){

        return json_encode(array(
            'status'=> 200,
            'response'=>array(
                'data'=> $cursos
            )
        ));
        }else{
            return json_encode(array(
                'status'=> 200,
                'response'=>array(
                    'data'=> 'null'
                )
            ));
        }
    }

    function obtenerNivelRel($elemento){ //saca infor relacionada e info no relacionada con el $elemento

        $listInfoRel = $elemento->niveles; //obtengo los niveles relacionados (lista)
        
        foreach($listInfoRel as $nivel){
            $nivel->subcategorias;
        }
        if(empty($listInfoRel)){
            
            $listinfoNoRel = Nivel::all(); //niveles disponibles o  no asignados
            //$listInfoRel=array();
            foreach($listinfoNoRel as $nivel){
                $aux=$nivel->subcategorias;
            }
        }else{
            $ids=array();
            foreach($listInfoRel as $infoRel){   
                    array_unshift($ids,$infoRel->id);
            }   
            $listinfoNoRel = Nivel::all()->except($ids); //niveles  asignados al $elemeto
            foreach($listinfoNoRel as $nivel){
                $aux=$nivel->subcategorias;
            }
        }
        return (['infoNoRel'=>$listinfoNoRel,'infoRel'=>$listInfoRel]);
    }

    //funciones relacionas con la API

    public function verCursos(){
        $cursos = Curso::all();
        return json_encode($cursos);
    }
    public function verCurso($id){
        $curso = Curso::find($id);
        $curso->instructores;
        return json_encode($curso);
    }
    
}
