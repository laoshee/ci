<script type="text/javascript">
// $('.amount').change(function() {
//     $('#total').attr('value', function() {
//         var result = 0;
//         $('.amount').each(function() {
//             result += $(this).attr('value');
//         });
//         return result;
//     });
// });

    // DROP 06-01-2021
    // var x = 0;
    // var y = 0;
    // var z = 0;

    // function calc(obj) {
    //     var e = obj.id.toString();
    //     var w = document.getElementById('amount1').value;
    //     // if (e == 'amount1') {
    //         x = Number(document.getElementById('amount2').value);
    //         y = document.getElementById('amount1').innerHTML ;

    //         u = y.split('.')[0];
    //         v = u.replace( /[^0-9]/g , '');
    //         // a = Number(v);
    //         // w = parseFloat(v);
    //         // b = parseInt(v);
    //         // d = v.substr(2,2);
    //         z = (x*v);

    //         var	number_string = z.toString(),
    //         split	= number_string.split(','),
    //         sisa 	= split[0].length % 3,
    //         rupiah 	= split[0].substr(0, sisa),
    //         ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
                
    //         if (ribuan) {
    //             separator = sisa ? ',' : '';
    //             rupiah += separator + ribuan.join(',');
    //         }
    //         rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah +'.00';

    //     // } else {
    //     //     x = parseInt(Number(document.getElementById('amount1').value));
    //     //     y = Number(obj.value);
    //     //     // w = parseInt(x);
    //     // }
    //     c = z.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); //toLocaleString();
    //     document.getElementById('total').value = rupiah;
    //     // document.getElementById('update').innerHTML = z;
    // }
    // $(document).on('click','#update_cart',function(){
    // // $('#update_cart').change(function(e){
    //     // e.preventDefault();
    //     var data = $('#update_cart').val();
    //     var data_id = $('#id_cart').val();
    //     $.ajax({
    //         url: "<?php echo site_url('web/update_cart') ?>",
    //         type: "POST",
    //         dataType: "json",
    //         data: {qty:data, rowid:data_id},
    //         error:function(e){
    //             console.log(e);
    //         },
    //         success: function(data){
    //             console.log(data);
    //         }
    //     });
    // });
    // function calc() {
    //     var ambil = document.getElementById("update_cart").value;
    //     $.ajax({
    //         url : "<?php echo base_url();?>web/update_cart",
    //         method : "POST",
    //         data : {qty : ambil},
    //         success :function(data,ambil,qty){
    //             console.log(ambil);
    //             // console.log(data);
    //             console.log(qty);
    //             // $('#card_load').load("<?php echo base_url();?>cart");
    //             // $('#subtotal').value(data);
    //             // $('#subtotal').html(data);
    //         }
    //     });
    // }
    // $("#update_cart").change(function(){
    //     // var value=$(this).val();
    //     var value=$('#update_cart').val();
    //     var data_id = $('#id_cart').val();
    //         // if(value>0){
    //             $.ajax({
    //                 data:{modul:data_id,kab_ambil:value},
    //                 error: function (e,modul,kab_ambil,value,data_id){
    //                     $("#total").val(data_id);

    //                 },
    //                 success: function(respond,modul,kab_ambil,value,data_id){
    //                     $("#total").val(kab_ambil);
    //                 }
    //             })
    //     // }

    // });
    // $(document).on('click','#update_cart',function(){
    //     $('#update_cart').change(function(e){
    //     var ambil=$(this).attr("id"); //mengambil row_id dari artibut id
    //     var data_id = $('#id_cart').val();
    //     $.ajax({
    //         url : "<?php echo base_url();?>web/update_cart",
    //         method : "POST",
    //         data : {qty : ambil, rowid:data_id},
    //         success :function(data,ambil,qty,data_id){
    //             console.log(ambil);
    //             // console.log(data);
    //             console.log(qty);
    //             $('#total').val(data_id);
                
    //             // $('#card_load').load("<?php echo base_url();?>cart");
    //             // $('#subtotal').value(data);
    //             // $('#subtotal').html(data);
    //         }
    //     });
    // });


    $(document).ready(function () {

        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});
        
        $(".tombol_detailproduk").click(function() {
            var id=$(this).val();

            $.ajax({
            url  : "<?php echo base_url('customer/detail_idcart')?>",
            dataType : "JSON",
            type : "POST",
            data : {orderid:id},
            beforeSend: function () {
        		$('.loading').show();
			},
			complete: function(){
				$(".loading").hide();
			},
			error: function (request, error) {
					console.log(request);
				},
            success :function(result){
                console.log(result);
                $("#box_produk").toggle("slow");
                $("#box_produk1").toggle("fast");
                // $('.produk').text("cek");
                // $('.gambar').text("cek1");
                var html = '';
                var dt = '';
                var sum = 0;
                   var i;
                   for(i=0; i<result.length; i++) {
                       html +="<tr>"+
                                   "<td style='width:10%'><img class='responsive-img' src='<?php echo base_url()?>assets/uploads/"+result[i].product_image+"' alt=''/></td>"+
                                   '<td>'+result[i].product_name+'</td>'+
                                   '<td>'+result[i].product_price+'</td>'+
                                   '<td>'+result[i].qty+'</td>'+
                                   '<td>'+result[i].total+'</td>'+
                               '</tr>';
                               var inputVal = result.product_price;
                       }
                    //    $(selector).each(function() {
                        
                            sum += Number(result.product_price);//Number($(this).text());
                        // });
                       dt +=
                            "<table style='float:right;text-align:left;' width='40%'>"+
                                "<tr>"+
                                    "<th>Sub Total : </th>"+
                                    "<td>Rp." +inputVal+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>TAX : </th>"+
                                    "<td>Rp. "+
                                    "</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>Grand Total :</th>"+
                                    "<td>Rp. </td>"+
                                "</tr>"+
                            "</table>";
                       $('.produk').html(html);
            }
        });

        $.ajax({
            url  : "<?php echo base_url('customer/detail_idcarttotal')?>",
            dataType : "JSON",
            type : "POST",
            data : {orderid:id},
			error: function (request, error) {
					console.log(request);
				},
            success :function(result){
                console.log(result);
                var dt = '';
                var sum = 0;
                // var tax = (result.price * 15) / 100;
                        
                            // sum += Number(result.product_price);//Number($(this).text());
                       dt +=
                            "<table style='float:right;text-align:left;' width='40%'>"+
                                "<tr>"+
                                    "<th>Sub Total : </th>"+
                                    "<td>Rp." +result.price+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>TAX : </th>"+
                                    "<td>Rp."+result.tax +
                                    "</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>Grand Total :</th>"+
                                    "<td>Rp. "+result.total+"</td>"+
                                "</tr>"+
                            "</table>";
                       $('.calculate').html(dt);
            }
        });

        })


        // document.getElementById("tombol_ambilongkir");
        // addEventListener("click", tampilkan_nilai_form);
        // function tampilkan_nilai_form(){
        //     var nilai_form = document.getElementById('input_ongkir').value;
        //     document.getElementById("hasil_ongkir").value=nilai_form;
        // } //disable karena ada di v_ongkir (tidak di pakai juga)

        $('select').formSelect();
        // $("select").material_select(); 
        // $('.modal-trigger').leanModal();
        $('.modal-trigger').modal({
            dismissible: false,
            opacity: 0.7
        });
        // $('.but').trigger('click');
        // $( ".but" ).last().click(function() {
        // $( ".modal-trigger" ).first().trigger( "click" );
        // // update( $( "span" ).last() );
        // });
        
        $("#layanan_pengiriman").on("change", function(){
        // $('#layanan_pengiriman').click(function(){
            var menu = $(this).attr('id'); //jupuk ID ne tok. hasil layanan_pengiriman
            var pilihan = document.getElementById("layanan_pengiriman").value;
            var pindah_cod = "<?php echo site_url('Api/Shipping/cod'); ?>";
            var pindah_kurir = "<?php echo site_url('Api/Shipping/kurir'); ?>";
            // var total = document.getElementById('total').value;
            var html = '';
            console.log(pilihan);
                if(pilihan === "COD"){
                    $('#tampil_layanan_pengiriman').load(pindah_cod, function(){
                        $("#layanan_pengiriman_hidden").hide();
                        //alert("aawa");
                        // $('.badan').load('tutorial.php');						
                    });					
                }else{
                    $('#tampil_layanan_pengiriman').load(pindah_kurir, function(){
                        $("#layanan_pengiriman_hidden").hide();
                        // $("#tampil_total").val(total);
                        // $("#kurir").val(pilihan);
                        // $("#kurir option:selected").val() == pilihan;
                        // document.getElementById("kurir").onclick = pilihan;//"You selected: "+document.getElementById("se").value;  
                        // $("#kurir option:selected").val(pilihan);
                        // if(pilihan === 'tiki'){
                        //     html += "<option value='tiki' >TIKI</option> <option value='jne' selected>JNE</option>";
                        //     $('#tampil_kurir').html(html);
                        // }else{
                        //     html += "<option value='pos'>POS</option>";
                        //     $('#tampil_kurir').html(html);
                        // }
                        console.log(pilihan);

                    });
                }
        });

    }); //PENUTUP DOCUMENT
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"><i class="tiny material-icons" style="display:contents">keyboard_capslock</i></a></span>
<!--  -->
<link href="<?php echo base_url()?>assets/web/css/flexslider.css" rel='stylesheet' type='text/css' />

<script type="text/javascript" src="<?php echo base_url()?>assets/materialize/js/materialize.min.js"></script>

<script defer src="<?php echo base_url()?>assets/web/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

    // $(document).ready(function () {
    // $(".itemQty").on('change',function(){
    // $('#update_cart').change(function(e){
    $('.itemQty').change(function(){
        var el= $(this).closest('tr');
        var id = $(el).find('#rowid').val();
        var a = $(el).find('#totberat').val();
        var b = $(el).find('#berat_satuan').val();
        // var c = $(el).find('#product_id').val();
        var qty = $(this).val();
        $.ajax({
            url  : "<?php echo base_url('web/update_cart')?>",
            // url : "<?php echo base_url();?>web/update_cart",
            dataType : "JSON",
            type : "POST",
            data : {idrow:id,qty:qty,totberat:a,berat_satuan:b},
            beforeSend: function () {
        		$('.loading').show();
			},
			complete: function(){
				$(".loading").hide();
			},
			error: function (request, error,idrow) {
					console.log(request);
					alert(" Can't do because: " + error + request + c+ a+ b);
				},
            success :function(result,html,respons){
                window.location.href='';
                // $('.onload_cart').load('web/cart_autoqty');           

                // $('#onload_cart').html("<h2>Contact Form Submitted!</h2>");
                // $("#onload_cart").show();
                // $('#onload_cart').load("<?php echo base_url('web/cart_autoqty'); ?>");
                // console.log(ambil);
                // // console.log(data);
                console.log(result);
                console.log(respons);
                // $('#total').val(result);
                
                // $('#card_load').load("<?php echo base_url();?>cart");
                // $('#subtotal').value(data);
                // $('#subtotal').html(data);
            }
        });
        // return false;
    });
    // });
    // $("#add-singlecart").click(function(){
    function confirm_addcart(){
        swal.fire({
            title: "Saved in your shopping cart. Would you like to go to your shopping cart?",
            // text: "If you delete this post all associated comments also deleted permanently.",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonClass: "",
            confirmButtonText: "cart",
            cancelButtonText: "shopping",
            cancelButtonColor: '#aaa',
            confirmButtonColor: '#26a69a',
        })
        .then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('save/cart'); ?>",
                    data: $('.form-singlecart').serialize(),
                    beforeSend: function () {
                        $('.loading').show();
                    },
                    complete: function(){
                        $(".loading").hide();
                    },
                    success: function(result) {
                        console.log(result);
                        var links = document.getElementsByTagName("loading"),
                            i = 0,
                            l = links.length,
                            body = document.body;
                            // Swal.fire( 'Good job!', 'You clicked the button!', 'success' )
                            window.location.href = '<?=site_url('cart')?>';
                            for (; i < l; i++) {
                                links[i].addEventListener("click", function() {
                                    body.className = "loading";
                                    setTimeout(function() {
                                        body.className = "";
                                    }, 3000);
                                }, false);
                            }
                    },
                    // afterSend : function(data){
                    //         Swal.fire( 'Good job!', 'You clicked the button!', 'error' )
                    // }
                    });                    
                // .then(okay => {
                // if (okay) {
                //     window.location.href = "";
                // }
                // });
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('save/cart'); ?>",
                    data: $('.form-singlecart').serialize(),
                    beforeSend: function() {
                        $('.loading').show();
                    },
                    complete: function(){
                        $(".loading").hide();
                        // Swal.fire( 'Good job!', 'You clicked the button!', 'success' )
                    },
                    success: function(result) {
                        console.log(result);
                        // var links = document.getElementsByTagName("loading"),
                        //     i = 0,
                        //     l = links.length,
                        //     body = document.body;
                        //     // Swal.fire( 'Good job!', 'You clicked the button!', 'success' )
                        //     window.location.href = '';
                        //     for (; i < l; i++) {
                        //         links[i].addEventListener("click", function() {
                        //             body.className = "loading";
                        //             setTimeout(function() {
                        //                 body.className = "";
                        //             }, 3000);
                        //         }, false);
                        //     }

                    },
                    });   
            }
        })
        // }); //penutup
        }

    // $(function(){
	// 	$.ajaxSetup({
	// 		type:"POST",
	// 		url: "<?php echo site_url('kota/get_kota/kotaasal') ?>",
	// 		cache: false,
	// 	});

        // $(".kota_asal").change(function(){
        //     var id = $(this).find(':selected')[0].id;
        //     $.ajax({
        //         type: 'POST',
        //         url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
        //         // data: {
        //         //     'id': id
        //         // },
		// 	// var value=$(this).val();
		// 		// if(value>0){
		// 			// $.ajax({
        //             // type: "GET",
        //             // dataType: "html",
        //             // url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
		// 			// data:{modul:'kabupaten',kab_ambil:value},
        //             error:function(e){
        //                 console.log(e);
        //             },
		// 			success: function(data){
		// 			// $("select#kota_asal").html(respond);
        //             $('select#kota_asal').html('');
        //             for (var i = 0; i < jsonObj.length; i++) {
        //                 $("<option />").val(jsonObj[i].code)
        //                 .text(jsonObj[i].name)
        //                 .appendTo($('select#kota_asal'));
        //             }
        //             console.log(msg);
		// 		}
		// 	})
		// // }

		// });

        // $.ajax({
        //     type: "GET",
        //     dataType: "html",
        //     url: "<?php echo site_url(''); ?>",
        //     success: function (msg) {
        //         $("select#kota_asal").html(msg);
        //     }
        // }); 
		// $("#kabupaten-kota").change(function(){
		// 	var value=$(this).val();
		// 		if(value>0){
		// 			$.ajax({
		// 			data:{modul:'kecamatan',id:value},
		// 			success: function(respond){
		// 			$("#kecamatan").html(respond);
		// 		}
		// 	})
		// }
		// })

		// $("#kecamatan").change(function(){
		// 	var value=$(this).val();
		// 		if(value>0){
		// 			$.ajax({
		// 			data:{modul:'kelurahan',id:value},
		// 			success: function(respond){
		// 			$("#kelurahan-desa").html(respond);
		// 		}
		// 	})
		// } 
		// })

    // })
    
    // $("#kota_asalnya").click(function(){
        $('#id_provinsi').select2({
            placeholder: '--Pilih provinsi--',
            language: "id"
        });

        $('#kota_asalnya').select2({
            placeholder: '',
            language: "id"
        });

        // $('#kota_asalnya').select2({
        //     placeholder: '--Pilih kota/kabupaten asal--',
        //     language: "id"
        // });
        $('#kota_asalnya').chips({
            placeholder: 'Enter a tag',
        });

        $.ajax({
            type: "GET",
            dataType: "html",
            url: "<?php echo site_url('kota/get_kota/province'); ?>",
            success: function (msg) {
                $("select#id_provinsi").html(msg);
            }
        }); 

        $("#id_provinsi").change(function(){
            var value=$(this).val();
            var datax = $('#id_provinsi').val();
                if(value>0){
                    $.ajax({
                        // url: "<?php echo site_url('kota/kota'); ?>",
                        url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
                        dataType : "html",
                        type : "POST",
                    // type: "GET",
                    // dataType: "html",
                    data:{ambil:datax},
                    error: function (xhr, ajaxOptions, thrownError,value) {
                        console.log(xhr.status);
                        console.log(thrownError);
                        console.log(datax);
                        console.log(value);
                    },
                    success: function(msg,value,e,xhr,responseText){
                        $("select#kota_asalnya").html(msg);
                }
                })
            }
        });

        $("#id_provinsi").change(function(){
            var value=$(this).val();
            var datax = $('#id_provinsi').val();
                if(value>0){
                    $.ajax({
                        url: "<?php echo site_url('kota/get_kota/get_province'); ?>",
                        dataType : "html",
                        type : "POST",
                    data:{ambil:value},
                    error: function (xhr, ajaxOptions, thrownError,value) {
                        console.log(xhr.status);
                        console.log(thrownError);
                        console.log(datax);
                        console.log(value);
                    },
                    success: function(msg,value,e,xhr,responseText,datax){
                        $("#id_ambilprovinsi").val(msg);
                    }
                })
            }
        });

        $("#kota_asalnya").change(function(){
            var value=$(this).val();
            var datax = $('#kota_asalnya').val();
                if(value>0){
                    $.ajax({
                        url: "<?php echo site_url('kota/get_kota/get_city'); ?>",
                        dataType : "html",
                        type : "POST",
                    data:{ambil:value},
                    error: function (xhr, ajaxOptions, thrownError,value) {
                        console.log(xhr.status);
                        console.log(thrownError);
                        console.log(datax);
                        console.log(value);
                    },
                    success: function(msg,value,e,xhr,responseText,datax){
                        $("#id_ambilkota").val(msg);
                    }
                })
            }
        });

        // $.ajax({
        //     type: "GET",
        //     dataType: "html",
        //     url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
        //     success: function (msg) {
        //         $("select#kota_asalnya").html(msg);
        //     }
        // });    

           

        // $(document).on('change','#kota_asalnya', function(){
        //     // $('input.autocomplete').autocomplete({
        //     // data: {
        //     //     "Apple": null,
        //     //     "Microsoft": null,
        //     //     "aaab": 'null',
        //     //     "Google": 'https://placehold.it/250x250'
        //     // },
        //     // });
                
        //     // function tampilkan_kotaasal(){
        //     console.log('cek');
        //     var idkey ='53341588ddd45a3a026d55d75738286b'
        //     // $.ajax({
        //     //     type: "GET",
        //     //     dataType: "html",
        //     //     crossDomain: true,
        //     //     url: "http://api.rajaongkir.com/starter/city",
        //     //     beforeSend: function(xhr) {
        //     //         xhr.setRequestHeader('key', idkey);
        //     //         console.log(xhr);
        //     //     },
        //     //     error: function(msg,data){
        //     //         console.log(data);
        //     //     },
        //     //     success: function (msg,data) {
        //     //         $("select#kota_asal").html(msg);
        //     //         console.log(msg,data);

        //     //     }
        //     // });   
        //     $.ajax({
        //     type: "GET",
        //     dataType: "html",
        //     url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
        //     error: function(msg,data){
        //         console.log(data);
        //     },
        //     success: function (hasil) {
        //         // var html = '';
        //         // var i;
        //         // for(i=0; i<data.length; i++)
        //         //     html += "<option value=" + $data['rajaongkir']['results'][$i]['city_id'] + ">" + $data['rajaongkir']['results'][$i]['city_name'] + "</option>";
        //         // // }
        //         // $("#kota_asalnya").html(html);
        //         $("#kota_asalnya").append(hasil);
        //         $('select').formSelect();

        //         // $('select#kota_asalnya').append(msg);
        //         // $('select#kota_asalnya').formSelect()
        //         // $("#kota_asalnya").append(msg);
        //         console.log(data);
        //     }
        //     }); 
        // // url:"<?php echo site_url('kota/get_kota/kotaasal'); ?>",
        // // method:"get",
        // // dataType:"html",
        // // success: function(data, msg){
        // //     var text = "";
        // //     // text+="<option value=’’> — Select a country — </option>”;
        // //     // $.each(data, function(key, val){
        // //     // text+=”<option values=”+val.alpha3Code+”>”+val.name+”</option>”;
        // //     // });
        // //     $("select#kota_asal").html(data);
        // //     console.log(data);
            
        // // },
        // // error: function(msg,data){
        // //     console.log(data);
        // // }
        // // })
        // }); //penutup
        // };
        function refreshPage(){
            window.location.reload();
        } 
</script>

<script type="text/javascript">
    function test(){
        // $(".loading").show();
        // $('#modal2').trigger('click');
        console.log("cek");

            var jne= $("#kurir").val(); 
            var getcity= $("#kota_asalnya").val(); 
            var berat= $("#tampil_total").val(); //bukan #total
            var beratnya = berat*1000; //kudu dibagi sewu
            var customer_name= $("#customer_ambilnama").val(); 
            var customer_address= $("#customer_ambiladdress").val(); 
            var ambilprovinsi= $("#id_ambilprovinsi").val(); 
            var customer_provinsi= $("#id_provinsi").val(); 
            var ambilkota= $("#id_ambilkota").val(); 
            var kota_tujuan= $("#kota_asalnya").val(); 
            var customer_desa= $("#customer_ambildesa").val(); 
            var customer_phone= $("#customer_ambilphone").val(); 
            $.ajax({
                //url: 'cek_ongkir.php',
                url: "<?php echo site_url('ongkir/cek_ongkir'); ?>",
                type: 'post',
                // data: $(this).serialize(),// ora isoh nganggo serialize API ne ra gelem moco, tapi datane liyo mlebu (19-03-2021)
                data: { 
                        ambilkotacity:getcity,
                        kurir:jne,
                        total:berat,
                        customer_name:customer_name,
                        customer_address:customer_address,
                        ambilprovinsi:ambilprovinsi,
                        customer_provinsi:customer_provinsi,
                        ambilkota:ambilkota,
                        kota_tujuan:kota_tujuan,
                        customer_desa:customer_desa,
                        customer_phone:customer_phone
                        },
                success: function (data) {
                    // console.log(data);
                    document.getElementById("response_ongkir").innerHTML = data;
                }
            });

    }

	function getBerat(){
        var items = new Array();
        var itemCount = document.getElementsByClassName("ambil");
        var total = 0;
        //  var id= "";
        for(var i = 0; i < itemCount.length; i++)
            {
                id = "berat"+(i+1);
                total = total +  parseFloat(document.getElementById(id).value);
            }
            if (!isNaN(total)) {	
                document.getElementById('tampil_total').value = total;
                // $("#totalx").val(total);
                // console.log( "s"+(document.getElementById(id).value),itemCount,$("#berat2").val());
                return total;
            }if (isNaN(total)) {
                document.getElementById('total').value = "";
                console.log(total);
            }
    }
    getBerat();

    function reply_click(clicked_id){
        // var nilai_form = document.getElementById('input_ongkir').value;
        // var data = preg_replace("/[^0-9]/", "", $nilai_form); //untuk PHP
        // var data = clicked_id.replace(/[^0-9]/gi, ''); //untuk g adalah global
        document.getElementById("hasil_ongkir2").value=clicked_id;
        // var format = number_format($clicked_id, 2, ',', '.');
        // var format = $(clicked_id).maskMoney();
        const numb = clicked_id;
        const format = clicked_id.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const rupiah = 'Rp. ' + convert.join(',').split('').reverse().join('') + '.00'

        // console.log(rupiah)
        document.getElementById("hasil_ongkirtext").innerHTML=rupiah;
        // console.log(clicked_id);

        function getTotalbiaya_plusongkir(){
            var items = new Array();
            var itemCount = document.getElementsByClassName("getambil_plusongkir");
            var total = 0;
            var id= "";
            // var txtFirstNumberValue= $("#hasil_biayabarang").val(); 
            // var txtSecondNumberValue= $("#hasil_ongkir").val(); 
            var txtFirstNumberValue = document.getElementById('hasil_ongkir1').value;
            var txtSecondNumberValue = document.getElementById('hasil_ongkir2').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            const format = result.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = 'Rp. ' + convert.join(',').split('').reverse().join('') + '.00'
            if (!isNaN(result)) {
                document.getElementById('hasil_totalbiayatext').innerHTML = rupiah;
                document.getElementById("grandtotal").value=result;
            }
        }
        getTotalbiaya_plusongkir();
    }

    // function getTarif(){
    //     // console.log("Cek1");
    //     var items = new Array();
    //     var itemCount = document.getElementsByClassName("ambil");
    //     var total = 0;
    //     //  var id= "";
    //     for(var i = 0; i < itemCount.length; i++)
    //         {
    //             id = "input_ongkir"+(i+1);
    //             // ambil = total +  parseFloat(document.getElementById(id).value);
    //             ambil = id;
    //         }
    //         if (!isNaN(ambil)) {	
    //             document.getElementById('hasil_ongkir').value = ambil;
    //             console.log( "s"+(document.getElementById(id).value),itemCount,$("#input_ongkir2").val());
    //             return ambil;
    //         }if (isNaN(ambil)) {
    //             // document.getElementById('hasil_ongkir').value = "0";
    //             console.log(ambil);
    //         }
    // }
    // getTarif();


</script>
<script type="text/javascript">
    $(document).ready(function () {
//         $('#kota_asal').select2({
//             placeholder: '--Pilih kota/kabupaten asal--',
//             language: "id"
//         });

//         $('#kota_tujuan').select2({
//             placeholder: '--Pilih kota/kabupaten tujuan--',
//             language: "id"
//         });

//         $.ajax({
//             type: "GET",
//             dataType: "html",
//             url: "<?php echo site_url('kota/get_kota/kotaasal'); ?>",
//             success: function (msg) {
//                 $("select#kota_asal").html(msg);
//             }
//         });    
//    
//         $.ajax({
//             type: "GET",
//             dataType: "html",
//             url: "<?php echo site_url('kota/get_kota/kotatujuan'); ?>",
//             success: function (msg) {
//                 $("select#kota_tujuan").html(msg);
//             }
//         });

        $("#ongkir").submit(function (e) {
            e.preventDefault();
            var jne= $("#kurir").val(); 
            var getcity= $("#kota_asalnya").val(); 
            var berat= $("#tampil_total").val(); //bukan #total
            var beratnya = berat*1000; //kudu dibagi sewu
            var customer_name= $("#customer_ambilnama").val(); 
            var customer_address= $("#customer_ambiladdress").val(); 
            var ambilprovinsi= $("#id_ambilprovinsi").val(); 
            var customer_provinsi= $("#id_provinsi").val(); 
            var ambilkota= $("#id_ambilkota").val(); 
            var kota_tujuan= $("#kota_asalnya").val(); 
            var customer_desa= $("#customer_ambildesa").val(); 
            var customer_phone= $("#customer_ambilphone").val(); 
            $.ajax({
                //url: 'cek_ongkir.php',
                url: "<?php echo site_url('ongkir/cek_ongkir'); ?>",
                type: 'post',
                // data: $(this).serialize(),// ora isoh nganggo serialize API ne ra gelem moco, tapi datane liyo mlebu (19-03-2021)
                data: { 
                        ambilkotacity:getcity,
                        kurir:jne,
                        total:berat,
                        customer_name:customer_name,
                        customer_address:customer_address,
                        ambilprovinsi:ambilprovinsi,
                        customer_provinsi:customer_provinsi,
                        ambilkota:ambilkota,
                        kota_tujuan:kota_tujuan,
                        customer_desa:customer_desa,
                        customer_phone:customer_phone
                        },
                success: function (data) {
                    // console.log(data);
                    document.getElementById("response_ongkir").innerHTML = data;
                }
            });
        });
        
        // document.getElementById("tombol_ambilongkir");
        // addEventListener("click", tampilkan_nilai_form);




        // function tampilkan_nilai_form(){
        //     var nilai_form = document.getElementById('input_ongkir').value;
        //     // var data = preg_replace("/[^0-9]/", "", $nilai_form); //untuk PHP
        //     var data = nilai_form.replace(/[^0-9]/gi, ''); //untuk g adalah global
        //     document.getElementById("hasil_ongkir").value=data;
        // }

        // function tampilkan_nilai_form(){
        //     var itemCount = document.getElementsByClassName("ambilongkir");
        //     var total = 0;
        //     //  var id= "";
        //     for(var i = 0; i < itemCount.length; i++)
        //         {
        //             id = "input_ongkir"+(i+1);
        //             nilai_form = parseInt(document.getElementById(id).value);
        //             // var data = nilai_form.replace(/[^0-9]/gi, ''); //untuk g adalah global
        //             // hasil = total +  data;
        //             // nilai_form = id;
        //         }

        //     // var nilai_form = document.getElementById('input_ongkir').value;
        //     // var data = preg_replace("/[^0-9]/", "", $nilai_form); //untuk PHP
        //     // var data = nilai_form.replace(/[^0-9]/gi, ''); //untuk g adalah global
        //     document.getElementById("hasil_ongkir").value=nilai_form;
        //     console.log(nilai_form);
        //     console.log(itemCount);
        //     console.log(id);
        //     console.log(parseInt(document.getElementById("input_ongkir1").value));
        //     console.log(parseInt(document.getElementById("tombol_ambilongkir")));
        // }


    });
</script>
</body>
</html>