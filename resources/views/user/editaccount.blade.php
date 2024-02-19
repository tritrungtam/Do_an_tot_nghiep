
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
					
					
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<div class="signup-form"><!--sign up form-->
									<h2>Nhập thông tin</h2>
									<form action="{{route('updateaccount',['id' => Auth::user()->id] )}}" method="post" enctype="multipart/form-data" >
										@csrf
										@method('PUT')
										<div>
											<label for="example-tel-input" class="col-form-label">Avatar</label>
											<label class="picture" for="picture__input" tabIndex="0">
											<span class="picture__image"></span>
											</label>
											<input type="file" name="picture__input" id="picture__input">
											</div>	<br>
										
											<input type="text" values="{{$user->hoten}}" placeholder="Họ tên" name="hoten" autocomplete="on" >
											<input type="text" values="{{$user->sdt}}" placeholder="Số điện thoại" name="sdt" autocomplete="on" >
											<input type="text" values="{{$user->email}}" placeholder="Email" name="email" autocomplete="on" >
											<input type="text" values="{{$user->diachi}}" placeholder="Địa chỉ" name="diachi" autocomplete="on" > 
									
											<br>
										<div>
										<button class="btn btn-fefault cart" type="submit">Hoàn thành</button>
									</form>
								</div><!--/sign up form-->
								
								
							</div><!--/product-information-->
						
						</div>
					</div><!--/product-details-->
					
					
					
					</div>
				</form>
			</div>
		</div>
	</section>
	<style>
		#label1{
			
			border: 1px solid #F7F7F0;
			border-radius: 15px;
		}
	</style>
	   <style>
		#picture__input {
		display: none;
		}

		.picture {
		width: 200px;
		height: 250px;
		aspect-ratio: 16/9;
		background: #ddd;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #aaa;
		border: 2px dashed currentcolor;
		cursor: pointer;
		font-family: sans-serif;
		transition: color 300ms ease-in-out, background 300ms ease-in-out;
		outline: none;
		overflow: hidden;
		}

		.picture:hover {
		color: #777;
		background: #ccc;
		}

		.picture:active {
		border-color: turquoise;
		color: turquoise;
		background: #eee;
		}

		.picture:focus {
		color: #777;
		background: #ccc;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}

		.picture__img {
		max-width: 100%;
		}

	</style>
	 <script>
		const inputFile = document.querySelector("#picture__input");
		 const pictureImage = document.querySelector(".picture__image");
		 const pictureImageTxt = "Chọn ảnh";
		 pictureImage.innerHTML = pictureImageTxt;

		 inputFile.addEventListener("change", function (e) {
		 const inputTarget = e.target;
		 const file = inputTarget.files[0];

		 if (file) {
			 const reader = new FileReader();

			 reader.addEventListener("load", function (e) {
			 const readerTarget = e.target;

			 const img = document.createElement("img");
			 img.src = readerTarget.result;
			 img.classList.add("picture__img");

			 pictureImage.innerHTML = "";
			 pictureImage.appendChild(img);
			 });

			 reader.readAsDataURL(file);
		 } else {
			 pictureImage.innerHTML = pictureImageTxt;
		 }
		 });
	 </script>
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