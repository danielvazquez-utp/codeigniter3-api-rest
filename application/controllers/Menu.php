<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Mimodelo');
        $this->load->helper('url');
        $this->load->library('session');
	}

	public function index()
	{
		if (!isset($_SESSION['idUser'])) {
			redirect('App/logout');
		}

		
		/*Configuración de la vista*/
		$menu = $this->General_model->get('permisos_usuarios', array('activo'=>1, 'id_usuario'=>$_SESSION['idUser']), array('orden'=>'asc'), '');
		$submenu = $this->General_model->get('submenu_opciones', array('activo_submenu'=>1), array(), '');
		
		$users = $this->General_model->get('usuarios', array('id_user'=>$this->session->idUser), array(), '');
		$user = ($users!=false) ? $users->row(0) : false ;

		//$query = "SELECT * FROM ordenes_cobro WHERE no_servicio=797 AND periodo_pago=30 ";
		//$ordenes = $this->General_model->query($query);

		$ordenes = $this->General_model->get('ordenes_cobro', array('no_servicio'=>797, 'periodo_pago'=>30 ), array(), '');
		$orden = ($ordenes!=false)? $ordenes->row(0): false;

		$users_se = $this->General_model->get('usuarios_escolares', array('id_user'=>$this->session->idUser), array(), '');
		$user_se = ($users_se!=false) ? $users_se->row(0) : false ;
		
	

		$const=0;
		$ti = 0 ;
		$gas = 0 ;
		$meca_1 = 0 ;
		$meca_2 = 0 ;
		$sa = 0;
		$mi = 0;
		$ii = 0;
		$am = 0;
		$supervisor = 0;
		$se = 0;
		$estatus = 'En revisión';
		if ($ordenes!=false){
			foreach ($ordenes->result() as $orden) {
						$users_a = $this->General_model->get('usuarios', array('id_user'=>$orden->id_user), array(), '');
						$user_a= ($users_a!=false) ? $users_a->row(0) : false ;

						//Dictaminacion
						$dictaminaciones = $this->General_model->get('tramites_servicios_dictaminacion', array('id_periodo'=>30, 'no_servicio' =>797, 'id_orden' => $orden->id_orden), array(), '');
						$dictaminacion = ($dictaminaciones!=false) ? $dictaminaciones->row(0) : false ;

						$estudents = $this->General_model->get('estudiantes', array('id_persona'=>$user_a->id_persona), array(), '');
						$estudent= ($estudents!=false) ? $estudents->row(0) : false ;
						$inscritos = $this->General_model->get('inscritos', array('id_periodo'=> $orden->id_periodo, 'id_estudiante'=>$estudent->id_estudiante ), array(), '');
						$inscrito = ($inscritos!=false) ? $inscritos->row(0) : false ;
						$grupos = $this->General_model->get('grupos_sicea', array('idgrupo' => $inscrito->id_grupo), array(), '');
						$grupo = ($grupos!=false) ? $grupos->row(0) : false ;
						$divisiones = $this->General_model->get('divisiones', array('id_division' => $grupo->division), array(), '');
						$division = ($divisiones!=false) ? $divisiones->row(0) : false ;
						$programas = $this->General_model->get('programa_educativo', array('id_programa'=>$grupo->programa), array(), '');
						$programa = ($programas!=false) ? $programas->row(0) : false ;
					
						if($division->id_division == 8)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$const++;
										}
									}
								}
							}
								
						}
						/*if($division->id_division == 7)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$ti++;
										}
										
									}
								}
							}
						}*/
						if($division->id_division == 9)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$gas++;
										}
									}
								}
							}
						}
						if($division->id_division == 4 && $programa->id_programa != 41)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$meca_1++;
										}
									}
								}
							}
						}
						if($division->id_division == $programa->iddivision && $programa->id_programa ==41)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$meca_2++;
										}
									}
								}
							}
						}
						if($division->id_division == $programa->iddivision && $programa->id_programa ==69)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$meca_2++;
										}
									}
								}
							}
						}
						if($division->id_division == $programa->iddivision && $programa->id_programa == 68 && $programa->id_programa == 72)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$meca_2++;
										}
									}
								}
							}
						}
						if($division->id_division == 11 && $programa->id_programa == 25 && $programa->id_programa == 67)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$sa++;
										}
									}
								}
							}
						}
						if($division->id_division == 2)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$mi++;
										}
									}
								}
							}
						}
						if($division->id_division == 3 && $programa->id_programa == 44 && $programa->id_programa == 45 && $programa->id_programa == 57 )	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$ii++;
										}
									}
								}
							}
						}
						if($division->id_division == 13)	{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											//$ti = $dictaminacion->estatus;
										}else{
											$am++;
										}
									}
								}
							}
						}
						if($orden->estado == 4 || $orden-> estado == 9){
							if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
								$fecha = strtotime($orden->fecha_pago."+ 7 days");
								$fecha_lib = date("Y-m-d", $fecha);
								if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
									if( $orden->id_orden == $dictaminacion->id_orden){
										//$ti = $dictaminacion->estatus;
									}else{
										//$ti++;
										$se++;
									}
									
								}
							}
						}else{
							if($orden->estado == 4 || $orden-> estado == 9){
								if($orden->fecha_pago!='0000-00-00' && $orden->fecha_pago!=''){
									$fecha = strtotime($orden->fecha_pago."+ 7 days");
									$fecha_lib = date("Y-m-d", $fecha);
									if($fecha_lib!='0000-00-00' && $fecha_lib!=''){
										if( $orden->id_orden == $dictaminacion->id_orden){
											if($dictaminacion->estatus == 2 ){
												$supervisor++;
											}
											//$ti = $dictaminacion->estatus;
										}else{
											
										}
									}
								}
							}
							
						}
			}
		}

		$data_orden = array(
			'const' => $const,
			'user_se' => $user_se, 
			'ti' => $ti,
			'gas' => $gas,
			'meca_1' => $meca_1,
			'meca_2' => $meca_2,
			'sa' => $sa,
			'mi' => $mi,
			'ii' => $ii,
			'am' => $am,
			'supervisor' => $supervisor,
			'se'	=> $se,
			'user'		=> $user,
			

			
		);

		$usuario = false;
		if ($user!=false) {
			$usuarios = false;
			if ($user->tipo=="Docente"){
				$usuarios = $this->General_model->get('usuarios_docentes', array('id_user'=>$this->session->idUser), array(), '');
			}
			else{
				$usuarios = $this->General_model->get('personas_usuarios', array('id_user'=>$this->session->idUser), array(), '');
			}
			$usuario = ($usuarios!=false)? $usuarios->row(0) : false ;
		}		
		
		$periodos = $this->General_model->get('periodos', array('estado'=>1), array(), '');
		$periodo = ($periodos!=false)? $periodos->row(0): false;
		
		$config = array(
			'titulo'	=>	'Menú principal',
			'subtitulo'	=>	'',
			'usuario'	=>	$user->nombre,
			'menu'		=>	$menu,
			'submenu'	=>	$submenu,
			'periodo'	=>	$periodo,
		);
		
		/*Consultas generales*/
		$criterios_curp = array(
			'documento'	=> array(
				'texto' =>	'El documento NO es una <strong>CURP</strong>',
			),
			'digitalizacion'=> array(
				'texto' =>	'El documento NO esta correctamente escaneado/digitalizado',
			),
			'nombre'	=> array(
				'texto' =>	'Nombre del interesado(a) es INCORRECTO',
			),
			'fecha_nac'	=> array(
				'texto' =>	'ERROR en la Fecha de nacimiento',
			),
			'sexo'		=> array(
				'texto' =>	'Sexo del interesado(a) INCORRECTO',
			),
			'entidad'	=> array(
				'texto' =>	'Entidad federativa ERRONEA',
			),
			'curp'		=> array(
				'texto' =>	'ERROR en la Clave Única de Población',
			),
		);

		$criterios_acta = array(
			'documento'	=> array(
				'texto' =>	'El documento NO es un <strong>Acta de nacimiento</strong>',
			),
			'digitalizacion'=> array(
				'texto' =>	'El documento NO esta correctamente escaneado/digitalizado',
			),
			'nombre'	=> array(
				'texto' =>	'Nombre completo del interesado(a) es INCORRECTO',
			),
			'antiguedad'=> array(
				'texto' =>	'Antigüedad (2018 a la fecha)',
			),
			'nacionalidad_padres'	=> array(
				'texto' =>	'NO MENCIONA Nacionalidad de los padres',
			),
			'fecha_nac_doc'	=> array(
				'texto' =>	'Fecha de nacimiento INCORRECTA',
			),
			'lugar_nac_doc'		=> array(
				'texto' =>	'NO ESPECIFICA Lugar de nacimiento',
			),
			'fecha_reg'	=> array(
				'texto' =>	'NO COINCIDE Fecha de Registro',
			),
			'vivo'		=> array(
				'texto' =>	'NO SEÑALA “Presentado vivo”',
			),
			'sexo_doc'	=> array(
				'texto' =>	'NO INCLUYE Sexo',
			),
			'expedicion_doc'	=> array(
				'texto' =>	'Expedición del documento INCORRECTO',
			),
			'juez'		=> array(
				'texto' =>	'NO INCLUYE El Nombre y Firma del juez',
			),
			'sello'		=> array(
				'texto' =>	'El Sello del Registro Civil y Folio INCORRECTO',
			),
			'extemporaneidad'	=> array(
				'texto' =>	'SOLICITAR Constancia de Extemporaneidad EN SU REGISTRO CIVIL',
			),
			'legible'	=> array(
				'texto' =>	'NO SE VE Legible y completa',
			),
			'tachadura'	=> array(
				'texto' =>	'CONTIENE tachaduras, rayaduras o enmendaduras',
			),
			'qr'		=> array(
				'texto' =>	'NO SE LEE El código QR es legible',
			),
			'fecha_nac'	=>	array(
				'texto' =>	'Fecha de nacimiento',
			),
			'lugar_nac'	=>	array(
				'texto' =>	'Lugar de nacimiento',
			),
			'fecha_exp'	=>	array(
				'texto' =>	'Fecha de expedición del documento',
			),
			'sexo'		=>	array(
				'texto' =>	'Sexo',
			),
		);

		$criterios_certificado = array(
			'documento'	=>	array(
				'texto' =>	'El documento NO es un <strong>Certificado de Estudios</strong>',
			),
			'digitalizacion'=> array(
				'texto' =>	'El documento NO esta correctamente escaneado/digitalizado',
			),
			'leyenda' 	=> 	array(
				'texto' =>	'NO CONTIENE “Certificado de Estudios o Certificado de Terminación de Estudios”',
			),
			'institucion' 	=> 	array(
				'texto' =>	'Nombre de la Institución INCORRECTO',
			),
			'cct'		=>	array(
				'texto' =>	'CCT TIENE alteraciones',
			),
			'certificado' 	=>	array(
				'texto' =>	'NO CONTIENE “Certificado o Certifica”',
			),
			'nombre'	=>	array(
				'texto' =>	'NO CONTIENE el Nombre completo del interesado(a)',
			),
			'fotografia'=>	array(
				'texto' =>	'La Fotografía NO ESTA debidamente cancelada',
			),
			'curp'		=>	array(
				'texto' =>	'CURP INCORRECTAMENTE escrita',
			),
			'acredito'	=>	array(
				'texto' =>	'NO CONTIENE "Cursó o concluyó o acreditó o terminó ..."',
			),
			'bachillerato'	=>	array(
				'texto' =>	'NO CONTIENE "Bachillerato, Técnico-Bachiller, ..."',
			),
			'ciclo'		=>	array(
				'texto' =>	'Los Ciclos escolares NO APARECEN en una secuencia correcta en meses y años',
			),
			'fecha_exp_doc'	=>	array(
				'texto' =>	'NO CONTIENE Fecha de expedición',
			),
			'folio'		=>	array(
				'texto' =>	'Folio CON alteraciones',
			),
			'firmas'	=>	array(
				'texto' =>	'NO CONTIENE Firmas autógrafas o electrónicas',
			),
			'legalizacion'	=>	array(
				'texto' =>	'FALTA Legalización',
			),
			'certificado_bach'=>array(
				'texto' =>	'FALTAN PÁGINAS a Certificado de Bachillerato Estatal de 4 páginas ',
			),
			'fecha_exp'	=>array(
				'texto' =>	'Fecha de expedición',
			),
			'fecha_term'=>array(
				'texto' =>	'Fecha de término de ciclo escolar/acreditación',
			),
			'nombre_institucion'=>array(
				'texto' =>	'Nombre de la Institución',
			),
		);

		$observaciones_becas = false;
		$observaciones_dictaminacion = false;
		if ($usuario->tipo == 'Estudiante') {
			$matricula = substr($usuario->correo, 0, 10);
			$observaciones_becas = $this->General_model->get('becas_observaciones', array('matricula'=>$matricula, 'estado'=>0), array(), '');
			$observaciones_dictaminacion = $this->General_model->get('escolares_observaciones', array('tipo_observacion'=>'Dictaminacion', 'matricula'=>$matricula, 'estado'=>0), array('fecha'=>'desc'), '');
		}

		$show_modal_inscripcion = 0;
		if ($usuario->tipo == 'Aspirante') {
			$aspirantes = $this->General_model->get('aspirantes', array('id_persona' => $usuario->id_persona), array(), '');
			if ($aspirantes!=false){
				$aspirante = $aspirantes->row(0);
				if ($aspirante->estado==3) {
					$estudiantes = $this->General_model->get('estudiantes', array('id_persona' => $aspirante->id_persona), array(), '');
					if ($estudiantes!=false) {
						$estudiante = $estudiantes->row(0);
						if ($estudiante->protesta==0 && $estudiante->estado==0) {
							$show_modal_inscripcion = 1;
						}
					}
				}
			}
		}

		$data = array(
			'observaciones_becas'			=>	$observaciones_becas,
			'observaciones_dictaminacion'	=> 	$observaciones_dictaminacion,
			'criterios_curp'				=>	$criterios_curp,
			'criterios_acta'				=>	$criterios_acta,
			'criterios_certificado'			=>	$criterios_certificado,
		);
		
		$this->load->view('Commons/html_open_view', $config);
		$this->load->view('Commons/head_view');
		$this->load->view('Commons/body_open_view');
		$this->load->view('Commons/wraper_open_view');
		$this->load->view('Commons/navbar_view');
		$this->load->view('Commons/sidebar_view');
		$this->load->view('Commons/content_wraper_open_view');
		$this->load->view('Commons/content_wraper_header_view');
		
		/*Aqui va el contenido*/
		$this->load->view('Home/inicio_view', $data);
		if ($show_modal_inscripcion==1)
			$this->load->view('Home/inicio_modal_view', $data);

		if ($user->tipo=="Escolares Ventanilla") {
			if($user->id_user == $user_se->id_user){
				/*if($user_se->id_division == 7){
					if($ti>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}*/
				if($user_se->id_division == 8){
					if($const>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_division == 9){
					if($gas>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_usere == 5){
					if($meca_1>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_usere == 12){
					if($meca_2>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_division == 11){
					if($sa>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_division == 2){
					if($mi>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_division == 3){
					if($ii>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
				if($user_se->id_division == 13){
					if($am>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
			}
			
		}
		if ($user_se->id_usere==2) {
			if($user->id_user == $user_se->id_user){
				if($user_se->iddivision_constancia == 0){
					if($supervisor>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
			}

		}
		if ($user_se->id_usere==8) {
			if($user->id_user == $user_se->id_user){
				if($user_se->iddivision_constancia == 0){
					if($se>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
			}

		}
		if ($user_se->id_usere==13) {
			if($user->id_user == $user_se->id_user){
				if($user_se->iddivision_constancia == 0){
					if($se>0){
						$this->load->view('Home/inicio_constancias_modal_view', $data_orden);
					}
				}
			}

		}
		
		$this->load->view('Commons/content_wraper_close_view');
		$this->load->view('Commons/footer_view');
		$this->load->view('Commons/wraper_close_view');
		$this->load->view('Commons/scripts_view');
		$this->load->view('Home/inicio_js_view', $data);

		/*funcionalidad Javascript*/
		if ($show_modal_inscripcion==1)
			$this->load->view('Home/inicio_modal_js_view', $data);
		if ($user->tipo=="Escolares Ventanilla") {
			$this->load->view('Home/inicio_modal_js_view', $data);
		}
		if ($user_se->id_usere==2) {
			$this->load->view('Home/inicio_modal_js_view', $data);
		}
		if ($user_se->id_usere==13) {
			$this->load->view('Home/inicio_modal_js_view', $data);
		}
		
		$this->load->view('Commons/body_close_view');
		$this->load->view('Commons/html_close_view');
	}

}
