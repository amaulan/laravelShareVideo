@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Category Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">

	@for($i = 1; $i <= 19; $i++)
	<div class="col-lg-4 col-md-4 col-sm-4 mb">
		<a href="">
		<div class="content-panel pn">
			<div id="blog-bg">
				<div class="badge badge-popular">PEMULA</div>
				<div class="blog-title">OOP PADA PHP</div>
			</div>
			<div class="blog-text">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
				<div class="row">
					<div class="col-md-4">
						<span class="label label-success">PHP</span>
						<span class="label label-danger">HTML</span>
					</div>
					<div class="col-md-4">
						<span class="label label-warning">18 VIDEO</span>
					</div>
					<div class="col-md-4">
						<span class="label label-info">On Progressed</span>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>

	@endfor


</div>
@endsection