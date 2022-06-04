@include('headers.common_header')

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
    border: 1px solid #56a400 !important;
    padding: 7px 15px;
    font-size: 16px;
    margin-top: 15px;
    border-radius: 15px;
    width: 7%;
}

#myInput{
    width: 50%;
    float:right;
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
          
            @if(session()->has('msg'))
            <div class="alert alert-danger alert-dismissible">
                {{session()->get('msg')}}
                </div>
            @endif
          @if($errors->any())
            <div class="alert alert-success alert-dismissible">
                {{$errors->first()}}
            </div>
        @endif
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->
              <main class="page-content">
    
<div class="card">
  <div class="card-body">  
  
    <div class="bg-white">
            <div class="row align-items-center mt-4 mb-4 ">
                    <div class="col-md-6">
                        <h4><b>ULB Sanctioned Post Entries </b></h4></div>
                <div class="col-md-6">
                    <input id="myInput" type="text" placeholder="Search.." class="form-control">
                </div>
            </div>
        <!--<h4><b>ULB Sanctioned Post Entries</b></h4>-->
        <!--<br>-->
        <!--    <input id="myInput" type="text" placeholder="Search.." class="form-control">-->
            
      <div class="table-content table table-responsive thead-scroll">
          
        <form id="myform" method="post" action="{{ url('/ulbinsert') }}">
         @csrf
        <table class="" border="1" style="font-size:13px;" id="example">
          <thead class="t-head" style="position: sticky;top: 0;">
            <tr class="table-primary text-center">
              <th style="padding: 10px; position: sticky;top: 0; font-size: 12px !important;" rowspan="4" class="sticky-col first-col">S.NO</th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="4" class="sticky-col second-col">ULB Name</th>
              @foreach($designation as $des)
              <th colspan="4" style="position: sticky;top: 0; font-size: 12px !important; ">{{$des->description}}</th>
              @endforeach
              <th style="position: sticky;top: 0; width: 7%;" rowspan="4">Total</th>
            </tr>
            <tr class="table-primary text-center">
               @foreach($designation as $des)
                @foreach($emp_type as $type)
                    <th style="font-size: 12px !important;width:80px">{{$type->employee_type_desc}}</th>
                @endforeach
                   <th>Total</th>
               @endforeach
            </tr>
          </thead>
          <tbody class="text-center" id="search_content">
              @php $i = 1 @endphp
              @foreach($ulblist as $ulb)
                <tr class="pad-tdd">
                    <td class="sticky-col first-col">{{$i++}}</td>
                    <td style="font-size: 12px !important;" class="sticky-col second-col">{{$ulb->ulbname}}</td>
                    @foreach($designation as $des)
                        @foreach($emp_type as $type)
                            <td class="input-group-sm">
                                <input style="width:60px;" type="number" @if($type->employee_type_desc == 'HR') @if(!$des->hr) readonly @endif @endif @if($type->employee_type_desc == 'Non HR') @if(!$des->non_hr) readonly @endif @endif @if($type->employee_type_desc == 'Government') @if(!$des->govt) readonly @endif @endif name="post[]" class="form-control post" value="{{$ind_count[$ulb->ulbid][$des->id][$type->employee_type_id]}}" id="post{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}">
                                <input type="hidden" name="ulbid[]" class="form-control" value="{{$ulb->ulbid}}" id="ulb{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}">
                                <input type="hidden" name="desid[]" class="form-control" value="{{$des->id}}" id="desi{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}">
                                <input type="hidden" name="dist_id[]" class="form-control" value="{{$ulb->DistrictModel->distid}}" id="dist{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}">
                                <input type="hidden" name="emp_type[]" class="form-control" value="{{$type->employee_type_id}}" id="emp{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}">
                                <p class="error_div" style="display:none;color:red;" id="error{{$des->id}}{{$ulb->ulbid}}{{$type->employee_type_id}}"></p>
                            </td>
                        @endforeach
                        <td>{{$count[$ulb->ulbid][$des->id]}}</td>
                    @endforeach
                    <td>{{$ulb_count[$ulb->ulbid]}}</td>
                </tr>
              @endforeach
           </tbody>
           <tfoot>
               <tr class="total-bg">
                  <td colspan="2" class="sticky-col first-col">Total</td>
                  
                   @foreach($designation as $des)
                       @foreach($emp_type as $type)
                        <td >{{$ind_des_count[$des->id][$type->employee_type_id]}}</td>
                       @endforeach
                    <td>{{$des_count[$des->id]}}</td>
                   @endforeach
                   <td style="padding: 10px;">{{$total}}</td>
              </tr>
           </tfoot>

        </table>      
                        
      </div>
          <div class="row mt-4">
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
       <!--end page main-->


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
            var ulb = $('#ulb'+num).val();
            var dist = $('#dist'+num).val();
            var emp = $('#emp'+num).val();
            
            var _token = '<?php echo csrf_token()  ?>';
            $.ajax({
                url:"get_post_count",
                method:"GET",
                data:{
                    _token:_token,
                    desid:desid,
                    ulb:ulb,
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
                        $('#post'+num).css('border','1px solid #00ff95');
                    }
                }
                
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