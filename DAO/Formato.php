<?php

class Formato{
    
    public function saludo(){
        date_default_timezone_set("America/Lima");
        $DateAndTime = date('g', time());  
        $tiempo = date('a', time()); 
        
        $saludo="";
        if($tiempo=="pm"){
            if($DateAndTime>=1 && $DateAndTime<=6){
                $saludo="Buenas tardes";
            }else if($DateAndTime>=7 && $DateAndTime <=11){
                $saludo="Buenas noches";
            }else if($DateAndTime==12){
                $saludo="Buenas tardes";
            }
        }else if($tiempo=="am"){
            if($DateAndTime>=1 && $DateAndTime<=4){
                $saludo="Buenas noches";
            }else if($DateAndTime>=5 && $DateAndTime <=11){
                $saludo="Buenos días";
            }else if($DateAndTime==12){
                $saludo="Buenas noches";
            }
        }
        return $saludo;
    }
    
    public function fecha_hora(){
        date_default_timezone_set("America/Lima");
        $fh= date("d/m/Y h:i A");
        
        return $fh;
    }
    
    public function fecha(){
        date_default_timezone_set("America/Lima");
        $fh= date("d-m-Y");
        
        return $fh;
    }
    
    public function fecha_listo(){
        /*
        setlocale(LC_ALL,"es_ES");
        date_default_timezone_set("America/Lima");
        $fh= date("d %B, Y");
         */
        
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $fh= $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
        //Salida: Miercoles 05 de Septiembre del 2016
        
        return $fh;
    }
    
    public function fecha2(){
        date_default_timezone_set("America/Lima");
        $fh= date("Y-m-d");
        
        return $fh;
    }
    
    public function fecha3(){
        date_default_timezone_set("America/Lima");
        $fh= date("Y-m-d");
        
        $day= date("Y-m-d",strtotime($fh."-1 days"));
        
        return $day;
    }
    
    public function hora(){
        date_default_timezone_set("America/Lima");
        $h= date("h:i A");
        
        return $h;
    }
    
    public function hora_simple(){
        date_default_timezone_set("America/Lima");
        $hs= date("his");
        
        return $hs;
    }
    
    public function mes_año(){
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        date_default_timezone_set("America/Lima");
        $año= date("Y");
        
        $mes=strftime("%B");
        $fecha= ucfirst($mes).' '.$año;
        return $fecha;
    }
    
    /*
    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }
     */
    
    function fechaEnMesyAño($fecha){
        //$dia= conocerDiaSemanaFecha($fecha);
        //$num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $mes.' del '.$anno;
    }
    
    function obtenerFechaEnLetra($fecha){
        $dia= conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$num.' de '.$mes.' del '.$anno;
    }
    
}

