@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Playlist Page</h3>
<div class="row mt">
  <div class="col-lg-12">
    <p>Place your content here.</p>
  </div>
</div>

<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">

    @include('partials.notif')

        @foreach ($data as $playlist)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Playlist</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/course/'.$playlist->course_id.'/playlist/update/'.$playlist->id) }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Playlist Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="playlists_name" value="{{$playlist->playlists_name}}">
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
                            </div>
                          </div>              
                      </form>
        @endforeach
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
      </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
      </div><!-- /row -->
      @endsection