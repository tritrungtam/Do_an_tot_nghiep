
<!DOCTYPE html>
<html lang="en">
@include('user.head')

<body>
@include('sweetalert::alert')
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-12">
									<img src="images/hinh12.jpg" class=" img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-12">
									<img src="images/hinh10.jpg" class=" img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-12">
									<img src="images/hinh11.jpg" class=" img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('user.leftsidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm</h2>
						@foreach($listsanpham as $Sanpham)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('images/404/'. $Sanpham->anhbia)}}" alt="" />
											
											<p>{{$Sanpham->tensp}}</p>
											<a href="{{route('detailsp',['id'=> $Sanpham->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
										</div>
										
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						@endforeach
				
					
					
				</div>
			</div>
		</div>
	</section>
	
	@include('user.footer')
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	
</body>
</html>