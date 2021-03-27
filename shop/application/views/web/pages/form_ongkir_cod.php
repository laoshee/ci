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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            Kurir:
                            <div class="input-field col s12 ">
                            <select id="kurir" name="kurir" required="" placeholder="pilih kurir">
                                <option value="COD" selected>COD (gratis)</option>
                            </select>
                            </div>
                        </div>
                    </div> 
                    <?php
                        $i = 0;
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                    ?>

                    <div class="form-group" hidden>
                        <div class="col-sm-12">          
                            <input type="text" id="berat<?=$i?>"  class="form-control ambil"  name="berat" value="<?php echo $cart_items['options']['p_weight']?>" onkeyup="getBerat()">
                        </div>
                    </div>
                    <?php } ?>

                    
                    <div class="form-group" hidden>
                        <label class="control-label col-sm-4">Berat (Kg)</label>
                        <div class="col-sm-12">          
                            <input type="text" class="form-control" id="tampil_total" name="total">
                        </div>
                    </div>

                    <div class="form-group">        
                        <div class="col-sm-offset-3 col-sm-8">
                            <!-- <button type="submit" class="btn btn-success col-sm-8 " onclick="test()">Cek</button> -->
                            <button type="submit"  onclick="test()" id="modal2" class="waves-effect waves-light btn modal-trigger but red" href="#modal1" >Check</button>
                            <button type="submit"  class="waves-effect waves-light btn" onClick="refreshPage()">Kembali</button>

                        </div>
                    </div>
                </form>

                </div>
                </div>
            </div>
        </div>
    </div>