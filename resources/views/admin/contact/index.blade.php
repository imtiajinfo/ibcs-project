@extends('layouts.app')

@section('title','Contact')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact Message</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="searchTable" class="table table-striped table-bordered">
                      <thead class=" text-primary">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Sent At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        
                        @foreach($contacts as $key=>$contact)
                        <tr> 
                          <td>{{$key +1}}</td>
                          <td>{{$contact->name}}</td>
                          <td>{{$contact->subject}}</td>
                          <td>{{$contact->email}}</td>
                          <td>{{$contact->created_at}}</td>
                          <td>
                            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-info"><i class="material-icons">details</i></a>

                            <!-- reservation delete  method here-->

                            <form id="delete-form-{{$contact->id}}" action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                            </form>

                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure to delete the record?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{$contact->id}}').submit();
                            }else{
                              event.preventDefault();
                            }
                            ">
                           <i class="fas fa-trash"></i>
                          </button>
                          </td>
                        </tr>

                        @endforeach

                      </tbody>
                    </table>
             
                  </div>
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



