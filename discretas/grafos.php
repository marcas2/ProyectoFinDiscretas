<?php
session_start();

/**
 * Se crea la clase 
 */
class Grafo {

    /**
     * Variable para guardar el (array) grafo
     */

    private $grafo;

    /**
     * Metodos de la clase Grafo 
     */
    
    
    public function __construct() {
        if (isset($_SESSION['grafo'])) {
            $this->grafo = $_SESSION['grafo'];
        } else {
            $this->grafo = array();
        }
    }


    public function agregarCancion($cancion) {
        $this->grafo[$cancion['id']] = $cancion;
        $_SESSION['grafo'] = $this->grafo;
    }
     

    public function agregarRelacion($idMG) {
        $this->ponerMG($idMG);
        $cancionMG=$this->grafo[$idMG];

        foreach ($this->grafo as $cancion) {
            if($cancion['genero']==$cancionMG['genero'] && $cancion['id']!=$cancionMG['id']){
            
            $this->grafo[$idMG]['relacion'][] = $cancion;
            $_SESSION['grafo'] = $this->grafo;

            }
        }

    }

    public function obtenerRecxCancion($cancion) {
        $valor =  $this->grafo[$cancion]['relacion'];
        return $valor;
    }
    public function obtenerRecomendaciones(){
        foreach ($this->grafo as $cancion) {
            
            if($cancion['mg']==1){
                $matrizRecomendaciones[]=$cancion;
                foreach ($cancion['relacion'] as $can_relacion) {
                    $matrizRecomendaciones[]=$can_relacion;
                }
            }
        }
        if(isset($matrizRecomendaciones)){
            usort($matrizRecomendaciones, function ($a, $b) {
                return strcmp($a['nombre'], $b['nombre']);
            });
            return $matrizRecomendaciones;
        }
    }
   
       
    

    public function devolverCancion($id){
        print_r($this->grafo[$id]);
    }

    public function cancionesPopulares(){
        foreach ($this->grafo as $cancion) {
            if($cancion['popular']==1){
                $matrizPopulares[]=$cancion;
            }
        }
        return $matrizPopulares;
    }

    public function ponerMG($id){
        $this->grafo[$id]['mg'] = 1;
        $_SESSION['grafo'] = $this->grafo;
    }

    public function crearCanciones(){
            $this->agregarCancion(array("id"=>1,
            "nombre"=>"Todo lo Bueno Tarda",
            "genero" => "HIP/HOP",
            "mg" => 0,
            "peso" => 50,
            "artista"=>"AlcolirykoZ",
            "img"=>"recursos/alcolirykoz.jpg",
            "sound"=>"recursos/tbt.mp3",
            "popular"=>1,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>2,
            "nombre"=>"Yo tomo licor",
            "genero" => "Andina ",
            "mg" => 0,
            "peso" => 40,
            "artista"=>"Amar azul",
            "img"=>"recursos/amar azul.png",
            "sound"=>"recursos/yo tomo licor.mp3",
            "popular"=>1,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>3,
            "nombre"=>"Enemigos",
            "genero" => "Reggaeton",
            "mg" => 0,
            "peso" => 30,
            "artista"=>"Feid, Miky Woodz, Juhn",
            "img"=>"recursos/bahia.png",
            "sound"=>"recursos/enemigos feid.mp3",
            "popular"=>1,
            "relacion"=>array() )); 


            $this->agregarCancion(array("id"=>4,
            "nombre"=>"Fragil al viento ",
            "genero" => "Rock",
            "mg" => 0,
            "peso" => 20,
            "artista"=>"Kraken",
            "img"=>"recursos/kraken.png",
            "sound"=>"recursos/fragil.mp3",
            "popular"=>1,
            "relacion"=>array() )); 
            
            $this->agregarCancion(array("id"=>5,
            "nombre"=>"Tadow",
            "genero" => "Jazz",
            "mg" => 0,
            "peso" => 10,
            "artista"=>"FKJ & Masego",
            "img"=>"recursos/masego.png",
            "sound"=>"recursos/tadow.mp3",
            "popular"=>1,
            "relacion"=>array() )); 

            

            $this->agregarCancion(array("id"=>6,
            "nombre"=>"El vaquero",
            "genero" => "Jazz",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Edy martinez",
            "img"=>"recursos/edy.jpeg",
            "sound"=>"recursos/el vaquero.mp3",
            "popular"=>0,
            "relacion"=>array() ));

            $this->agregarCancion(array("id"=>7,
            "nombre"=>"LUNA DE OCTUBRE",
            "genero" => "Rock",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Las Tres Piedras",
            "img"=>"recursos/las tres piedras.jpeg",
            "sound"=>"recursos/luna de octubre.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>8,
            "nombre"=>" Locura en Forma de Pasillo",
            "genero" => "Andina ",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Plecto trio",
            "img"=>"recursos/pasillo.jpeg",
            "sound"=>"recursos/locura.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>9,
            "nombre"=>" Sabor a Miel",
            "genero" => "Andina ",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Segundo Rosero",
            "img"=>"recursos/sabor.jpeg",
            "sound"=>"recursos/sabor a miel.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>10,
            "nombre"=>" VODKA N' RON",
            "genero" => "Rock",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Vodka N' Ron ",
            "img"=>"recursos/vodkanron.jpeg",
            "sound"=>"recursos/vodka.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>11,
            "nombre"=>" Aliento nocturno",
            "genero" => "Rock",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Magna Etérea ",
            "img"=>"recursos/aliento nocturno.jpeg",
            "sound"=>"recursos/aliento.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>12,
            "nombre"=>" RAYO ",
            "genero" => "Rock",
            "mg" => 0,
            "peso" => 0,
            "artista"=>" Heavy Metal Zombie",
            "img"=>"recursos/rayo.jpeg",
            "sound"=>"recursos/metal zombie.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>13,
            "nombre"=>"AKA Ninfa Madrugada eterna Ft MC Pencil",
            "genero" => "HIP/HOP",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Davis Fellatioinore",
            "img"=>"recursos/madrugada eterna.jpeg",
            "sound"=>"recursos/madrugada.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>14,
            "nombre"=>" Sound Check ft Sespry",
            "genero" => "HIP/HOP",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"MC Pencil ",
            "img"=>"recursos/mc pencil.jpeg",
            "sound"=>"recursos/sound.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>15,
            "nombre"=>"Entre Frases",
            "genero" => "HIP/HOP",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Mulato y la Quema",
            "img"=>"recursos/mulato.png",
            "sound"=>"recursos/entre frases.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>16,
            "nombre"=>" Ta' Loca  ",
            "genero" => "Reggaeton",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Los De La Gracia ",
            "img"=>"recursos/ta loca foto.jpeg",
            "sound"=>"recursos/ta loca.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>17,
            "nombre"=>" Volátiles  ",
            "genero" => "HIP/HOP",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Procelare  ",
            "img"=>"recursos/volatiles.png",
            "sound"=>"recursos/volatilexx.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>18,
            "nombre"=>" DUETO JAZZFILE PASTO   ",
            "genero" => "Jazz",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"DUETO ",
            "img"=>"recursos/dueto.png",
            "sound"=>"recursos/dueto jazz.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>19,
            "nombre"=>" Apalau  ",
            "genero" => "Andina ",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Ñamuy  ",
            "img"=>"recursos/apalau.png",
            "sound"=>"recursos/ñamuy.mp3",
            "popular"=>0,
            "relacion"=>array() )); 


            $this->agregarCancion(array("id"=>20,
            "nombre"=>" Aderall  ",
            "genero" => "Reggaeton ",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Bar  ",
            "img"=>"recursos/bar.png",
            "sound"=>"recursos/aderall.mp3",
            "popular"=>0,
            "relacion"=>array() )); 

            $this->agregarCancion(array("id"=>21,
            "nombre"=>" Los Apus  ",
            "genero" => "Jazz",
            "mg" => 0,
            "peso" => 0,
            "artista"=>"Juan Benavides, Fatua Trio ",
            "img"=>"recursos/juan benavides.png",
            "sound"=>"recursos/los apus.mp3",
            "popular"=>0,
            "relacion"=>array() )); 



            $_SESSION['grafo'] = $this->grafo;
    }
}

?>