<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function kota(){
        $id = $this->input->post('id');
        $modul=$this->input->post('modul');

        // if($modul == "kabupaten"){
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=&province=$id",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "GET",
            //     CURLOPT_HTTPHEADER => array(
            //         "key:53341588ddd45a3a026d55d75738286b"
            //     ),
            // ));
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            // curl_close($curl);
            // $data = json_decode($response, true);
            // for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
            //     // echo "<option></option>";
            //     echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
            // }
            echo json_decode($modul);
            // var_dump($id);
        // }
    }

    function get_kota($q) {
        $id = $this->input->post('ambil');

        switch ($q) {
            case 'province':
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        // "key:53341588ddd45a3a026d55d75738286b"
                        "key: 7b09222b91d225794bb6e835112d31f3"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                    echo "<option value='' disabled selected></option>";
                for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                    // echo "<option></option>";
                    echo "<option value='" . $data['rajaongkir']['results'][$i]['province_id'] . "'>" . $data['rajaongkir']['results'][$i]['province'] . "</option>";
                }
                break;

            case 'get_province':
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/province?id=$id",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        // "key:53341588ddd45a3a026d55d75738286b"
                        "key: 7b09222b91d225794bb6e835112d31f3"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                // for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                    // echo "<option></option>";
                    echo "" . $data['rajaongkir']['results']['province'] . "";
                // }
                break;

            case 'kotaasal':
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    // CURLOPT_URL => "http://api.rajaongkir.com/starter/city", //?id=&province=$id",
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=&province=$id",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "key:7b09222b91d225794bb6e835112d31f3"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                    echo "<option value='' disabled selected>Pilih Kota</option>";
                for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                    echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
                }
                break;

            case 'get_city':
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=$id",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "key:7b09222b91d225794bb6e835112d31f3"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                // for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                    // echo "<option></option>";
                    echo "" . $data['rajaongkir']['results']['city_name'] . "";
                // }
                break;

            case 'kotatujuan':
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "key: 7b09222b91d225794bb6e835112d31f3"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $data = json_decode($response, true);
                for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                    echo "<option></option>";
                    echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
                }
                break;
        }
    }

}
