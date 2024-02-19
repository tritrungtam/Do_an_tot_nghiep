{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
        
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head--> --}}
<!DOCTYPE html>
<html lang="en">
@include('user.head')
<body>
@include('sweetalert::alert')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('trangchu')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description">Tên Sản Phẩm</td>
							<td class="price">Giá </td>
							<td class="quantity">Số lượng</td>
							<td class="quantity">Giảm</td>
							<td class="total">Giá gốc: </td>
							<td class="total">Thành tiền: </td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
						$tong=0;
						$tongSauGiamGia =0;
						@endphp
						
						@foreach ($cart as $key => $tmp)
						
						<tr>
							<td class="cart_product">
								<a href=""><img id="anhbia" src="{{asset('images/404/'. $tmp['anhbia'])}}" alt=""></a>
							</td>
							<td class="">
								<h4><a >{{ $tmp['ten']}}</a></h4>
								<p>Màu: {{$tmp['mau']}}, Bộ nhớ: {{$tmp['bonhotrong']}} GB</p>
							</td>
							<td class="cart_price">
								
								<p>{{$tmp['gia']}}</p>
							</td>
							
							<td class="cart_price">
								<p style="color: rgb(0, 0, 0);">{{$tmp['soluong']}}</p>
							</td>
							<td class="cart_price">
								<p style="color: rgb(0, 0, 0);">10%</p>
							</td>	
							
							<td class="cart_total">
								<p class="cart_total_price"  style="font-size: 140%;" > {{$tmp['soluong'] * $tmp['gia']}}
									@php
									$tong = $tmp['soluong'] * $tmp['gia'];
									@endphp </p>
							</td>
							<td class="cart_total">
								@php
									 $tongSauGiamGia = $tong - ($tong * 10 / 100);
									 $tongall = 0;
									 $tongall += $tongSauGiamGia
								@endphp

								<p class="cart_total_price"  style="font-size: 140%;" > {{ $tongSauGiamGia }}</p>
								
							</td>

							<td class="cart_delete">
								<form  method="POST" action="{{ route('removeitem', ['id' => $key ]) }}">
									@csrf
							
								<button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
							</form>
							</td>
						</tr>
						
						@endforeach
				

						
						
                        <tr id="nds">
                                <td>
									
									<p style="color: rgb(255, 32, 54); font-size: 145%;">Tổng tiền: {{$tongall}}</p>
										{{-- <p style="color: rgb(0, 0, 0);"  style="font-size: 150%;">Khuyến mãi: % </p> --}}
										{{-- <p class="cart_total_price"  style="font-size: 150%;">Thành tiền:  </p> --}}
                                    <form action="{{route('thanhtoan')}}" method="post">
                                    <button class="btn btn-default update" id="hihi" style="border-radius: 10px;" type="submit" name="redirect">Thanh toán ngay</button>
								
                                    @csrf
                                    </form>
                                    
                                </td>
                        
                        	<style>
							#anhbia{
								width: 110px;
								height: 110px;
							}
                            #hihi{
                                border: none;
                                            color: rgb(0, 0, 0);
                                            padding: 15px 32px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 16px;
                                            margin-left: 400px;
                                            cursor: pointer;
                            }
                            </style>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>
		@include('user.footer')
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

	<script src="js/price-range.js"></script>
</body>
</html>