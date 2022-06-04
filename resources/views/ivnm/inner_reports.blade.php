@include('headers.common_header')
<style>
.table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
    padding: 10px 3px;
    vertical-align: top;
    border-top: 1px solid #CED4DA;
    text-align: left;
}
.table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
    vertical-align: top;
    line-height: 1;
    white-space: inherit;
    height:auto !important;
}
.card .card-body {
    padding: 5px;
}

.headtitle {
        margin-bottom: 15px;
        font-size:20px;
}
</style>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<div class="main-panel">
    <div class="row">
       
        <div class="col mt-5 pt-3 pb-3">
            <p class="headtitle">
                @if(Request::segment(2) == 1)
                <b>Site Identification - {{ $work_type }}</b>
                @elseif(Request::segment(2) == 2)
                <b>Ground Clearance status - {{ $work_type }}</b>
                 @elseif(Request::segment(2) == 3)
                <b>Town Planning Clearance - {{ $work_type }}</b>
                 @elseif(Request::segment(2) == 4)
                 <b>Tender Process - {{ $work_type }}</b>
                  @elseif(Request::segment(2) == 5)
                  <b>Work in progress - {{ $work_type }}</b>
                   @elseif(Request::segment(2) == 6)
                   <b>Work Completion - {{ $work_type }}</b>
                   @endif
                </p>
            <div class="row">
                @if($work_process == 5)
                <div class="col-md-3">Total : {{ $total }}</div>
                <div class="col">Inprogress : @if($result){{ count($result) }}@else 0 @endif</div>
                <div class="col">Not Started : @if($result){{ ($total - count($result) - $completed) }}@else 0 @endif</div>
                @elseif($work_process == 6)
                <div class="col-md-3">Total : {{ $total }}</div>
                <div class="col">Completed : @if($result){{ count($result) }}@else 0 @endif</div>
                <div class="col">Inprogress/Not Started : @if($result){{ ($total - count($result) - $completed) }}@else 0 @endif</div>
                @else
                <div class="col-md-3">Total : {{ $total }}</div>
                <div class="col">Inprogress/completed : @if($result){{$total - count($result)}}@else 0 @endif</div>
                <div class="col">Pending : @if($result){{ count($result)}}@else 0 @endif</div>
                @endif
            </div>
            <br><br>
          <div class="table-responsive" style="height:80vh;">
           <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered table-striped" style="border-collapse: separate; table-layout:fixed
           ">
                <thead style="position:sticky;top:0">
                    <tr class="table-primary text-center" >
                        <td rowspan="2" style="width: 4%;">S.No</td>
                        <td rowspan="2" style="width:8%;">District</td>
                        <td rowspan="2" style="width:8%;">ULB </td>
                        <td rowspan="2" style="width:8%;">Location</td>
                        <td rowspan="2" style="width: 6%;">Area in Acres (Extent)</td>
                        <td rowspan="2" style=" width: 7%; font-size: 13px;;">Estimated Contract Value(ECV) in Laks  </td>
                        <td rowspan="2" style=" width: 7%; font-size: 13px;">Tender Contract Value(TCV) in Laks </td>
                        <td rowspan="2" style="width: 8%;">Current Status</td>
                        <td colspan="2" style="width:12%;">Percentage</td>
                        <td rowspan="2" style="width: 15%;">Remarks</td>
                        <td rowspan="2" style="width: 7%;">Photo</td>
                        <td rowspan="2" style="width:7%;">Contacts</td>
                        </tr>
                        <tr class="table-primary">
                        <td style="    font-size: 11px;">Physical</td>
                        <td style="    font-size: 11px;">Financial</td>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($result as $value)
                	    <tr class="text-center">
                	      <td>{{$i}}</td>
                	      <td>{{ $ulbnames[$value->ulbid]['distname'] }}</td>
                	      <td>{{ $ulbnames[$value->ulbid]['ulbname'] }}</td>
                	      <td>{{ $value->site_location }}</td>
                	      @if($value->site_area == 0)
                	        <td>-</td>
                	      @else
                	        <td>{{ $value->site_area }}</td>
                	      @endif
                	      
                	      <td>{{$value->ecv_amount}}</td>
                	      <td>{{ $value->tcv_amount }}</td>
                	      <!--<td>{{$value->ivnmWorkProgressStatusModel->description}}</td>-->
                	      <td>{{$work_progress_list[$value->work_final_status]}}</td>
                	      <td>{{ $value->physical_progress_percent }}%</td>
                	      <td>{{ $value->financial_progress_percent }}%</td>
                	      <td>{{ $value->remarks }}</td>
                	      <td class="text-center">
                           <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i}}">Photos</button>
                		  </td>
                		  <td>
                		    <a data-toggle="tooltip" data-placement="top" title="ACLB: {{$contactdata[$value->ulbid]['collectr_name']}} , Commissioner: {{$contactdata[$value->ulbid]['commissioner']}},Engineer:{{$contactdata[$value->ulbid]['ae']}} , Nodal Officer:{{$contactdata[$value->ulbid]['nodal']}}">
                		        <i class="fas fa-info-circle"></i>
                		         </a>
                            </td>
                        </tr>
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">Photos</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($value->ivnmWorkPhotosModel as $item)
                                            <img src={{asset($item->photo_url)}}>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                    <!--<button type="button" class="btn btn-success">Send message</button>-->
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
              </tbody>
        </table>
        
    </div> 
        </div>
    </div>


@include('headers.footer')