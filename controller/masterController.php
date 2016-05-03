<?php

require('./model/roomsModel.php');

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
                //bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
                $to = 'b.arroba.h@gmail.com';
                $subjet = 'Formulario contacto';
                $txt = $subOption['desc'];
                $headers = 'From: webPlazaNueva@granada.com';
                mail($to, $subjet, $txt, $headers);
                //var_dump($subOption);
                //exit(0);    
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
}

?>