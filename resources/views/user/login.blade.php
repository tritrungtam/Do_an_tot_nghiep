
<!DOCTYPE html>
<html lang="en">
@include('user.head')
<body>
@include('sweetalert::alert')
	<section id="form"><!--form-->	
		<div class="container">
			<div class="row">
				
                @include('alert')
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{route('xu_li_dang_nhap')}}" method="post">
						
							<input type="text" placeholder="Tài khoản" name="taikhoan">
							<input type="password" placeholder="Mật khẩu" name="matkhau">
							<span>
								<input type="checkbox" class="checkbox" name="remember_token">
								Keep me signed in
							</span>
							
							<span>
							<a href ="{{route('forgetpasspage')}}">| Quên mật khẩu</a>
								<span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
							@csrf
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký tài khoản mới!</h2>
						<form action="{{route('dangky')}}" method="post">
						@csrf
							
							<input type="text" placeholder="Tài khoản" name="taikhoan" autocomplete="off" >
							<input type="email" placeholder="Email Address" name="email" autocomplete="off">
							<input type="password" placeholder="Mật khẩu" name="matkhau" autocomplete="off">
							
							<button type="submit" class="btn btn-default">Đăng Ký</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@include('user.footer')
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>