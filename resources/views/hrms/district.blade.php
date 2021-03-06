@include('headers.common_header')
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


.table td{
    padding:5px !important;
}
.table td input{
    padding:5px;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.table tr td{
    padding:5px 15px !important;
}
.pad-tdd td {
    padding:5px 5px;
}
.pad-tdd input {
    text-align: center;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
.btn-submit {
    color: #fff;
   background-color: #56a400;
    border-color: #56a400;
    padding: 7px 15px;
    font-size: 16px;
    margin-top: 15px;
    border-radius: 15px;
}
#myInput{
    width: 50%;
    float: right;
}
td input.form-control {
    width: 60px !important;
}
.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
}
.first-col {
  width: 50px;
  min-width: 50px;
  max-width: 50px;
  left: 0px;
}
.second-col {
  width: 150px;
  min-width: 150px;
  max-width: 550px;
  left: 50px;
}
.t-head {
    z-index:99;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 1px !important;
}

.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 8px;
    padding-right: 20px;
    overflow: visible !important;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>



      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 ">

            </div>
          </div>
            @if($errors->any())
<div class="alert alert-success alert-dismissible">
                {{$errors->first()}}
            </div>
@endif
  @if(session()->has('msg'))
            <div class="alert alert-danger alert-dismissible">
                {{session()->get('msg')}}
                </div>
            @endif
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->

        <main class="page-content">


                      <div class="card bg-white mt-4">
                       <div class="card-body">
                        <div class="table-content">
                            <div class="container mt-4">
                                <div class="row align-items-center">
                                    <div class="col-md-5 pl-0">
                                        <h4><b>District Sanctioned Post Entries for:  {{ $ind_dist_name }}</b></h4>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Select District</label>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="" method="post" id="dist_form" name="dist_form">
                                                    @csrf
                                                    <select name="district" id="district">
                                                        <option value="">Select District</option>
                                                            @foreach ($district as $dist)
                                                                <option value="{{ $dist->distid }}" @if($dist->distid == $ind_dist) selected @endif>{{ $dist->distname }}</option>
                                                            @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{-- <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="district">Select District</label>

                            </div>
                            <div class="col">
                                <h4><b>District : </b></h4>
                            </div>
                        </div> --}}

                          <form name="frm" method="post" id="myform" action="{{ url('/districtinsert') }}">
                            @csrf
                            <div class="table-responsive table thead-scroll">
                          <table class="table table-bordered" id="example1" style="width:100%;">
                            <thead>
                              <tr class="table-primary text-center">
                                <th rowspan="2">S.NO</th>
                                 <th rowspan="2">Designation Name</th>
                                 <th colspan="3">Employee Type</th>
                                <th rowspan="2">Number of Sanctioned Posts</th>
                              </tr>
                              <tr class="table-primary text-center">
                                @foreach($emp_type as $type)
                                    <th>{{$type->employee_type_desc}}</th>
                                @endforeach
                              </tr>

                            </thead>
                            <input type="hidden" name="levelid" value="{{$designation[0]->designation_level}}" class="form-control">
                            <input type="hidden" name="dist" id="" value="{{ $ind_dist }}">
                            <tbody class="text-center" id="search_content">
                                @php $i = 1 @endphp

                                @foreach($designation as $des)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$des->description}}</td>
                                    @foreach($emp_type as $type)
                                        <td>
                                            <input type="text" name="post[]" id="post{{ $des->id }}{{ $type->employee_type_id }}" value="{{ $desi_val->where('employee_type',$type->employee_type_id)->where('designation_id',$des->id)->sum('post_sanctioned') }}" class="form-control post" @if($type->employee_type_desc == 'Government') @if(!$des->govt) readonly @endif @endif @if($des->govt) @if($type->employee_type_desc == 'Government') @else readonly @endif @endif onkeyup="javascript: this.value=this.value.match(/\d*/);">
                                            <input type="hidden" name="designation[]" id="desi{{ $des->id }}{{ $type->employee_type_id }}" value="{{ $des->id }}" class="form-control" >
                                            <input type="hidden" name="emp_type[]" id="emp{{ $des->id }}{{ $type->employee_type_id }}" value="{{ $type->employee_type_id }}">
                                            <p class="error_div" style="display:none;color:red;" id="error{{ $des->id }}{{ $type->employee_type_id }}"></p>
                                        </td>
                                    @endforeach
                                    <td><input type="hidden" value="{{ $desi_val->where('designation_id',$des->id)->sum('post_sanctioned') }}">{{ $desi_val->where('designation_id',$des->id)->sum('post_sanctioned') }}</td>
                                </tr>

                                 @endforeach

                            </tbody>

                            <tfoot>
                                <tr class="total-bg text-center">
                                <td colspan="2">Total</td>
                                @foreach($emp_type as $type)
                                <td>{{ $desi_val->where('employee_type',$type->employee_type_id)->sum('post_sanctioned') }}</td>
                                @endforeach
                                <td>{{ $desi_val->sum('post_sanctioned') }}</td>
                            </tr>
                            </tfoot>

                          </table>
                          </div>
                          <div class="row mt-2">
                            <div class="col-md-12 text-center p-0">
                           <button class="btn btn-submit" type="submit" name="save">Save</button>

                          <!--<input class="btn btn-submit" type="submit" name="save" value="Save">-->
                        </div>

                        </div>
                        </form>
                        </div>
                       </div>
                      </div>

              </main>


        <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->

  <script>
      $(document).ready(function(){
          $('#district').on('change',function(){
              var form = $('#dist_form').submit();
          })
      })
  </script>
 <script>
  $('#myform').submit(function (e) {
    var form = this;
    e.preventDefault();
    setTimeout(function () {
        form.submit();
    }, 1000); // in milliseconds
    });
</script>
<script>
    $(document).ready(function(){
        $('.post').on('change',function(){

            var dist = $('#district').val();
            if(dist == ''){
                alert('please select distrct fisrt..');
                $(this).val('').focus();
            }else{
                var post = $(this).val();
                var id = $(this).attr('id');
                var num = id.match(/\d/g);
                num = num.join("");
                var desid = $('#desi'+num).val();
                var emp = $('#emp'+num).val();

                var _token = '<?php echo csrf_token()  ?>';
                $.ajax({
                    url:"get_post_count",
                    method:"GET",
                    data:{
                        _token:_token,
                        desid:desid,
                        dist:dist,
                        emp:emp,
                    },

                    success:function(result){
                        if(post < result){
                            $('#error'+num).html(result +' posts are alredy assigned <br> please enter value greter than '+ result);
                            $('#post'+num).val(result);
                            $('#post'+num).css('border','1px solid red');
                            $('#error'+num).fadeIn();
                        setTimeout(mydiv, 8000);
                        }else{
                            $('#error'+num).hide();
                            $('#post'+num).css('border','1px solid green');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if(jqXHR.status == 404){
                            $('#post'+num).val(post);
                        }
                    },

                });

            }


        });
    });

   function mydiv(){
       $('.error_div').fadeOut();
   }
</script>

<script>
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

<script>
    $(document).ready(function() {
        $('#district').select2();
    });
</script>
  <!-- Bootstrap bundle JS -->
   @include('headers.footer')

   <script>
    $(document).ready(function(){
        $('#example1').DataTable({
              "bPaginate": false,
              dom: 'Bfrtip',
              buttons: [

                ],
              footerCallback: function (row, data, start, end, display) {
              var api = this.api();

              // Remove the formatting to get integer data for summation
              var intVal = function (i) {
                  return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
              };

              // Total over this page
              for(let i=2;i<6;i++){
                  pageTotal = api
                  .column(i, { page: 'current' })
                  .nodes()
                  .reduce(function (a, b) {
                      return intVal(a) + intVal($('input', b).val());
                  }, 0);

              // Update footer
              $(api.column(i).footer()).html(pageTotal);
              }
          },
        });
    })
</script>
