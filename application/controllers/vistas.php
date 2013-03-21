<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vistas extends CI_Controller {
//    public function __construct() {
//        parent::__construct();
//        // Check if the logged user
//        $this->check_logged_in();
//    }
//    public function check_logged_in() {
//        if ($this->session->userdata('idUsuario') == 0) {
//            $this->login();
//            exit();
//        }
//    }
    
	public function index(){
                $data = null;
                $this->load->library('rest');  
    //            $this->rest->api_key("android");
                if($this->session->userdata("idUsuario") > 0){
                    $this->load->view('vistas/header');
                    $data['u'] = $this->rest->post("server.php/usuarios/usuario/", 
                        array('idUsuario'=> $this->session->userdata('idUsuario')),
                        'json');
                    
//                            echo $this->rest->debug();
                    $tipo = $this->rest->post("server.php/usuarios/tipo_usuario/", 
                        array('idUsuario'=> $this->session->userdata('idUsuario')),
                        'json');
                    switch ($tipo){
                        case 'Seguridad':
                            $this->load->view('seguridad/index', $data);
                            break;
                        case 'Administrador':
                            $this->load->view('contador/index', $data);
                            break;
                        case 'Condomino':
                            $this->load->view('condomino/index', $data);
                            break;
                        default :
                            $this->load->view('vistas/index', $data);
                    }
                    $footer["tipo"] = $tipo;
                    $this->load->view('vistas/footer', $footer);
                }else{
                    if($this->session->flashdata('errorInvitacion')){
                        $data['errorInvitacion'] = true;
                    }
                    if($this->session->flashdata('errorLogin')){
                        $data['errorLogin'] = true;
                    }
                    
                    $this->load->view('vistas/header');
                    $this->load->view('vistas/login',$data);
                    $this->load->view('vistas/footer');
                }
//                $this->rest->debug();
        }
        public function login(){
            $this->load->view('vistas/header');
            $this->load->view('vistas/login');
            $this->load->view('vistas/footer');
}
        
        //Contador
        public function empleados_view(){
            $this->load->view('contador/empleados');
        }
        public function ocompra_view(){
            $this->load->view('contador/ocompra');
        }
        public function camaras_view(){
            $this->load->view('contador/camaras');
        }
        public function cobranza_view(){
            $this->load->view('contador/cobranza');
        }
        public function empresas_view(){
            $this->load->view('contador/empresas');
        }
        public function conceptos_view(){
            $this->load->view('contador/conceptos');
        }
        public function reportes_view(){
            $this->load->view('contador/reportes');
        }
        public function empresas_lista_view(){
            $this->load->model("abc_model");
            $data["empresas"] = $this->abc_model->get("empresas");
            $this->load->view('empresas/lista',$data);
        }

        public function mapa_view(){
            $this->load->model("usuario_model");
            $data["usuarios"] = $this->usuario_model->get_UsuariosPersona();
            $this->load->view('contador/condominos',$data);
        }
        public function notificacionesA_view($id){
            $this->load->model("mensaje_model");
            $data["mensajes"] = $this->mensaje_model->get_where($id);
            $this->load->view('contador/notificaciones',$data);
        }
        public function eventosA_view(){
            $this->load->view('contador/mycal');
        }

        //Condomino
        public function eventos_view(){
            $this->load->view('condomino/eventosCondo');
        }
        public function reservaciones_view(){
            $this->load->view('condomino/reservacionesCondo');
        }
        public function administracion_view(){
            $this->load->view('condomino/administracionCondo');
        }
        public function consulta_view(){
            $this->load->view('condomino/consultaCondo');
        }
        public function navegador_view(){
            $this->load->view('condomino/navegadorCondo');
        }
        public function notificaciones_view(){
            $this->load->view('condomino/notificacionesCondo');
        }
        //Temporal Condominio
        public function internos_view(){
            $this->load->view('condomino/eventos/internos');
        }
        public function externos_view(){
            $this->load->view('condomino/eventos/externos');
        }
        public function asambleas_view(){
            $this->load->view('condomino/eventos/asambleas');
        }
        public function dias_view(){
            $this->load->view('condomino/eventos/dias');
        }
        public function publicar_view(){
            $this->load->view('condomino/eventos/publicar');
        }
        


        //Seguridad
        public function navegadorS_view(){
            $this->load->view('seguridad/navegacionSeguridad');
        }
        public function notificacionesS_view(){
            $this->load->view('seguridad/notificacionesSeguridad');
        }
}