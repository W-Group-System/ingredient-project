@extends('./layouts.header')
@section('content')
<div class="content-wrapper">
   
      <div class="row">
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">New Order</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="{{ url('/new_orders') }}" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Book Order</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">New Stock</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection