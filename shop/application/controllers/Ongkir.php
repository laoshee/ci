<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

    public function index() {
        $data['cart_contents'] = $this->cart->contents();
        $data['title']    = 'Bazar Mall';
        $this->load->view('element/header');
        $this->load->view('web/pages/shipping',$data);
        // $this->load->view('v_ongkir',$data);
        $this->load->view('element/footer');
    }

    function cek_ongkir() {
        //$kota_asal = $_POST['kota_asal'];
        // $kota_tujuan = $_POST['kota_tujuan'];        
        $kota_asal = "445"; //kode SOLO
        $kota_tujuan = $this->input->post('ambilkotacity');//$_POST['kota_tujuan'];       
        // $kota_tujuan = "25";       
        $kurir =  $this->input->post('kurir');//$_POST['kurir'];
        // $kurir = 'jne';
        $beratnya = $this->input->post('total');//$_POST['total'] * 1000;//$this->input->post('kurir')* 1000;//$_POST['total'] * 1000;
        $berat = $beratnya*1000;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
            CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                // "key: 53341588ddd45a3a026d55d75738286b"
                // "key:7b09222b91d225794bb6e835112d31f3"
                "key: 7b09222b91d225794bb6e835112d31f3"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $data = json_decode($response, true);
        //echo json_encode($data);
        curl_close($curl);       


        $code_error     = $data['rajaongkir']['status']['code'];
        // $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // echo $httpcode;

        $nama               = $this->input->post('customer_name');
        $address            = $this->input->post('customer_address');
        $provinsi           = $this->input->post('ambilprovinsi');
        $customer_provinsi  = $this->input->post('customer_provinsi'); //id
        $kota               = $this->input->post('ambilkota');
        $kota_tujuan        = $this->input->post('kota_tujuan'); //id
        $desa               = $this->input->post('customer_desa');
        $phone              = $this->input->post('customer_phone');
        $cart_contents      = $this->cart->contents();

        if($code_error === 400 && $kurir != 'GO') {
            echo "<center><b>Pastikan data sudah di masukkan dengan benar, klik keluar untuk memastikan dan <i>input data</i></b></center>";
            // print_r($data);
            // var_dump($code_error);
            // print_r($code_error);
        // }elseif($code_error === 400 && $nama != '' && $address != ''&& $customer_provinsi != '' && $kota_tujuan != '' && $desa != ''&& $phone != '') {
        //     echo "<center><b>klik keluar untuk memastikan dan <i>input data</i></b></center>";
        }elseif($kurir === 'GO'){
            echo "
                <div class='card horizontal'>
                        <div class='card-stacked'>
                            <div class='card-content'>
                            <h2>Biaya Kirim dan Total Bayar</h2>
                            <blockquote><p class='flow-text red-text'><b>";echo $this->session->flashdata('message');
                            echo
                            "</b></p></blockquote>
                            <div class='col s12 m12 l12'>";
                            echo '<table class="table table-striped table-bordered ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Nama Layanan</th>';
                echo '<th>Tarif</th>';
                echo '<th>Estimasi</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo "<tr>";
                echo "<td> <div style='font:bold 16px Arial'> Gratis Ongkir </div>";
                echo "<td align='right'> Rp. 0.00";
                echo "<td align='center'> Call (-) </td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</div> <br>" ;

                echo "
            <div class='col m6 l6 offset-m6 offset-l6' style='border-style: dotted;border-color: red;'>
                <table style='float:right;text-align:left;' width='40%'>
                    <tr>
                        <th>Biaya Barang: </th>
                        <td>Rp. "; echo $this->cart->format_number($this->cart->total()); echo "</td>
                    </tr>";

        echo "<input type='text' hidden name='biayabarang' id='hasil_ongkir1' class='getambil_plusongkir' value='".$this->cart->total()."' onkeyup='getTotalbiaya_plusongkir()'>";
            // echo "Biaya : Rp. "; echo $this->cart->format_number($cart_items['subtotal']); echo "<br>";
            // echo "Biaya Kurir : <span id='hasil_ongkirtext' class=''onkeyup='getTotalbiaya_plusongkir()'></span>"; echo "<br>";
            // echo "<b>Total Biaya </b> : <div id='hasil_totalbiayatext'></div>";
        // }

        echo "
                    <tr>
                        <th>Biaya Kurir : </th>
                        <td><span>Rp. 0.00</span></td>
                    </tr>
                    <tr>
                        <th>Total Biaya :</th>
                        <td><span>Rp. "; echo $this->cart->format_number($this->cart->total()); echo "</span></td>
                    </tr>
                </table>
                </div>
            <form method='post' action=";echo base_url('customer/save_shipping_address');echo ">
                <div class='col s12 m12 l6' hidden>
                    <div style='display:none'>
                        <input type='text' name='customer_id' value=".$this->session->userdata('customer_id')." hidden>
                    </div>
                    <div class='input-field col s12'>
                        Nama :<input type='text' name='shipping_name' value ='".$nama."' class='valdate'>
                    </div>            
                    <div class='input-field col s12'>
                        alamat :<input type='text' name='shipping_alamat'  value ='".$address."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        prov :<input type='text' name='shipping_provinsi'  value ='".$provinsi."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        id prov :<input type='text' name='shipping_idprovinsi'  value ='".$customer_provinsi."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        nm kota :<input type='text' name='shipping_nmkota'  value ='".$kota."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        id tujuan :<input type='text' name='shipping_idkota'  value ='".$kota_tujuan."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        desa :<input type='text' name='shipping_desa'  value ='".$desa."' class='valdate'>
                    </div>
                    <div class='input-field col s12'>
                        phone :<input type='text' name='shipping_phone'  value ='".$phone."' class='valdate'>
                        <input type='text' name='shipping_idasal' value='".$kota_asal."'>
                        <input type='text' name='shipping_totbarang' value='"; echo $this->cart->total(); echo "'>

                    </div>

                    <div class='input-field col s12'>
                        Kurir:
                        <input type='text' name='kurir' value='GO'>
                    </div>       
                    <div class='input-field col s12'>
                        Berat:
                        <input type='text' name='berat_kg' value='". $beratnya ."' class=''>
                    </div>      
                </div>

                <div class='col s12 m12 l6' hidden>                       
                    <div class='input-field col s12'>
                        Kota Asal:
                        <input type='text' name='kota_asal' value='Surakarta (Solo)' class=''>
                    </div>                         
                    <div class='input-field col s12'>
                        Tujuan:
                        <input type='text' name='kota_tujuan' value='". $kota ."' class=''>
                    </div>
                    <div class='input-field col s12'>
                        <input type='text' name='ongkos' value='0'>
                        <input type='text' name='grand_total' value="; echo $this->cart->total(); echo ">

                    </div>
                </div>
                
                <div class='input-field col s12'>
                    <button type='submit' class='btn waves-effect red waves-light'>Bayar<i class='material-icons right'>send</i></button>
                </div>                       
            </form>

            </div>    
            </div>
            </div>";

        }else{
            $kurirr         = $data['rajaongkir']['results'][0]['name'];
            $kotaasal       = $data['rajaongkir']['origin_details']['city_name'];
            $provinsiasal   = $data['rajaongkir']['origin_details']['province'];
            $kotatujuan     = $data['rajaongkir']['destination_details']['city_name'];
            $provinsitujuan = $data['rajaongkir']['destination_details']['province'];
            $berat          = $data['rajaongkir']['query']['weight'] / 1000;
            $itemCount      = $data['rajaongkir']['results'];

        echo "
        <div class='card horizontal'>
                <div class='card-stacked'>
                    <div class='card-content'>
                    <h2>Biaya Kirim dan Total Bayar</h2>
                    <blockquote><p class='flow-text red-text'><b>";echo $this->session->flashdata('message');
                    echo
                    "</b></p></blockquote>
                    <div class='col s12 m12 l12'>";
                    echo '<table class="table table-striped table-bordered ">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nama Layanan</th>';
        echo '<th>Tarif</th>';
        echo '<th>Estimasi</th>';
        echo '<th>Pilih</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        // echo $data['rajaongkir']['origin_details']['city_name'];
        // echo "ke";
        // echo $data['rajaongkir']['destination_details']['city_name'];
        // echo "$berat";
        // echo "gram Kurir : ";
        // echo strtoupper($kurir);
        for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
            echo "<div title="; echo strtoupper($data['rajaongkir']['results'][$k]['name']);echo "style='padding:10px'>";
        for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
        // var_dump($data);

            echo "<tr>";
            echo "<td> <div style='font:bold 16px Arial'>"; echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];echo "</div>";
            // echo "<div style='font:normal 11px Arial'>"; echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];"</div></td>";
            echo "<td align='right'> Rp. "; echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'], 2, ',', '.');
            echo "<td align='center'>"; echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']; echo "</td>";
            echo "<td>";
            echo "<button id='".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."' class='btn-floating btn-small waves-effect waves-light red' onClick='reply_click(this.id)' ><i class='material-icons'>check</i></button> ";
            // echo "<form onsubmit='return false'>
            //         <input type='hidden' id='input_ongkir";echo $l+1; echo "' class='ambilongkir'  value=".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."/>
            //         <!--<button id='data_id' class='tombol_ambilongkir' data-isi='isi data terkini' onclick='ambilongkir'> b</button>  onclick='getTarif'  -->
                    
            //         <!--<input type='submit' id='tombol_ambilongkir' data-target='".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."' class='btn waves-effect waves-light red btn-small ' value='piilh' >-->
            //     </form>";
            echo "</td>";
            echo "</tr>";
                 
            }; 
                echo "
            </tbody>
            </table>
        </div> <br>" ;
    };
        // foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
        //     var_dump($value,"<br>");
        //     echo "<tr>";
        //     echo "<td>" . $value['service'] . "</td>";
        //     echo '';
            
            
        //     foreach ($value['cost'] as $tarif) {
        //         print_r([$tarif['value']]);
        //         echo " <select class='form-control' id='kurir' name='kurir' required='>
        //     <option value=' selected='selected'>--Pilih kurir--</option>";
        //       echo "
                   
        //                 <option value=".$tarif['value'].">" . $tarif['value'] . "</option>
        //             ";
        //     echo "</select>";

        //         // echo "<td align='right'>Rp " . number_format($tarif['value'], 2, ',', '.') . "</td>";
        //         // echo "<td>" . $tarif['etd'] . " Day</td>";
        //         // // for($i = 1; $i <= 3; $i++){ ".$i."
        //         // echo "    <td>
        //         // <form onsubmit='return false'>
        //         //     <input type='submit' id='input_ongkir' data-target=".$tarif['value']." class='tombol_ambilongkir ambil'  value=".$tarif['value']." onclick='getTarif'>    
        //         //     <!--<input type='hidden' id='input_ongkir' class='ambil'  value=".$tarif['value']."/>-->
        //         //     <button id='' data-id=".$tarif['value']." class='btn waves-effect waves-light red btn-small'  onclick='ambilongkir()'>choise</button>
        //         // </form>
        //         // <!--<button type='submit' name='submit' class='btn waves-effect waves-light red btn-small'>
        //         //  <button>Pilih Ongkir--></td>";
        //     }
        //     } //}
        //     echo '';
        //     echo "";
        //     echo "</tr>";
        // // }
        // echo '</tbody>';
        // echo '</table>';
        // foreach ($cart_contents as $cart_items) {
        echo "
            <div class='col m6 l6 offset-m6 offset-l6' style='border-style: dotted;border-color: red;'>
                <table style='float:right;text-align:left;' width='40%'>
                    <tr>
                        <th>Biaya Barang: </th>
                        <td>Rp. "; echo $this->cart->format_number($this->cart->total()); echo "</td>
                    </tr>";

        echo "<input type='text' hidden name='biayabarang' id='hasil_ongkir1' class='getambil_plusongkir' value='".$this->cart->total()."' onkeyup='getTotalbiaya_plusongkir()'>";
            // echo "Biaya : Rp. "; echo $this->cart->format_number($cart_items['subtotal']); echo "<br>";
            // echo "Biaya Kurir : <span id='hasil_ongkirtext' class=''onkeyup='getTotalbiaya_plusongkir()'></span>"; echo "<br>";
            // echo "<b>Total Biaya </b> : <div id='hasil_totalbiayatext'></div>";
        // }

        echo "
        
                    <tr>
                    <th>Biaya Kurir : </th>
                    <td><span id='hasil_ongkirtext' class=''></span>
                    </td>
                </tr>
                <tr>
                    <th>Total Biaya :</th>
                    <td><div id='hasil_totalbiayatext'><span id='hasil_ongkirtext' class=''></span></td>
                </tr>
            </table>
            </div>
        <form method='post' action=";echo base_url('customer/save_shipping_address');echo ">
            <div class='col s12 m12 l6' hidden>
                <div style='display:none'>
                    <input type='text' name='customer_id' value=".$this->session->userdata('customer_id')." hidden>
                </div>
                <div class='input-field col s12'>
                    Nama :<input type='text' name='shipping_name' value ='".$nama."' class='valdate'>
                </div>            
                <div class='input-field col s12'>
                    alamat :<input type='text' name='shipping_alamat'  value ='".$address."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    prov :<input type='text' name='shipping_provinsi'  value ='".$provinsi."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    id prov :<input type='text' name='shipping_idprovinsi'  value ='".$customer_provinsi."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    nm kota :<input type='text' name='shipping_nmkota'  value ='".$kota."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    id tujuan :<input type='text' name='shipping_idkota'  value ='".$kota_tujuan."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    desa :<input type='text' name='shipping_desa'  value ='".$desa."' class='valdate'>
                </div>
                <div class='input-field col s12'>
                    phone :<input type='text' name='shipping_phone'  value ='".$phone."' class='valdate'>
                    <input type='text' name='shipping_idasal' value='".$kota_asal."'>
                    <input type='text' name='shipping_totbarang' value='"; echo $this->cart->total(); echo "'>

                </div>

                <div class='input-field col s12'>
                    Kurir:
                    <input type='text' name='kurir' value='". $kurirr ."'>
                </div>       
                <div class='input-field col s12'>
                    Berat:
                    <input type='text' name='berat_kg' value='". $berat ."' class=''>
                </div>      
            </div>

            <div class='col s12 m12 l6' hidden >                       
                <div class='input-field col s12'>
                    Kota Asal:
                    <input type='text' name='kota_asal' value='". $kotaasal ."' class=''>
                </div>                         
                <div class='input-field col s12'>
                    Tujuan:
                    <input type='text' name='kota_tujuan' value='". $kotatujuan ."' class=''>
                </div>
                <div class='input-field col s12'>
                    <input type='text' name='ongkos' id='hasil_ongkir2' class='getambil_plusongkir' onkeyup='getTotalbiaya_plusongkir()'>
                    <input type='text' name='grand_total' id='grandtotal'>

                </div>
            </div>
            
            <div class='input-field col s12'>
                <button type='submit' class='btn waves-effect red waves-light'>Bayar<i class='material-icons right'>send</i></button>
            </div>                       
        </form>

        </div>    
        </div>
        </div>";
        }

    }

}