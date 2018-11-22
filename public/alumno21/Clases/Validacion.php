	<?php

	class Validacion extends Conexion{

	public $errores = [];
        
	public function mostrar_errores($errores) {
			echo '<ul class="listaerrores">';
		foreach ($errores as $error) {
			echo "<li>$error</li>";
			}
			echo '</ul>';
		}

	public	function mostrar_campo($campo) {
		if (isset($_POST[$campo])) {
			echo ' value="' . $_POST[$campo] . '"';
			}
		}

	public function mostrar_error_campo($campo, $errores) {
		if (isset($errores[$campo])) {
			echo '<span class="errorf">' . $errores[$campo] . '</span>';
			}
		}


		public function va_rol($campo){

	 		$campo = trim($campo);

		if ($campo=="jefe") {

			return true;

		if ($campo=="usuario") {

			return true;
			
		}	
		}else{
	 		return true;
	 		}
		}



	public function va_nick($campo){

	 		$campo = trim($campo);

		if (strlen($campo) < 5 ) {
			return false;
		}else{
	 		return true;
	 		}
		}

	public	function va_nombre($campo){

			$campo =  $this->sanitiza($campo);
		if (strlen($campo) < 3 ){
				return false;
		}elseif(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $campo)){
				return false;
			}else{
				return true;
			}
		}

	public	function va_apellido($campo){

			$campo = $this->sanitiza($campo);
		if(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $campo)){
				return false;
		}else{
				return true;
			}
		}

	public	function va_email($campo){

			$campo = $this->sanitiza($campo);
		if (strlen($campo) < 6){
				return false;
		}elseif(!preg_match('/^[a-zA-Z\d-_*\.]+@[a-zA-Z\d-_*\.]+\.[a-zA-Z\d]{2,}$/', $campo)){
				return false;
		}else{
				return true;
			}
		} 

	public	function va_password($campo){

			$campo = $this->sanitiza($campo);
		if(strlen($campo)<6){
					return false;
		}elseif(! preg_match('/[a-z]/', $campo)){
					return false;
		}elseif(! preg_match('/[A-Z]/', $campo)){
					return false;
		}elseif(! preg_match('/[0-9]/', $campo)){
					return false;
		}else{
					return true;
			}
		}

	public function nickUnico(){

            $buscaNick = "SELECT * FROM usuarios WHERE nickname = :nickname";
            $prepare = $this->db->prepare($buscaNick);
            $prepare->execute(array (":nickname" => $_POST['nickname']));
            if($prepare->rowCount())
            {
            	return false;
            }else{
            	return true;
            }
          
        }

    public function emailUnico(){

        	$buscaEmail="SELECT * FROM usuarios WHERE email = :email";
        	$prepare = $this->db->prepare($buscaEmail);
            $prepare->execute(array (":email" => $_POST['email']));
            if($prepare->rowCount())
            {
            	return false;
            }else{
            	return true;
            }
            
        }

	public	function sanitiza($campo){

	 	$campo= trim($campo);
	  	$campo = strip_tags($campo);
	  	$campo = preg_replace("/\"/",'', $campo);
	  		return $campo;
		}
	}

		
?>