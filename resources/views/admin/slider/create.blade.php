@extends('layouts.app')

@section('title', 'Slider Create')

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New</h4>
                </div>
                <div class="card-body">
                  @include('layouts.partial.msg')
                  <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                  	@csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text" name="sub_title" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Feature Image</label>
                          <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection