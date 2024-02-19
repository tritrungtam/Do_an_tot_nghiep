
<!DOCTYPE html>
<html lang="en">
@include('user.head')
<body>
	@include('sweetalert::alert')
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product" >
							<div class="slideshow">
							<img src="{{asset('/images/home/'. Auth::user()->avatar)}}" alt="Slide ">
							</div>
							</div>
                            			
							</div>
							
							<div id="similar-product" class="carousel slide" data-ride="carousel">
							
						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								{{-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> --}}
								<label>Họ tên: {{Auth::user()->hoten}}</label>
								<br>
			
									<p>Số điện thoại: {{Auth::user()->sdt}}</p>
									<p>Email: {{Auth::user()->email}}</p>
									<p>Địa chỉ: {{Auth::user()->diachi}}</p>
								
								
								<br>
									<a class="btn btn-fefault cart" href ="{{route('editaccount',['id' => Auth::user()->id])}}">
											Chỉnh sửa thông tin 
									</a>
								<style>
									#label1{
										
										border: 1px solid #F7F7F0;
										border-radius: 15px;
									}
								</style>
								<style>
									.slideshow {
   									 width: 150px; /* Đặt kích thước bao bọc của hình ảnh */
   									 height: 200px;
   									 overflow: hidden; /* Ẩn các phần bị vượt ra ngoài kích thước của bao bọc */
}
								
									.slideshow img {
   									 width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ không gian của bao bọc */
   									 height: 100%;
    								 object-fit: cover; /* Đảm bảo hình ảnh không bị bóp méo khi tỷ lệ khung hình thay đổi */
}
								</style>
							
							</div><!--/product-information-->
						
						</div>
						
					</div><!--/product-details-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
@include('user.footer')
	
	<script src="/vendor/jquery/jquery-3.7.0.min.js"></script>
  
    {{-- <script src="js/jquery.js"></script> --}}
	<script src="/js/price-range.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>

	
</body>
</html>