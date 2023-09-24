<?php

    class registro{
            
        private $nombre_producto;
        private $precio;
        private $select_categoria;
        private $select_peso;
        private $cantidad_producto;
        private $descripcion;
        private $url_imagen_producto;
        private $conect;

        public function __construct($a,$b,$c,$d,$e,$f,$g)
        {
            $this->nombre_producto=$a;
            $this->precio=$b;
            $this->select_categoria=$c;
            $this->select_peso=$d;
            $this->cantidad_producto=$e;
            $this->descripcion=$f;
            $this->url_imagen_producto=$g;
            

        }
    
            public function abrir(){
                $host = "localhost";
                $usuario = "root";
                $clave_conect= "";
                $bd = "proyecto";
                $this->conect = mysqli_connect($host,$usuario,$clave_conect,$bd);
               }
        
            public function insertar(){
                $sql1 = "INSERT INTO productos(id_productos,nom_prod,precio,categoria_producto,cantidad_stock,peso,url_imagen,observaciones) 
                    VALUES (NULL,'$this->nombre_producto','$this->precio','$this->select_categoria','$this->cantidad_producto','$this->select_peso','$this->url_imagen_producto','$this->descripcion')";
       
                // $sql2 = "INSERT INTO productos_vendedor
                // VALUES (NULL, 'C.C', 1, 1, '$this->select_peso', '$this->cantidad_producto', '$this->precio')";
                
                mysqli_query($this->conect, $sql1);
                // mysqli_query($this->conect, $sql2);
             }

             public function agregar_producto_exitoso(){
                $rutaArchivo = '../A-agregar-producto.html';
                $contenidoHTML = file_get_contents($rutaArchivo);
                echo $contenidoHTML;
             }


             
    }                                                                                                                                                                                                                                                                                                                                                                              


    

?>