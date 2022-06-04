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
                      <!--<ol class="breadcrumb">-->
                      <!--  <li><i class="bi bi-house-door"></i></li>-->
                      <!--  <li><a href="#" class="">Sanction post page</a> <i class="fas fa-angle-right"></i> </li>-->
                      <!--  <li><a href="#" class=""> District wise report</a></li>       -->
                      <!--</ol>-->

                      <div class="card bg-white mt-4">
                       <div class="card-body">
                        <div class="table-content">
                            <div class="container mt-4 mb-4">
                            <div class="row align-items-center">
                            <div class="col-md-6 pl-0"><h4><b>District Sanctioned Post Entries </b></h4></div>
                            <div class="col-md-6"><input id="myInput" type="text" placeholder="Search.." class="form-control"></div>
                          </div>
                        </div>
                          <!--   <div class="mb-4"><h4><b>District Sanctioned Post Entries </b></h4></div>-->
                          <!--   <input id="myInput" type="text" placeholder="Search.." class="form-control">-->
                          <!--<br>-->
                          <form name="frm" method="post" id="myform" action="{{ url('/districtinsert') }}">
                            @csrf
                            <div class="table-responsive table thead-scroll">
                          <table class="" border="1" style="font-size:13px;" id="example1">
                            <thead class="t-head">
                              <tr class="table-primary text-center">
                                <th style="padding: 10px; font-size: 12px !important;" rowspan="3" class="sticky-col first-col">S.NO</th>
                                 <th rowspan="3" style="font-size: 12px !important;" class="sticky-col second-col">District Name</th>
                                 @foreach($designation as $des)
                                 <th colspan="4" style="font-size: 12px !important;">{{$des->description}}</th>
                                 @endforeach
                                 <th style="font-size: 12px !important;" rowspan="3">Total </th>
                              </tr>
                              <tr class="table-primary text-center">
                                   @foreach($designation as $des)
                                   @foreach($emp_type as $type)
                                      <th style="font-size: 12px !important; width:15px !important;">{{$type->employee_type_desc}}</th>
                                   @endforeach
                                   <th style="font-size: 12px !important;">Total</th>
                                   @endforeach
                              </tr>
                            </thead>
                            <input type="hidden" name="levelid" value="{{$designation[0]->designation_level}}" class="form-control">
                            <tbody class="text-center" id="search_content">
                                @php $i = 1 @endphp
                            @foreach($district as $dist)
                            
                                <tr class="pad-tdd">
                                    <td class="sticky-col first-col">{{$i++}}</td>
                                    <td style="font-size: 12px !important;" class="sticky-col second-col">{{$dist->distname}}</td>
                                    @for($s=0;$s < count($designation);$s++)
                                        @foreach($emp_type as $type)
                                            <td class="input-group-sm" >
                                                <input type="number" @if($type->employee_type_desc == 'HR') @if(!$designation[$s]->hr) readonly @endif @endif @if($type->employee_type_desc == 'Non HR') @if(!$designation[$s]->non_hr) readonly @endif @endif @if($type->employee_type_desc == 'Government') @if(!$designation[$s]->govt) readonly @endif @endif name="post[]" value="{{$ind_count[$dist->distid][$designation[$s]->id][$type->employee_type_id]}}" id="post{{$designation[$s]->id}}{{$dist->distid}}{{$type->employee_type_id}}" class="form-control post" >
                                                <input type="hidden" name="distid[]" value="{{$dist->distid}}" id="dist{{$designation[$s]->id}}{{$dist->distid}}{{$type->employee_type_id}}" class="form-control">
                                                <input type="hidden" name="desid[]" value="{{$designation[$s]->id}}" id="desi{{$designation[$s]->id}}{{$dist->distid}}{{$type->employee_type_id}}" class="form-control">
                                                <input type="hidden" name="emp_type[]" value="{{$type->employee_type_id}}" id="emp{{$designation[$s]->id}}{{$dist->distid}}{{$type->employee_type_id}}" class="form-control">
                                                <p class="error_div" style="display:none;color:red;" id="error{{$designation[$s]->id}}{{$dist->distid}}{{$type->employee_type_id}}"></p>
                                            
                                            </td>
                                        @endforeach
                                        <td class="input-group-sm">
                                            {{$count[$dist->distid][$designation[$s]->id]}}
                                            <!--<input type="number" value="" class="form-control post">-->
                                        </td>
                                    @endfor
                                    <td>{{$dist_count[$dist->distid]}}</td>
                                </tr>
                                
                            @endforeach
                            

                            </tbody>
                            <tfoot>
                                <tr class="total-bg">
                                <td colspan="2" class="sticky-col first-col">Total</td>
                                @for($s=0;$s < count($designation);$s++)
                                @foreach($emp_type as $type)
                                <td>{{$ind_des_count[$designation[$s]->id][$type->employee_type_id]}}</td>
                                @endforeach
                                <td>{{$des_count[$designation[$s]->id]}}</td>
                                @endfor
                                <td style="padding: 10px;">{{$total}}</td>
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
            var post = $(this).val();
            var id = $(this).attr('id');
            var num = id.match(/\d/g);
            num = num.join("");
            var desid = $('#desi'+num).val();
            var dist = $('#dist'+num).val();
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

 
  <!-- Bootstrap bundle JS -->
   @include('headers.footer')
   
 