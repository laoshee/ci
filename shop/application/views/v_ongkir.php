    <!-- <table class="highlight">
        <thead>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($cart_contents as $cart_item) {
                $i++;
                ?>
                <tr>
                    <td><input type="text" id="id_produk<?=$i;?>" value="<?php echo $cart_item['id'] ?>"/></td>
                </tr>
            <?php } ?>
        </tbody>
    </table> -->

<!-- <center><h2>Pengiriman Barang</h2></center>
<center><h2 class="header"> <i class="large material-icons" style="display:contents">local_shipping</i></h2></center> -->

<!-- <div class="container">
<div class="row"> -->
<blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('message'); ?></b></p></blockquote>

    <div class="col s12 m6 l6">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <div class="row">
                <form class="form" id="ongkir" method="POST">
                    <div class="row" >
                    <div class="col s12">
                            Nama:
                            <div class="input-field col s12">
                                <input type="text" name="customer_name" id="customer_ambilnama" class="validate" value="">
                            </div>
                        </div>
                    </div> 
                    <div class="row" >
                    <div class="col s12">
                            Alamat:
                            <div class="input-field col s12">
                                <input type="text" name="customer_address" id="customer_ambiladdress" class="validate" >
                            </div>
                        </div>
                    </div>   
                    <div class="row" hidden>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" id="id_ambilprovinsi" name="ambilprovinsi">
                            </div>
                        </div>
                    </div>    
                    <div class="row" hidden>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" id="id_ambilkota" name="ambilkota">
                            </div>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col s12">
                            Provinsi:
                            <div class="input-field col s12">
                            <select id="id_provinsi" name="customer_provinsi" class="browser-default" placeholder="pilih provinsi">
                                <option value="" disabled selected>Pilih Provinsi</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            Kota:
                            <div class="input-field col s12 ">
                            <select id="kota_asalnya" name="kota_tujuan" class="browser-default" placeholder="pilih kota">
                                <option value="" >Pilih Provinsi dulu</option>
                            </select>
                            </div>
                        </div>
                    </div> 
                    <div class="row" >
                        <div class="col s12">
                            Desa/Kelurahan:
                            <div class="input-field col s12">
                                <input type="text" name="customer_desa" id="customer_ambildesa" class="validate">
                            </div>
                        </div>
                    </div>  

                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l6">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <div class="row">
                    <div class="col s12">
                            Phone:
                            <div class="input-field col s12">
                                <input type="number" name="customer_phone" id="customer_ambilphone" class="validate">
                                <!-- <label for="email_inline">Email</label> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            Kurir:
                            <div class="input-field col s12 ">
                            <select id="kurir" name="kurir" required="" placeholder="pilih kurir">
                                <option value=""></option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                            </div>
                        </div>
                    </div> 

                    <?php
                        $i = 0;
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                            // print_r($cart_items);
                    ?>

                    <div class="form-group" hidden>
                        <div class="col-sm-12">          
                            <input type="text" id="berat<?=$i?>"  class="form-control ambil"  name="berat" value="<?php echo $cart_items['options']['p_weight']?>" onkeyup="getBerat()">
                            <!-- <input type="text" id="berat<?=$i?>" class="form-control ambil" name="qty" value="10" onkeyup="getItems()"> -->
                        </div>
                    </div>

                    <?php } ?>

                    
                    <div class="form-group" hidden>
                        <label class="control-label col-sm-4">Berat (Kg)</label>
                        <div class="col-sm-12">          
                            <!-- <input type="text" class="form-control" id="total" name="total" placeholder="Max. 30 KG" required=""> -->
                            <input type="text" class="form-control" id="tampil_total" name="total">
                        </div>
                    </div>

                    <div class="form-group">        
                        <div class="col-sm-offset-3 col-sm-8">
                            <!-- <button type="submit" class="btn btn-success col-sm-8 " onclick="test()">Cek</button> -->
                            <button type="submit"  onclick="test()" id="modal2" class="waves-effect waves-light btn modal-trigger but red" href="#modal1" >Check</button>
                            <button type="submit" class="waves-effect waves-light btn" onClick="refreshPage()">Kembali</button>

                        </div>
                    </div>
                </form>

                </div>
                </div>
            </div>
        </div>
    </div>

<!-- </div> -->
 

 
  <!-- </div> -->
  
<!-- <div class="col s12 m6 l6" id="response_ongkir">    
    <?php echo $this->session->flashdata('message'); ?>
</div> -->
<script>

    // function ambilongkir(){
    //     // $('#data_id').click(function () {
    //         var cek = document.getElementsByClassName("tombol_ambilongkir");
    //         var nilai_form = document.getElementById('data_id');
    //         var ambilVal = $(this).attr('data-isi');
    //             $("#hasil_ongkir").val(ambilVal);
    //         console.log(ambilVal);
    //         console.log(nilai_form);
    //         console.log(cek);
                
    //         // });
    //     };
    //     ambilongkir();
    // // $('.ambil').on('click', function (e) {
    //     function ambilongkir(){
    //         console.log("cek2");

    //         let $this = $(".tombol_ambilongkir"); 
    //         let $this1 = $("#tombol_ambilongkir"); 
    //         let data = $this.attr("data-id");
    //         // var data = $("#tombol_ambilongkir").children("td[data-target=cityPublisher]").attr("id");
    //         // cegah redirect, soalnya itu element 'a', kalo ada href malah redirect lagi
    //         // e.preventDefault();
    //         console.log("cek");
    //         var total = 0;
    //         var itemCount = document.getElementsByClassName("ambil");
    //         var id= "";
    //         // for(var i = 0; i < itemCount.length; i++)
    //         //     {
    //         //         id = "input_ongkir"+(i+1);
    //         //         ambil = total +  parseint(document.getElementById(id).value);
    //         //     }
    //         // let $this = $(this);
    //         // let $this = $("#ambilongkir").html();
    //         // let id = $this.attr('data-id'); // pake ini coba, kali aja bisa
    //         var nilai_form = document.getElementById('input_ongkir2').value;
    //         // document.getElementById('hasil_ongkir').value = ambil;
    //         // // var data = preg_replace("/[^0-9]/", "", $nilai_form); //untuk PHP
    //         // var data = nilai_form.replace(/[^0-9]/gi, ''); //untuk g adalah global
    //         console.log(nilai_form);
    //         // console.log(data);
    //         // console.log(ambil);
    //         console.log($this1);
    //         console.log(data);
    //         // console.log(e);
    //         document.getElementById("hasil_ongkir").value=data;
    //     // });
    //     };


</script>


    <!-- <div class="col s12 m12 l6">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <h2>Shipping Address</h2>
                <blockquote><p class="flow-text red-text"><b><?php echo $this->session->flashdata('message'); ?></b></p></blockquote>
                    <form method="post" action="<?php echo base_url('customer/save_shipping_address');?>">
                        <div style="display:none">
                            <input type="text" name="customer_id" value="<?= $this->session->userdata('customer_id'); ?>" hidden>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="shipping_name" class="valdate">
                            <label >Name</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" id="tampil_asalkota" name="shipping_phone" class="" >
                            <label >Kota asal</label>
                        </div>                                    
                        <div class="input-field col s12">
                            <input type="text" name="shipping_address" class="">
                            <label >Kota Tujuan</label>
                        </div>                         
                        <div class="input-field col s12">
                            <input type="text" name="shipping_city" class="">
                            <label >Kurir</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" name="shipping_zipcode" class="">
                            <label >berat</label>
                        </div>
                        <input type='text' id='hasil_ongkir' name="ongkirnya">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect red waves-light">Submit<i class="material-icons right">send</i></button>
                        </div>   
                    </form>
                </div>
            </div> 
        </div>    
    </div> -->