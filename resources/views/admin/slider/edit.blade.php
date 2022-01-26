@extends('layouts.app')

@section('title', 'Slider Edit')

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Slider</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                  	@csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Feature Image</label>
                          <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection