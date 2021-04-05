<center><h2>Pengiriman Barang</h2></center>
<center><h2 class="header"> <i class="large material-icons" style="display:contents">local_shipping</i></h2></center>

<div class="container">
<div class="row">

    <div class="col s12 m12 l12" id="layanan_pengiriman_hidden">
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        Kurir:
                        <div class="input-field col s12 ">
                        <select id="layanan_pengiriman" name="layanan_pengiriman" required="" placeholder="pilih kurir">
                            <option value="">--Pilih Jenis Layanan Pengiriman--</option>
                            <option value="GO">Gratis Ongkir</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                        </div>
                    </div>
                </div> 
                </div>
            </div>              
        </div>
    </div>

    

    <!-- <div id="response_ongkir"> a</div> -->

    <div id="tampil_layanan_pengiriman">

    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-trigger">
      <div class="modal-content" id="response_ongkir">
        <div class="loading" style="display: none;text-align: center;">
            <div class="preloader-wrapper active">
                <div class="spinner-layer spinner-red-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>
            </div>
        </div>
        <b></center> Pastikan data alamat pengiriman anda sudah terisi </center> </b> 
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn ">Keluar</a><!--btn-flat-->
      </div>
    </div>
            
</div>
</div>