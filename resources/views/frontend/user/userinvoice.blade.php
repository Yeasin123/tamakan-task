<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmarInfo</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
    display: flex;
    justify-content: end;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-151 {
    font-size: 100%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
/* .item_direction{
    display: flex;
    justify-content: space-between;
} */

</style>
</head>
<body>
    
    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <div class="page-tools">
                <div class="action-buttons">
                    <button class="btn bg-white btn-light mx-1px text-95 print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </button>
                    {{-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Export
                    </a> --}}
                </div>
            </div>
            
        </div>

    <div class="container px-0" id="printable">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <h1 class="page-title text-secondary-d1">Invoice</h1>
                            <small class="page-info">
                                <i class="fa fa-angle-double-right text-80"></i>
                                {{$order->order_invoice}}
                            </small>
                        </div>
                        <h1 class="page-title text-secondary-d1">
                            <small class="page-info">
                                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$order->user->name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Street:- {{$shipping->address}}
                            </div>
                            <div class="my-1">
                                City:- {{$shipping->city_name}}, Area:- {{$shipping->area}}
                            </div>
                            <div class="my-1">Phone:- <b class="text-600">{{$shipping->phone}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <span id="Todaydate"></span></div>
                            @if($order->payment_type == "cash")
                            {{-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> 
                                <span class="badge badge-warning badge-pill px-25">Unpaid</span>
                            </div> --}}
                            @else
                            @endif
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                
                    <div class="text-95 text-secondary-d3">
                        <table class="table table-bordered text-center table-striped">
                            <thead class="bg-info">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Single Price</th>
                                <th scope="col">Total Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                 @foreach ($orderDetails as $orderDetail) 
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><img src="{{asset('images/product/'.$orderDetail->product->thumbnail)}}" width="75" alt="productImage"></td>
                                    <td>{{$orderDetail->product_name}}</td>
                                    <td>{{$orderDetail->product_qty}}</td>
                                    <td>$ {{$orderDetail->single_price}} </td>
                                    <td>$ {{$orderDetail->totalprice}} </td>
                                  </tr>
                                @endforeach
                             
                            
                            </tbody>
                          </table>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-8 text-grey text-90 order-first order-sm-last ">
                        </div>
                        <div class="col-12 col-sm-4 text-grey text-90 order-first order-sm-last ">
                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151"> Delivery Charge </span>  
                                </div>
                                <div class="col-5">
                                    <span class="text-151">{{$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>

                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151">Paying Amount</span>   
                                </div>
                                <div class="col-5">
                                    <span class="text-151 ">{{$order->paying_amout+$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>

                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151">Total Price</span>
                                </div>
                                <div class="col-5">
                                    <span class="text-151 ">{{$order->paying_amout+$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function($){
	'use strict'

	$.fn.printElement = function(options){
		let settings = $.extend({
			title	: jQuery('title').text(),
			css		: 'extend',
			ecss	: null,
			lcss	: [],
			keepHide: [],
			wrapper : {
						wrapper: null,
						selector: null,
					}
		}, options);

		const element = $(this).clone();
		let html = document.createElement('html');

		let head = document.createElement('head');
		if(settings.title != null && settings.title != ''){
			head = $(head).append($(document.createElement('title')).text(settings.title));
		}
		else{
			head = $(head);
		}

		if(settings.css == 'extend' || settings.css == 'link'){
			$('link[rel=stylesheet]').each(function(index, linkcss){
				head = head.append($(document.createElement('link')).attr('href', $(linkcss).attr('href')).attr('rel', 'stylesheet').attr('media', 'print'));
			})
		}

		for(var i = 0; i < settings.lcss.length; i++){
			head = head.append($(document.createElement('link')).attr('href', settings.lcss[i]).attr('rel', 'stylesheet').attr('media', 'print'));
		}

		if(settings.css == 'extend' || settings.css == 'style'){
			head.append($(document.createElement('style')).append($('style').clone().html()));
		}

		if(settings.ecss != null){
			head.append($(document.createElement('style')).html(settings.ecss));
		}

		if (settings.wrapper.wrapper === null){
			var body = document.createElement('body');
			body = $(body).append(element);
		}
		else{
			var body = $(settings.wrapper.wrapper).clone();
			body.find(settings.wrapper.selector).append(element);
		}

		for(let i = 0; i < settings.keepHide.length; i++){
			$(body).find(settings.keepHide[i]).each(function(index, data){
				$(this).css('display', 'none');
			})
		}

		html = $(html).append(head).append(body);

		const fn_window = document.open('', settings.title, 'width='+$(document).width()+',height=' + $(document).width() + '');
		fn_window.document.write(html.clone().html());
		setTimeout(function(){fn_window.print();fn_window.close()}, 250);

		return $(this);
	}
}(jQuery));

</script>
<script>
    $('.print').click(function(){
      $('#printable').printElement({
      });
    })
  </script>
  <script type="text/javascript">
  
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);
  
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  
    const days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        const d = new Date();
        let day = days[d.getDay()];
        document.getElementById("Todaydate").innerHTML = day;
  </script>

</body>
</html>
