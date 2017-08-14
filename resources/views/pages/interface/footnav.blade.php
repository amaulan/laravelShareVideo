<div class="col-md-12 footer">
	<div class="col-md-12">
		<form action="{{url('subscribestore')}}" method="post" class="col-md-4 col-md-offset-4" style="padding:10px;">
			{{ csrf_field() }}
			{{-- <div class="col-md-12"> --}}
			@if(Session::has('sc_subs'))
				<div class="alert alert-success">
					<span>{{ Session::get('sc_subs') }}</span>
				</div>
			@endif


			@if(Session::has('err_subs'))
				<div class="alert alert-danger">
					@if(is_array(Session::get('err_subs')))
						<ul>
							@foreach(Session::get('err_subs') as $err)
								<li>{{ $err }}</li>
							@endforeach
						</ul>
					@else
						<span>{{ Session::get('err_subs') }}</span>
					@endif
				</div>
			@endif
			{{-- </div> --}}
			<div class="col-md-9" style="padding:3px;">
				<input type="email" name="email" class="form-control" placeholder="You'r email">
			</div>
			<div class="col-md-3" style="padding:3px;">
				<input type="submit" name="send" value="SUBSCRIBE" class="btn btn-danger">
			</div>
		</form>
	</div>
	<div class="col-md-12" style="padding:0px;margin-bottom:0px;">
		<div class="col-md-6 footer-content" align="center">
			<!-- <blockquote> -->
			<h3>About</h3>
			  <p>
			  	SobatDev adalah tempat belajar bahasa untuk pemrograman website dengan sistem menggunakan tutorial dari video
			  </p>
			<!-- </blockquote> -->
		</div>
		<div class="col-md-6 footer-content" align="center">
			<!-- <blockquote> -->
			<h3>Mission</h3>
			  <p>
			  	Tujuan kami adalah mempermudah para pengguna framework laravel terutama bagi pemula untuk mempelajari framework laravel
			  </p>
			<!-- </blockquote> -->
		</div>
	</div>
	<div class="col-md-4 col-md-offset-4" style="padding:10px;text-align:center;border-top:1px solid #3C4A59;margin-top:20px;">
		  &copy 2017 R Indosystem Internship
	</div>
</div>