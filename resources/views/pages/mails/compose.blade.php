@extends('partials.master')


@section('content')

<div class="col-lg-9">
			
				<div class="mail-box">
					<div class="mail-box-header clearfix">
						<h3 class="mail-title">Compose mail</h3>
						<div class="pull-right tooltip-demo">
							<a title="Move to Draft" data-placement="top" data-toggle="tooltip" class="btn btn-theme btn-sm" href="#/"><i class="fa fa-pencil"></i> Draft</a>
							<a title="Discard email" data-placement="top" data-toggle="tooltip" class="btn btn-theme02 btn-sm" href="#/"><i class="fa fa-times"></i> Discard</a>						</div>
					</div>
					<div class="mail-body">
						 <form>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="To">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<input type="email" class="form-control" placeholder="Cc">
									</div>
									<div class="col-md-6">
										<input type="email" class="form-control" placeholder="Bcc">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<textarea class="wysihtml5 form-control" placeholder="Message body" style="height: 200px"></textarea>
							</div>
							<hr>
							<div class="form-group text-right">
								<a title="Send" data-placement="top" data-toggle="tooltip" class="btn btn-primary btn-sm" href="#/"><i class="fa fa-reply"></i> Send</a>
								<a title="Discard Email" data-placement="top" data-toggle="tooltip" class="btn btn-white btn-sm" href="#/"><i class="fa fa-times"></i> Discard</a>
								<a title="Move to Draft" data-placement="top" data-toggle="tooltip" class="btn btn-white btn-sm" href="#/"><i class="fa fa-pencil"></i> Draft</a>							</div>
						</form>
					</div>
               </div>
			</div>
@endsection