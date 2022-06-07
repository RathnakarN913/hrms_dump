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
            <div class="row align-items-center mt-4">
                    <div class="col-md-4">
                        <h4><b>ULB Sanctioned Post Entries for : {{ $ulb_name->ulbname }}</b></h4>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="post" id="ulb_form">
                            @csrf
                            <div class="row align-items-center mt-4 mb-4 ">
                                <div class="col-md-2 mt-2">
                                    <label for=""> Select ULB:</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="ulb" id="ulb" >
                                        <option value="">Select ULB</option>
                                        @foreach ($ulblist as $ulb)
                                            <option value="{{ $ulb->ulbid }}" @if($ulb->ulbid == $ind_ulb) selected @endif> {{ $ulb->ulbname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>


      <div class="table-content table table-responsive thead-scroll">

        <form id="myform" method="post" action="{{ url('/ulbinsert') }}">
         @csrf
         <input type="hidden" name="ulbid" id="ulbid" value="{{ $ulb_name->ulbid }}">
         <input type="hidden" name="distid" id="distid" value="{{ $ulb_name->distid }}">
        <table class="table" border="1" id="example1" style="width:100%">
          <thead class="t-head" style="position: sticky;top: 0;">
            <tr class="table-primary text-center">
              <th rowspan="2">S.NO</th>
              <th rowspan="2">Designation</th>
                <th colspan="3">Employee Type</th>
             <th rowspan="2">Total</th>
            </tr>
            <tr class="table-primary text-center">
                @foreach($emp_type as $type)
                    <th>{{$type->employee_type_desc}}</th>
                @endforeach
            </tr>
          </thead>
          <tbody class="text-center" id="search_content">
              @php $i = 1 @endphp
              @foreach($designation as $des)
                <tr class="pad-tdd">
                    <td>{{$i++}}</td>
                    <td>{{$des->description}}</td>
                        @foreach($emp_type as $type)
                            <td class="input-group-sm">
                                <input type="number" value="{{ $post_count->where('designation_id',$des->id)->where('employee_type',$type->employee_type_id)->sum('post_sanctioned') }}" @if($type->employee_type_desc == 'HR') @if(!$des->hr) readonly @endif @endif @if($type->employee_type_desc == 'Non HR') @if(!$des->non_hr) readonly @endif @endif @if($type->employee_type_desc == 'Government') @if(!$des->govt) readonly @endif @endif name="post[]" class="form-control post"  id="post{{$des->id}}{{$type->employee_type_id}}">
                                <input type="hidden" name="desid[]" class="form-control" value="{{$des->id}}" id="desi{{$des->id}}{{$type->employee_type_id}}">
                                <input type="hidden" name="emp_type[]" class="form-control" value="{{$type->employee_type_id}}" id="emp{{$des->id}}{{$type->employee_type_id}}">
                                <p class="error_div" style="display:none;color:red;" id="error{{$des->id}}{{$type->employee_type_id}}"></p>
                            </td>
                        @endforeach
                    <td> <input type="hidden" value="{{ $post_count->where('designation_id',$des->id)->sum('post_sanctioned') }}"> {{ $post_count->where('designation_id',$des->id)->sum('post_sanctioned') }}</td>
                </tr>
              @endforeach
           </tbody>
           <tfoot>
               <tr class="total-bg text-center  ">
                  <td colspan="2" class="sticky-col first-col">Total</td>
                       @foreach($emp_type as $type)
                         <td >{{ $post_count->where('employee_type',$type->employee_type_id)->sum('post_sanctioned') }}</td>
                       @endforeach
                   <td>{{ $post_count->sum('post_sanctioned') }}</td>
               </tr>
           </tfoot>

        </table>

      </div>
          <div class="row mt-4">
            <div class="col-md-12 text-center p-0">
          <button class="btn btn-submit" type="submit" name="save">Save</button>
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
    $(document).ready(function(){
        $('#ulb').on('change',function(){
            var form = $('#ulb_form').submit();
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
            var post = $(this).val();
            var id = $(this).attr('id');
            var num = id.match(/\d/g);
            num = num.join("");
            var desid = $('#desi'+num).val();
            var ulb = $('#ulbid').val();
            var dist = $('#distid').val();
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
   <script>
        $(document).ready(function() {
            $('#ulb').select2();
        });
    </script>

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
