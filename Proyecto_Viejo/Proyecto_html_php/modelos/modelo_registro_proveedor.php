<?php

    class registro{
            
        private $primer_nombre;
        private $segundo_nombre;
        private $primer_apellido;
        private $segundo_apellido;
        private int $tel_cel;
        private $direccion;
        private $tipo_documento;
        private int $num_doc;
        private $num_local;
        private $usu;
        private $clave;
        private $conect;


        public function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k)
        {
            $this->primer_nombre=$a;
            $this->segundo_nombre=$b;
            $this->primer_apellido=$c;
            $this->segundo_apellido=$d;
            $this->direccion=$e;
            $this->tel_cel=$f;
            $this->tipo_documento=$g;
            $this->num_doc=$h;
            $this->usu=$i;
            $this->clave=$j;
            $this->num_local=$k;
        }
    
            public function abrir(){
                $host = "localhost";
                $usuario = "root";
                $clave_conect= "";
                $bd = "Proyecto";
                $this->conect = mysqli_connect($host,$usuario,$clave_conect,$bd);
            }
        
            public function insertar(){
                $sql = "INSERT INTO  values";
                mysqli_query($this->conect,$sql);
            }

            public function aviso_registro(){
                $rutaArchivo = '../A-registro.html';
                $contenidoHTML = file_get_contents($rutaArchivo);
                echo $contenidoHTML;
            }

            public function verificar_usuario($i)
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Proyecto";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM vendedor WHERE usuario = '$i'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<script>alert('Este usuario ya exite en nuestra base de datos');window.location='../P-registro.html'</script>";
                    exit();
                } else {
                    return false;
                }

                $conn->close();
            }



    }                                                                                                                                                                                                                                                                                                                                                                              


    

?>