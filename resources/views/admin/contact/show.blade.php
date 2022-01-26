@extends('layouts.app')

@section('title','Contact Details')

@push('css')

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">{{ $contact->subject }}</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>Name: {{ $contact->name }}</strong></p>
                      <p><strong>Email: {{ $contact->email }}</strong></p>
                      <p><strong>Message: {{ $contact->message }}</strong></p>
                    </div>
                  </div>
                  <a href="{{ route('contact.index') }}" class="btn btn-danger">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

     

@endsection



@push('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#searchTable').DataTable();
} );


</script>

@endpush



