@extends('layouts.app')

@section('title', 'Dashboard')
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{ $categoryCount }} /{{ $itemCount }} 
                    {{-- <small>GB</small> --}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Total Categories & Items</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                  <p class="card-category">Slider Count</p>
                  <h3 class="card-title">{{ $sliderCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservations</p>
                  <h3 class="card-title">{{ $reservations->count() }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Not Confirmed Reservation
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <p class="card-category">Followers</p>
                  <h3 class="card-title">{{ $contactCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Total Message
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              {{-- <a href="{{route('slider.create')}}" class="btn btn-info">Add New</a> --}}
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Reservations</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="searchTable" class="table table-striped table-bordered">
                      <thead class=" text-primary">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        
                        @foreach($reservations as $key=>$reservation)
                        <tr> 
                          <td>{{$key +1}}</td>
                          <td>{{$reservation->name}}</td>
                          <td>{{$reservation->phone}}</td>
                          <td>{{$reservation->email}}</td>
                          <td>
                            @if($reservation->status==1)
                           <span class="badge badge-success">Confirmed</span>
                           @endif  
                            @if($reservation->status==0)
                           <span class="badge badge-info">Waiting</span>
                         @endif  
                            
                          </td>

                          
                          <td>
                            

                            @if($reservation->status==0)
                            <form id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" method="POST" style="display:none;">
                          
                            @csrf
                          
                          </form>
                          <button type="button" class="btn btn-info" onclick="if(
                              confirm('Are you verify this request by phone?'))
                              {
                                event.preventDefault();
                                document.getElementById('status-form-{{$reservation->id}}').submit();

                               }else{
                                event.preventDefault();
                               }">
                             <i class="fas fa-check"></i>
                           </button>
                            @endif

                            <!-- reservation delete  method here-->

                            <form id="delete-form-{{$reservation->id}}" action="{{ route('reservation.destroy',$reservation->id) }}" method="POST">
                              @csrf
                              
                            </form>

                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure to delete the record?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{$reservation->id}}').submit();
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
