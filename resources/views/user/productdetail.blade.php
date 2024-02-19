
<!DOCTYPE html>
<html lang="en">
@include('user.head')
<body>
	@include('sweetalert::alert')	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('user.leftsidebar')
				</div>
							@php
							$image=explode('|',$lay1sp->anhsanpham);
							$length = count($image);
							$countst=0;
							@endphp
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product" >
							<div class="slideshow">
								
								@foreach($image as $item)
								@php
								$countst ++;
								@endphp
							<img src="{{asset('images/upload/'. $item)}}" alt="Slide {{$countst}}">
							@endforeach
							</div>							
							</div>																					
							<div style="text-align:center">							
							</div>
							
							<script>
								// Khởi tạo biến cho slide hiện tại và số lượng slide
								var currentSlide = 0;
								var numSlides = document.querySelectorAll(".slideshow img").length;

								// Hàm để thay đổi slide khi người dùng nhấp vào nút chuyển ảnh
								function changeSlide(n) {
									showSlide(currentSlide += n);
								}

								// Hàm để hiển thị slide hiện tại và ẩn slide khác
								function showSlide(n) {
									// Kiểm tra nếu mảng slide đã lặp lại, reset về slide đầu tiên
									if (n >= numSlides) {
										currentSlide = 0;
									} else if (n < 0) {
										currentSlide = numSlides - 1;
									} else {
										currentSlide = n;
									}
									// Ẩn tất cả ảnh ngoại trừ slide hiện tại
									document.querySelectorAll(".slideshow img").forEach(function(img) {
										img.style.opacity = 0;
									});
									// Hiển thị ảnh của slide hiện tại
									document.querySelectorAll(".slideshow img")[currentSlide].style.opacity = 1;
									// Hiển thị trạng thái hoạt động của nút chuyển ảnh
									document.querySelectorAll(".button").forEach(function(button) {
										button.classList.remove("active");
									});
									document.querySelectorAll(".button")[currentSlide].classList.add("active");
								}

								// Hiển thị slide đầu tiên khi trang được tải
								showSlide(currentSlide);
							</script>
							<style>
								/* Thiết lập kiểu cho khung slide show */
								.slideshow {
									position: relative;
									height: 320px;
									overflow: hidden;
									
								}

								/* Thiết lập kiểu cho ảnh trong slide show */
								.slideshow img {
									position: absolute;
									left: 0;
									top: 0;
									z-index: -1;
									border-bottom: 100px;
									margin-bottom: 10px;
									height: 100%;
									object-fit: cover;
									opacity: 0;
									transition: opacity 1s ease-in-out;
								}

								/* Hiển thị ảnh đầu tiên trong slide show */
								.slideshow img:first-child {
									z-index: 1;
									opacity: 1;
								}

								/* Thiết lập kiểu cho nút chuyển ảnh */
								.button {
									position: absolute;
									top: 50%;
									transform: translate(0, -50%);
									cursor: pointer;
									background-color: #fff;
									padding: 10px;
									border-radius: 50%;
									opacity: 0.6;
								}

								/* Hiển thị nút chuyển ảnh tại vị trí bên phải */
								.button.right {
									right: 10px;
								}

								/* Hiển thị nút chuyển ảnh tại vị trí bên trái */
								.button.left {
									left: 10px;
								}

								/* Hiển thị trạng thái hoạt động của nút chuyển ảnh */
								.button.active {
									opacity: 1;
								}
							</style>
												
							<style>
								.dot {
									cursor: pointer;
									height: 15px;
									width: 15px;
									margin: 0 2px;
									background-color: #bbb;
									border-radius: 50%;
									display: inline-block;
									transition: background-color 0.6s ease;
								}
								.fullsize{
									border:11px solid white;
									z-index: 999;
									cursor: zoom-out;
								
									width: 1000px;
									max-width: 1000px;
									height: 1000px;
									max-height: 1000px;
									position: fixed;
									left: 800px;
									top: 300px;
								}
								.item-control i{
									margin-top: 230px;
								}
								.product-information{
									min-height: 400px;
									margin-top: -40px;
								}
								table {
                                                font-family: arial, sans-serif;
                                                border-collapse: collapse;
                                                width: 100%;
                                              }
                                              
                                              td, th {
                                                border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;
                                              }
                                              
                                              tr:nth-child(even) {
                                                background-color: #dddddd;
                                              }
							</style>
							<div id="chuyenhinh">
							<a class="left item-control" href="#" data-slide="prev" >
									<i class="fa fa-angle-left" onclick="changeSlide(1)"></i>
								  </a>
								  <a class="right item-control" href="#" data-slide="next">
									<i class="fa fa-angle-right" onclick="changeSlide(-1)"></i>
								  </a>
							</div>
							</div>
							
							<div id="similar-product" class="carousel slide" data-ride="carousel">
							
						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<form method="POST" action="{{route('addcart')}}">
									@csrf 
									<input type="hidden" name="masp"value="{{$lay1sp->id}}">
								
								<h2>{{$lay1sp->tensp}}</h2>
								<h4>Giảm: </h4>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									
									<label>Số lượng:</label>
									<input type="text" name="soluong"value="1" />
								</span>
								
								{{-- <div class="product-options">
									@foreach($lay1spr as $chitietsprieng)
									@if($chitietsprieng->soluong ==0)
									<label class="product-option1">
										
										<span>
											{{$chitietsprieng->bonhotrong}} GB 
											{{$chitietsprieng->ram}} GB 
											{{$chitietsprieng->mau}} 
										 {{$chitietsprieng->gia}} VNĐ
										</span>
									</label>
									@else
									<label class="product-option">
										<input type="radio" id="chitiet-{{$chitietsprieng->id}}" name="machitietsp" value="{{$chitietsprieng->id}}">
										<span>
											{{$chitietsprieng->bonhotrong}} GB|
											{{$chitietsprieng->ram}} GB 
											{{$chitietsprieng->mau}} <br>
											Giá gốc: {{$chitietsprieng->gia}} VNĐ
										</span>
									</label>
									@endif
									@endforeach
								</div> --}}
								<div class="product-options">
									@foreach($lay1spr as $chitietsprieng)
										@if($chitietsprieng->soluong == 0)
											<label class="product-option1">
												<span>
													{{$chitietsprieng->bonhotrong}} GB 
													{{$chitietsprieng->ram}} GB 
													{{$chitietsprieng->mau}} 
													{{$chitietsprieng->gia}} VNĐ
												</span>
											</label>
										@else
											<label class="product-option">
												<input type="radio" id="chitiet-{{$chitietsprieng->id}}" name="machitietsp" value="{{$chitietsprieng->id}}">
												<span>
													{{$chitietsprieng->bonhotrong}} GB|
													{{$chitietsprieng->ram}} GB 
													{{$chitietsprieng->mau}} <br>
													Giá gốc: {{$chitietsprieng->gia}} VNĐ
												</span>
											</label>
										@endif
									@endforeach
								</div>
								
								
								
								

								<br><br>

									<button type="submit" class="btn btn-fefault cart" id="btnAddToCart" style="display:none" href="{{route('mail')}}">
										<i class="fa fa-shopping-cart"></i>    
										Thêm vào giỏ hàng
									</button>
									
									
									
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</form>
							</div><!--/product-information-->
						
						</div>

					</div><!--/product-details-->
						<!--Thông số kỷ thuật-->	
					<div class="product-information shop-details-tab"><!--category-tab-->
				
						<table>
							<tr>
								<th colspan="2">Thông số kỹ thuật</th>
							</tr>
							<tr>
								<td>Thương hiệu</td>
								<td>{{$lay1sp->thuonghieu}}</td>
							</tr>
							<tr>
								<td>Hệ điều hành</td>
								<td>{{$lay1spc->hedieuhanh}}</td>
							</tr>
							<tr>
								<td>Kích thước màn hình</td>
								<td>{{$lay1spc->ktmanhinh}}</td>
							</tr>
							<tr>
								<td>Công nghệ màn hình</td>
								<td>{{$lay1spc->cnmanhinh}}</td>
							</tr>
							<tr>
								<td>Tính năng màn hình</td>
								<td>{{$lay1spc->tinhnangmanhinh}}</td>
							</tr>
							<tr>
								<td>Độ phân giải</td>
								<td>{{$lay1spc->dophangiai}}</td>
							</tr>
							<tr>
							  <td>Tần số quét</td>
							  <td>{{$lay1spc->tansoquet}}</td>
						  </tr>
						  <tr>
							  <td>Camera sau</td>
							  <td>{{$lay1spc->camerasau}}</td>
						  </tr>
						  <tr>
							  <td>Quay video</td>
							  <td>{{$lay1spc->quayvideo}}</td>
						  </tr>
						  <tr>
							  <td>Camera trước</td>
							  <td>{{$lay1spc->cameratruoc}}</td>
						  </tr>
						  <tr>
							  <td>Quay video trước</td>
							  <td>{{$lay1spc->quayvideotruoc}}</td>
						  </tr>
						  <tr>
							  <td>Thẻ SIM</td>
							  <td>{{$lay1spc->thesim}}</td>
						  </tr>
						  <tr>
							  <td>Hỗ trợ mạng</td>
							  <td>{{$lay1spc->hotromang}}</td>
						  </tr>
						  <tr>
							  <td>Wifi</td>
							  <td>{{$lay1spc->wifi}}</td>
						  </tr>
						  <tr>
							  <td>GPS</td>
							  <td>{{$lay1spc->gps}}</td>
						  </tr>
						  <tr>
							  <td>Kích thước</td>
							  <td>{{$lay1spc->kichthuoc}}</td>
						  </tr>
						  <tr>
							  <td>Trọng lượng</td>
							  <td>{{$lay1spc->trongluong}}</td>
						  </tr>
						  <tr>
							  <td>Cổng sạc</td>
							  <td>{{$lay1spc->congsac}}</td>
						  </tr>
						  <tr>
							  <td>Pin</td>
							  <td>{{$lay1spc->pin}}</td>
						  </tr>
						  <tr>
							  <td>Thời điểm ra mắt</td>
							  <td>{{$lay1spc->thoidiemramat}}</td>
						  </tr>
						</table>
					</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									
									<p><b>Viết đánh giá của bạn tại đây: </b></p>
									
									<form action="{{route('them-moi-danh-gia',$lay1sp->id )}}" method="POST">
										@csrf
										<textarea name="noidung" placeholder="Viết đánh giá..."></textarea>
										
										<button type="submit" class="btn btn-default pull-right">
											Hoàn thành
										</button>
									</form>
								</div>
							</div>
							<div class="response-area">
								<ul class="media-list">
									
									<li class="media second-media">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{asset('images/cart/one.png')}}" alt="">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>Janis Gallagher</li>
												<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
												<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										
										</div>
									</li>
									
								</ul>					
							</div><!--/Response-area-->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var radioButtons = document.querySelectorAll('.product-options input[type="radio"]');
			var btnAddToCart = document.getElementById('btnAddToCart');
			var loaitk = {{$taiKhoan->loaitk ?? 0}};
	
			// Bắt sự kiện khi radio button thay đổi
			radioButtons.forEach(function (radio) {
				radio.addEventListener('change', function () {
					// Nếu có một radio button được chọn, hiển thị nút "Thêm vào giỏ hàng"; nếu không, ẩn nút
					btnAddToCart.style.display = document.querySelector('.product-options input[type="radio"]:checked') ? 'block' : 'none';
				});
			});
		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var btnAddToCart = document.getElementById('btnAddToCart');
			var loaitk = {{$taiKhoan->loaitk ?? 0}}; // Giá trị mặc định là 0 nếu loaitk không tồn tại
		
			// Kiểm tra điều kiện: nếu loaitk là 2, hiển thị nút "Thêm vào giỏ hàng"; ngược lại, ẩn nút
			btnAddToCart.style.display = (loaitk === 2) ? 'block' : 'none';
		});
		</script>
		{{-- <script>
			document.addEventListener('DOMContentLoaded', function () {
				var radioButtons = document.querySelectorAll('.product-options input[type="radio"]');
				var btnAddToCart = document.getElementById('btnAddToCart');

				var loaitk = {{$laytk->loaitk ?? 0}};
       			 console.log(loaitk);
        }
					
				// Bắt sự kiện khi radio button thay đổi
				radioButtons.forEach(function (radio) { 
					radio.addEventListener('change', function () {
						// Kiểm tra xem có radio button nào được chọn hay không
						var selectedOption = document.querySelector('.product-options input[type="radio"]:checked');
			
						// Kiểm tra cả hai điều kiện: radio button được chọn và loaitk là 2
						btnAddToCart.style.display = (selectedOption && loaitk === 2) ? 'block' : 'none';
					});
				});
				// Kiểm tra điều kiện ban đầu
				var selectedOption = document.querySelector('.product-options input[type="radio"]:checked');
				btnAddToCart.style.display = (selectedOption && loaitk === 2) ? 'block' : 'none';
			});
			</script> --}}
			
		
	
<style>
	#label1{
		
		border: 1px solid #F7F7F0;
		border-radius: 15px;
	}
</style>
	<style>
	 /* .product-options {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
	}

	.product-option {
		flex: 1; 
		border: 1px solid #ccc;
		padding: 2px;
		text-align: center;
		border-radius: 10px; 
	}

	.product-option input[type="radio"] {
		display: none; /* Ẩn radio button mặc định */
	}

	.product-option label {
		cursor: pointer;
		display: block;
		padding: 5px;
		border: 1px solid #ccc;
	}

	.product-option:hover {
		background-color: #f5f5f5;
	}

	/* Tùy chỉnh kiểu radio button tùy theo ý muốn */
	.product-option input[type="radio"] + span:before {
		content: "\f10c"; /* Sử dụng icon hoặc ký tự Unicode cho radio button đã chọn */
		font-family: FontAwesome; /* Đổi font-family tùy theo icon bạn sử dụng */
		font-size: 16px;
		color: #000000; /* Màu sắc của radio button đã chọn */
	}

	.product-option input[type="radio"]:checked + span:before {
		content: "\f111"; /* Đổi icon cho radio button đã chọn */
		color: #ff0000; /* Màu sắc của radio button đã chọn */
	} */
	.product-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.product-option {
    flex-basis: calc(50% - 10px); /* Chiều ngang chỉ chiếm 50%, trừ đi khoảng cách */
    border: 1px solid #ccc;
    padding: 2px;
    text-align: center;
    border-radius: 10px;
    box-sizing: border-box; /* Bảo đảm rằng padding và border không làm tăng kích thước thực tế */
}

.product-option input[type="radio"] {
    display: none;
}

.product-option label {
    cursor: pointer;
    display: block;
    padding: 5px;
    border: 1px solid #ccc;
}

.product-option:hover {
    background-color: #f5f5f5;
}

.product-option input[type="radio"] + span:before {
    content: "\f10c";
    font-family: FontAwesome;
    font-size: 16px;
    color: #000000;
}

.product-option input[type="radio"]:checked + span:before {
    content: "\f111";
    color: #ff0000;
}

	</style>	
	<style>
		.product-options {
		   display: flex;
		   flex-wrap: wrap;
		   gap: 10px; /* Khoảng cách giữa các phần tử */
	   }
   
	   .product-option1 {
		   flex: 1; /* Phần tử sẽ mở rộng để điền vào không gian trống */
		   border: 1px solid #ccc;
		   padding: 2px;
		   text-align: center;
		   border-radius: 10px; 
		   opacity: 0.5;
	   }
   
	   .product-option input[type="radio"] {
		   display: none; /* Ẩn radio button mặc định */
	   }
   
	   .product-option label {
		   cursor: pointer;
		   display: block;
		   padding: 5px;
		   border: 1px solid #ccc;
	   }
   
	   .product-option:hover {
		   background-color: #f5f5f5;
	   }
   
	   /* Tùy chỉnh kiểu radio button tùy theo ý muốn */
	   .product-option input[type="radio"] + span:before {
		   content: "\f10c"; /* Sử dụng icon hoặc ký tự Unicode cho radio button đã chọn */
		   font-family: FontAwesome; /* Đổi font-family tùy theo icon bạn sử dụng */
		   font-size: 16px;
		   color: #000000; /* Màu sắc của radio button đã chọn */
	   }
   
	   .product-option input[type="radio"]:checked + span:before {
		   content: "\f111"; /* Đổi icon cho radio button đã chọn */
		   color: #ff0000; /* Màu sắc của radio button đã chọn */
	   }
   
	   </style>	
@include('user.footer')
	<script src="/vendor/jquery/jquery-3.7.0.min.js"></script>
    {{-- <script src="/js/jquery.js"></script> --}}
	<script src="/js/price-range.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>