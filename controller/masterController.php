<?php

require('./model/roomsModel.php');

require('./vendor/PHPMailer/class.phpmailer.php');
require('./vendor/PHPMailer/class.smtp.php');

class masterController {
    public $html;

    public function __construct() {
        $this->html = file_get_contents('./view/tpl.html');
    }

    public function run($option, $subOption) {
        $menu = file_get_contents('./view/menu.html');
        $footer = file_get_contents('./view/footer.html');
        $sidebar = file_get_contents('./view/sidebar.html');

        $this->html = str_replace('{menu}', $menu, $this->html);
        $this->html = str_replace('{footer}', $footer, $this->html);
        $this->html = str_replace('{sidebar}', $sidebar, $this->html);
        $this->html = str_replace('{option}', $option, $this->html);

        $content = '';
        switch($option) {
            case 0:
                $content = file_get_contents('./view/index.html');
                break;
            case 1:
                $content = file_get_contents('./view/promotions.html');
                break;
            case 2:
                $content = file_get_contents('./view/reserves.html');
                break;
            case 3:
                switch($subOption) {
                    case 0:
                        $content = file_get_contents('./view/rooms.html');
                        break;
                    default:
                        $room = new roomsModel();
                        $dataRoom = $room->get($subOption);
                        $content = file_get_contents('./view/room.html');

                        foreach($dataRoom[0] as $key => $value) {
                            $content = str_replace('{'.$key.'}', $value, $content);
                        }
                        break;
                }
                break;
            case 4:
                $content = file_get_contents('./view/services.html');
                break;
            case 5:
                switch($subOption) {
                    case 1:
                        $content = file_get_contents('./view/location.html');
                        break;
                    case 2:
                        $content = file_get_contents('./view/contact.html');
                        break;
                }
                break;
            case 6:
                //Action que maneja los datos de formulario de contacto
                $this->emailContact($subOption);
                break;
            default:
                $content = file_get_contents('./view/index.html');
                break;
        };

        $this->html = str_replace('{content}', $content, $this->html);


        //ejm
        //$lang = cogestr_bdd($strs, $idioma);

        //foreach($lang as $key => $value) {
        //    $this->html = str_replace('{'.$key.'}', $value, $this->html);
        //}
        //fin ejm

        return $this->html;
    }
    
    public function emailContact($data) {
        $mail = new PHPMailer();
        $mail->IsSMTP();

        // la dirección del servidor, p. ej.: smtp.servidor.com
        $mail->Host = "smtp.gmail.com";

        // dirección remitente, p. ej.: no-responder@miempresa.com
        $mail->setFrom('no-responder@plazanueva.com', 'Plaza Nueva Hotel');

        // nombre remitente, p. ej.: "Servicio de envío automático"
        $mail->FromName = "Envio automatico";

        // asunto y cuerpo alternativo del mensaje
        $mail->Subject = "Informacion cliente: ".$data['data'];
        $mail->Body = "Mensaje: ".$data['desc'];
        $mail->AltBody = "Cuerpo alternativo para cuando el visor no puede leer HTML en el cuerpo"; 

        // si el cuerpo del mensaje es HTML
        //$mail->MsgHTML($body);

        // podemos hacer varios AddAdress
        $mail->AddAddress("b.arroba.h@gmail.com", "Administrador");
        $mail->AddAddress($data['email'], "Remitente");

        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = "b.arroba.h@gmail.com";
        $mail->Password = "L056enQrr9";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;


        if(!$mail->Send()) {
            echo "Error sending: " . $mail->ErrorInfo;
        } else {
            header('Location: http://localhost/plazaNueva/index.php');
        }

    }
}

?>