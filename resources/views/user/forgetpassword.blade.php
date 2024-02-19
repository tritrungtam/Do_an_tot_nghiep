
<!DOCTYPE html>
<html lang="en">


@include('user.head')
<body>
@include('sweetalert::alert')

	
	<section id="form"><!--form-->
	
		<div class="container">
			<div class="row">
				@if (session('message'))
                    <span class ="aler alert-safe">
                    <strong> {{session('message')}}</strong>
                    </span>
                @endif
                @include('alert')
				
				
				
					<div class="signup-form"><!--sign up form-->
						<h2>Quên mật khẩu</h2>
						<form action="{{route('mail')}}" method="post" >
                        <input type="text" placeholder="Nhập email đăng ký tài khoản" name="email" >
						@csrf
							
						<button type="submit" class="btn btn-default">Gửi</button>
							
						</form>
					</div><!--/sign up form-->
				<style>
                    .signup-form{
                       width: 400px;
                       margin-left: 35%;
                    }
                </style>

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