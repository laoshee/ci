<div class="container">
    <div class="row">

        <div class="col-sm-5">
            <div class="card">
                <h5 class="card-header text-black" style="background-color: .bg-secondary;">
                    Cek Ongkos Kirim
                </h5>          
                <div class="card-body">
                    <form class="form" id="ongkir" method="POST">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Kota Asal:</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="kota_asal" name="kota_asal" required="" onchange="tampilkan()">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Kota Tujuan</label>
                            <div class="col-sm-12">          
                                <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Kurir</label>
                            <div class="input-field col-sm-12">          
                                <select class="form-control" id="kurir" name="kurir" required="">
                                    <option value="" selected="selected">--Pilih kurir--</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Berat (Kg)</label>
                            <div class="col-sm-12">          
                                <input type="text" class="form-control" id="berat" name="berat" placeholder="Max. 30 KG" required="">
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="submit" class="btn btn-success col-sm-8">Cek</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7" id="response_ongkir">    
            <?php echo $this->session->flashdata('message'); ?>
        </div>

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


    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#kota_asal').select2({
            placeholder: '--Pilih kota/kabupaten asal--',
            language: "id"
        });

        $('#kota_tujuan').select2({
            placeholder: '--Pilih kota/kabupaten tujuan--',
            language: "id"
        });

        $.ajax({
            type: "GET",
            dataType: "html",
            url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
            success: function (msg) {
                $("select#kota_asal").html(msg);
            }
        });    
   
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "<?php echo site_url('kota/get_kota/kotatujuan'); ?>",
            success: function (msg) {
                $("select#kota_tujuan").html(msg);
            }
        });

        $("#ongkir").submit(function (e) {
            e.preventDefault();
            $.ajax({
                //url: 'cek_ongkir.php',
                url: "<?php echo site_url('ongkir/cek_ongkir'); ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    document.getElementById("response_ongkir").innerHTML = data;
                }
            });
        });

    });
</script>