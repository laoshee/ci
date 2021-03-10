<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

    public function index() {
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('element/header_1');
        $this->load->view('v_ongkir',$data);
        // $this->load->view('element/footer');
    }

    function cek_ongkir() {
        $kota_asal = $_POST['kota_asal'];
        $kota_tujuan = $_POST['kota_tujuan'];
        $kurir = $_POST['kurir'];
        $berat = $_POST['total'] * 1000;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 53341588ddd45a3a026d55d75738286b"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        //echo json_encode($data);

        $kurir = $data['rajaongkir']['results'][0]['name'];
        $kotaasal = $data['rajaongkir']['origin_details']['city_name'];
        $provinsiasal = $data['rajaongkir']['origin_details']['province'];
        $kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
        $provinsitujuan = $data['rajaongkir']['destination_details']['province'];
        $berat = $data['rajaongkir']['query']['weight'] / 1000;
        $itemCount = $data['rajaongkir']['results'];
        echo "
        <div class='card horizontal'>
                <div class='card-stacked'>
                    <div class='card-content'>
                    <h2>Alamat Pengiriman dan Ongkir</h2>
                    <blockquote><p class='flow-text red-text'><b>";echo $this->session->flashdata('message');
                    echo
                    "</b></p></blockquote>
                    <div class='col s12 m12 l12'>";
                    echo '<table class="table table-striped table-bordered ">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nama Layanana</th>';
        echo '<th>Tarif</th>';
        echo '<th>ETD(Estimates Days)</th>';
        echo '<th>Pilih</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
            var_dump($value['service']);
            echo "<tr>";
            echo "<td>" . $value['service'] . "</td>";
            echo '';
            foreach ($value['cost'] as $tarif) {
                print_r($value['cost']);
                echo "<td align='right'>Rp " . number_format($tarif['value'], 2, ',', '.') . "</td>";
                echo "<td>" . $tarif['etd'] . " Day</td>";
                for($i = 1; $i <= 3; $i++){
                echo "    <td>
                <form onsubmit='return false'>
                    <input type='submit' id='input_ongkir".$i."' data-target=".$tarif['value']." class='tombol_ambilongkir ambil'  value=".$tarif['value']." onclick='getTarif'>    
                    <!--<input type='hidden' id='input_ongkir' class='ambil'  value=".$tarif['value']."/>-->
                    <button id='' data-id=".$tarif['value']." class='btn waves-effect waves-light red btn-small'  onclick='ambilongkir()'>choise</button>
                </form>
                <!--<button type='submit' name='submit' class='btn waves-effect waves-light red btn-small'>
                 <button>Pilih Ongkir--></td>";
            } }
            echo '';
            echo "";
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo "<form method='post' action=";echo base_url('customer/save_shipping_address');
        echo ">
            <div class='col s12 m12 l6'>
            <div style='display:none'>
                <input type='text' name='customer_id' value=".$this->session->userdata('customer_id')." hidden>
            </div>
            <div class='input-field col s12'>
                Nama :<input type='text' name='shipping_name' class='valdate'>
            </div>
            <div class='input-field col s12'>
                Kurir:
                <input type='text' name='kurir' value='". $kurir ."'>
            </div>       
            <div class='input-field col s12'>
                Berat:
                <input type='text' name='berat_kg' value=". $berat ." class=''>
            </div>      
            </div>
            <div class='col s12 m12 l6'>                       
            <div class='input-field col s12'>
                Kota Asal:
                <input type='text' name='kota_asal' value=". $kotaasal ." class=''>
            </div>                         
            <div class='input-field col s12'>
                Tujuan:
                <input type='text' name='kota_tujuan' value=". $kotatujuan ." class=''>
            </div>
            <div class='input-field col s12'>
                <input type='text' name='ongkos' id='hasil_ongkir'>
            </div>
            <div class='input-field col s12'>
                <button type='submit' class='btn waves-effect red waves-light'>Submit<i class='material-icons right'>send</i></button>
            </div>
        </div>
        </div>    
        </div>                         

        </form>
        </div>    
        </div>
        </div>";
    }
    

}