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
        
 

    });
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
        var qty = $(this).val();
        $.ajax({
            url  : "<?php echo base_url('web/update_cart')?>",
            // url : "<?php echo base_url();?>web/update_cart",
            dataType : "JSON",
            type : "POST",
            data : {id:id,qty:qty},
            beforeSend: function () {
        		$('.loading').show();
			},
			complete: function(){
				$(".loading").hide();
			},
			error: function (request, error) {
					console.log(query);
					//alert(" Can't do because: " + error + request);
				},
            success :function(result,html){
                window.location.href='';
                // $('.onload_cart').load('web/cart_autoqty');           

                // $('#onload_cart').html("<h2>Contact Form Submitted!</h2>");
                // $("#onload_cart").show();
                // $('#onload_cart').load("<?php echo base_url('web/cart_autoqty'); ?>");
                // console.log(ambil);
                // // console.log(data);
                console.log(result);
                // $('#total').val(result);
                
                // $('#card_load').load("<?php echo base_url();?>cart");
                // $('#subtotal').value(data);
                // $('#subtotal').html(data);
            }
        });
        // return false;
    });
    // });

</script>
</body>
</html>