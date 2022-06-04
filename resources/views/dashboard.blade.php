@include('headers.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .card {
    border-radius: 10px;
}
.card-body {
       padding: 0.50rem !important;
}
.card-set {
    width: 240px;
    height: 110px;
    background: white;
    padding:0.50rem;
}
.mbl_card {
    margin-left:10px;
}

</style>
      <div class="main-panel">
        <div class="content-wrapper p-4">
          <div class="row">
            <div class="col-md-12 ">
               
            </div>
          </div>
           

              <div class="row d-flex align-items-center">

                  @foreach($allProjects as $key=>$val)
                 
                    <div class="mb-2  mbl_card">
                        <a href="{{ $val->external_project_url }}?q={{ Session::get('user_id') }}" target="_blank">
                    @if($val->is_external_dashboard )
                    @else
                      <a href="{{ url('project-dashboard') }}/{{ $val->id }}">   
                    @endif
                      <div class="card">
                        <div class="card-set d-flex  align-items-center justify-center text-center">
                            <div>
                            <img src="{{ $val->project_icon }}">
                          <p class="mb-4 mt-2">{{ $val->project_name }}</p>
                          <p class="fs-30 mb-2"></p>
                          </div>
                          <p></p>
                        </div>
                      </div>
                      </a>
                    </div>
                 
                @endforeach
              </div>

           
        </div>
        @include('headers.footer')

