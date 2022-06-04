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
.table tr td{
    padding:5px !important;
}
.table .form-control {
    padding:5px 15px;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
.t-head {
    position:sticky;
    top: 0;
    padding: 10px 10px !important;
    vertical-align: middle;

}
.t-body th {
    padding: 10px 10px !important;
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
    float:right;
}
.thead-scroll {
    overflow:auto;
    height:600px;
}
td input.form-control {
    width: 60px !important;
}
</style>
      <div class="main-panel">
        <div class="content-wrapper">
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

                    <div class="card ">
                        <div class="card-body">
                      <div class="bg-white">

                        <div class="table-content">
                                <div class="row align-items-center mt-3 mb-3 ">
                                    <div class="col-md-6">
                                        <h4><b>Head Office Sanctioned Post Entries </b></h4></div>
                                <div class="col-md-6">
                                    <input id="myInput" type="text" placeholder="Search.." class="form-control mb-3" style="">
                                </div>
                            </div>
                        <!--<div class="mb-4"><h4><b>  </b></h4></div>-->
                        <!--     <input id="myInput" type="text" placeholder="Search.." class="form-control mb-3" style="width:20%">-->

                          <form name="frm" method="get" id="myform" action="{{ url('/headofficeinsert') }}">
                            @csrf

                          <div class="table-responsive thead-scroll">
                              <table class="table table-bordered table-striped width_50 " id="example1">

                            <thead class="t-head text-center">
                              <tr class="table-primary">
                                <th rowspan="2" width="5%" talign="top">S.No</th>
                                 <th rowspan="2" width="20%" >Designation</th>
                                  <th colspan="3">Employee Type</th>
                                  <th rowspan="2">Number of Sanctioned Posts</th>
                              </tr>
                              <tr class="table-primary">
                                  @foreach($emp_type as $type)
                                    <th>{{$type->employee_type_desc}}</th>
                                  @endforeach
                            </tr>
                            </thead>

                            <tbody class="text-center" id="search_content">
                                <?php $sum=0; $i = 1;?>
                                @foreach(@$headoffice as $val)
                                @php

                                @endphp
                                  <tr>
                                  <td>{{$i++}}</td>
                                    <td>{{@$val->description}}</td>
                                    @foreach($emp_type as $type)
                                        <td>
                                            <input type="text" @if($type->employee_type_desc == 'Government') @if(!$val->govt) readonly @endif @endif @if($val->govt) @if($type->employee_type_desc == 'Government') @else readonly @endif @endif name="post[]" id="post{{$val->id}}{{$type->employee_type_id}}" value="{{$post1[$val->id][$type->employee_type_id]}}" class="form-control post" style="height: 33px; text-align: center;" maxlength="5" onkeyup="javascript: this.value=this.value.match(/\d*/);">
                                            <p class="error_div" style="display:none;color:red;" id="error{{@$val->id}}{{$type->employee_type_id}}"></p>
                                            <input type="hidden" name="emp_level[]" id="emp{{@$val->id}}{{$type->employee_type_id}}" value="{{@$type->employee_type_id}}">
                                            <input type="hidden" name="desi_id[]" id="desi{{@$val->id}}{{$type->employee_type_id}}" value="{{@$val->id}}">
                                        </td>
                                      @endforeach
                                    <td class="input-group-sm" style="text-align: -webkit-center;">
                                        <input type="text" name="" class="form-control post" value="{{$post[$val->id]}}" style="height: 33px; text-align: center;" maxlength="5" onkeyup="javascript: this.value=this.value.match(/\d*/);" readonly>
                                    </td>


                                        <?php $sum=$sum+@$val->post_sanctioned; ?>
                                  </tr>

                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr class="total-bg t-body">
                                    <th colspan="2"><b>Total</b></th>
                                    @foreach($emp_type as $type)
                                    <th>{{$post2[$type->employee_type_id]}}</th>
                                  @endforeach
                                    <th>{{$total}}</th>
                                </tr>
                            </tfoot>

                          </table></div>


                          <div class="row mt-2">
                            <div class="col-md-12 text-center mb-2">
                          <button class="btn btn-submit" type="submit" name="save">Save</button>
                          <!--<input class="btn btn-submit" type="submit" name="save" value="Save">-->
                        </div>

                        </div>
                        </form>
                      </div>

                      </div>
  <!--end wrapper   --></div>
                    </div>

              </main>
       <!--end page main-->


       <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

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
        $('.post').on('blur',function(){
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
                    emp:emp,
                },

                success:function(result){
                    if(post < result){
                        $('#error'+num).html(result +' posts are alredy assigned <br> please enter value greter than '+ result);
                        $('#post'+num).css('border','1px solid red');
                        $('#post'+num).val(result);
                        $('#error'+num).fadeIn();
                      setTimeout(mydiv, 8000);
                    }else{
                        $('#head'+num).css('border','1px solid yellow');
                        $('#error'+num).fadeOut();
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


  <!--  <script>-->
  <!--    $(document).ready(function(){-->
  <!--        $('#example1').DataTable({-->
  <!--              "bPaginate": false,-->
  <!--              dom: 'Bfrtip',-->
  <!--              footerCallback: function (row, data, start, end, display) {-->
  <!--              var api = this.api();-->

                // Remove the formatting to get integer data for summation
  <!--              var intVal = function (i) {-->
  <!--                  return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;-->
  <!--              };-->

                // Total over this page
  <!--              for(let i=2;i<6;i++){-->
  <!--                  pageTotal = api-->
  <!--                  .column(i, { page: 'current' })-->
  <!--                  .data()-->
  <!--                  .reduce(function (a, b) {-->
  <!--                      return intVal(a) + intVal(b);-->
  <!--                  }, 0);-->

                // Update footer
  <!--              $(api.column(i).footer()).html(pageTotal);-->
  <!--              }-->
  <!--          },-->
  <!--        });-->
  <!--    })-->
  <!--</script>-->
