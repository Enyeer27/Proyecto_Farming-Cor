<?php

    class registro{
            
        private $primer_nombre;
        private $segundo_nombre;
        private $primer_apellido;
        private $segundo_apellido;
        private int $tel_cel;
        private $correo;
        private $usuario;
        private $clave;
        private $tipo_documento;
        private int $num_doc;
        private $conect;

        public function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)
        {
            $this->primer_nombre=$a;
            $this->segundo_nombre=$b;
            $this->primer_apellido=$c;
            $this->segundo_apellido=$d;
            $this->tel_cel=$e;
            $this->tipo_documento=$f;
            $this->num_doc=$g;
            $this->usuario=$h;
            $this->correo=$i;
            $this->clave=$j;
        }
    
            public function abrir(){
                $host = "localhost";
                $usuario = "root";
                $clave_conect= "";
                $bd = "Proyecto";
                $this->conect = mysqli_connect($host,$usuario,$clave_conect,$bd);
            }
        
            public function insertar(){
                $sql = "INSERT INTO persona(id_persona,Tipo_doc_id_tipo_doc,Nombre1,Nombre2,Apellido1,Apellido2,Num_Doc,Correo,Tel_Cel,usuario,clave) 
                values(NULL,'$this->tipo_documento','$this->primer_nombre','$this->segundo_nombre','$this->primer_apellido','$this->segundo_apellido','$this->num_doc','$this->correo','$this->tel_cel','$this->usuario','$this->clave')";
                mysqli_query($this->conect,$sql);
            }

            public function verificar_usuario($h)
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Proyecto";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM persona WHERE Usuario = '$h' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<script>alert('Este usuario ya exite en nuestra base de datos');window.location='../P-registro-persona.html'</script>";
                    exit();
                } else {
                    return false;
                }

                $conn->close();
            }

            public function aviso_registro(){
                $rutaArchivo = '../A-registro.html';
                $contenidoHTML = file_get_contents($rutaArchivo);
                echo $contenidoHTML;
            }

    }                                                                                                                                                                                                                                                                                                                                                                              


?>