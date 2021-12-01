<?php

namespace App\Controllers;

//IMPORTO EL MODELO
use App\Models\AnimalModelo;

class Animal extends BaseController{
    
    public function index(){
        return view('registroAnimales');
    }

    public function registrarAnimal(){
        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");
        $foto=$this->request->getPost("foto");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");

        if($this->validate('formularioAnimales')){
            try {
                
                $modelo=new AnimalModelo();

                $datos=array(
                    "nombre"=>$nombre,
                    "edad"=>$edad,
                    "foto"=>$foto,
                    "descripcion"=>$descripcion,
                    "tipo"=>$tipo,
                );

                $modelo->insert($datos);

                $mensaje="exito agregando animal";
                return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);;
            } catch(\Exception $error){

                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/registro/productos'))->with('mensaje',$mensaje);
            }

        }else{
            $mensaje="Llenar todos los campos es obligatorio >.<";
        }
    }


    public function buscar(){

        try{
            
            //creo un objeto del modelo de productos
            $modelo=new AnimalModelo();

            $resultado=$modelo->findAll();

            $animales=array("animales"=>$resultado);

            return view('listarAnimales',$animales);

           }catch(\Exception $error){
               $mensaje=$error->getMessage();
               return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje); 
           }
    }

    public function eliminarAnimal($id){

        try{
         $modelo=new AnimalModelo();
         $modelo->where('id',$id)->delete();
         $mensaje="exito eliminando el animal..";
         return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
 
 
        }catch(\Exception $error){
 
         $mensaje=$error->getMessage();
         return redirect()->to(site_url('/registro/animales'))->with('mensaje',$mensaje);
         
         }
 
     }

     public function editar($id){
        //Recibo datos a editar
        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");
        $foto=$this->request->getPost("foto");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");
        //aplico las validaciones
        if($this->validate('formularioAnimales')){
            try {
                
                $modelo=new AnimalModelo();

                $datos=array(
                    "nombre"=>$nombre,
                    "edad"=>$edad,
                    "foto"=>$foto,
                    "descripcion"=>$descripcion,
                    "tipo"=>$tipo,
                );

                $modelo->update($id, $datos);

                $mensaje="exito editando animal";
                return redirect()->to(site_url('/buscar/animales'))->with('mensaje',$mensaje);;
            } catch(\Exception $error){

                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/buscar/animales'))->with('mensaje',$mensaje);
            }

        }else{
            $mensaje="Llenar todos los campos es obligatorio >.<";
        }


    }


}

