@extends('partials.master')

@section('content')
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_heart"></span>
					  			<h3>{{$data['total_subscribe']->count()}}</h3>
                  			</div>
					  			<p>{{$data['total_subscribe']->count()}} 
					  			people subscribe us. hoooraayyyy!</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_study"></span>
					  			<h3>{{$data['total_course']->count()}}</h3>
                  			</div>
					  			<p>We have {{$data['total_course']->count()}} courses at this time.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_video"></span>
					  			<h3>{{$data['total_playlist']->count()}}</h3>
                  			</div>
					  			<p>We have {{$data['total_playlist']->count()}} playlists at this time.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_mail"></span>
					  			<h3>{{$data['total_feedback']->count()}}</h3>
                  			</div>
					  			<p>We have {{$data['total_feedback']->count()}} feedbacks at this time.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
					  			<h3>{{$data['total_user']->count()}}</h3>
                  			</div>
					  			<p>We have {{$data['total_user']->count()}} users at this time.</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                  
                      
                      <div class="row mt">
                      	@foreach($data['top_playlist'] as $index => $top)
						<div class="col-md-4 col-md-offset-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TOP PLAYLIST</h5>
								</div>
								<p><img src="{{url('assets/img/top.png')}}" class="img-circle" width="80"></p>
								<p><b>{{$top->playlist_name}}</b></p>
								<div class="row">
									<div class="col-md-12">
										<p class="small mt">TOTAL WATCH</p>
										<p>{{$top->total}}</p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->
                      	@endforeach
                    </div><!-- /row -->
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds" style="padding-bottom: 15px;">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Latest Comments</h3>
					@if($data['new_comments']->count() == 0)
						<div style="padding: 5px 10px;text-align: center;">
							We don't have new comment
						</div>
					@else

					@foreach($data['new_comments'] as $index => $comment)
						

						<!-- list Action -->
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                      		<p><muted>{{$comment->created_at}}</muted><br/>
                      		   <a href="#">{{$comment->users()->first()->username}}</a><br/>
                      		   Comment on Playlist
                      		   <a href="{{url('watch/'.$comment->playlist_id)}}?course_id={{$comment->playlists()->first()->course_id}}&playlist_name={{$comment->playlists()->first()->playlists_name}}">{{ $comment->playlists()->first()->playlists_name }}</a>
                      		</p>
                      	</div>

                      </div>
						

					@endforeach

					@endif

						<a href="{{ url('admin/manage/comment') }}"  style="text-align: center;border-top:1px solid #000;">
							<h4>See All Comments</h4>
						</a>
					</div>

      <!--main content end-->


@endsection