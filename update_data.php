<?php
error_reporting(1);
$conn= mysqli_connect('localhost','emunicipal_hrms','F9rk.[+am-pE','emunicipal_hrms');
// exit;

$sql ="SELECT * FROM `hrms_designations` group by `description`";
$rs = mysqli_query($conn,$sql);
$i=1;
while($row = mysqli_fetch_assoc($rs))
{
    $sql = "INSERT INTO `hrms_designations_group`(`group_id`, `designation`) VALUES ('".$i."','".$row['description']."')";
    
  $sql1 = "UPDATE `hrms_designations` SET `group_id`='".$i."' WHERE id='".$row['id']."'";
    
    $i++;
    
    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql1);
    
    // $sql = "SELECT * FROM `ulbmst`";
    // $rs1 = mysqli_query($conn,$sql);
    // while($row1 = mysqli_fetch_assoc($rs1))
    // {
    //     $sql="INSERT INTO `hrms_salary_add_percentages`
    //     (
             
    //         `ulbid`, 
    //         `designation_id`, 
    //         `hra`, 
    //         `pf`, 
    //         `esi`, 
    //         `fta`, 
    //         `pt`, 
    //         `agis`
    //         ) VALUES (
                
    //             '".$row1['ulbid']."',
    //             '".$row['id']."',
    //             '0',
    //             '0',
    //             '0',
    //             '0',
    //             '0',
    //             '0'
    //             )";
    //     mysqli_query($conn,$sql);
    // }
}
exit;

/*$sql ="SELECT * FROM `ivnm_work_details` where work_type_id='1'";
$rs = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($rs))
{
    echo $sql="INSERT INTO `ivnm_work_building_map`(
        `work_id`, 
        `building_name`, 
        `updated_at`
        ) VALUES (
            
            '".$row['id']."',
            '".$row['work_name']."',
            '".date('Y-m-d H:i:s')."'
            )";
    mysqli_query($conn,$sql);
}*/

//exit;
/*$sql ="SELECT * FROM `ivnm_engineers`";
$rs = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($rs))
{
    $sql ="update dummy_table set eng_name='".$row['id']."' where eng_name='".$row['engineer_name']."'";
    mysqli_query($conn,$sql);
}
exit;*/

/*$sql ="SELECT * FROM `ulbmst`";
$rs = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($rs))
{
    
    $sql ="SELECT * FROM `ulbmst` WHERE `ulbid` LIKE '".$row['ulbid']."'";
    $rs2 = mysqli_query($conn,$sql);
    $row2 = mysqli_fetch_assoc($rs2);
    $ulbname = $row2['ulbname'];
    /*echo $sql ="update excel_work_details set ulbid='".$row2['ulbid']."' where id='".$row['id']."'";
    mysqli_query($conn,$sql);*

 $workname =$ulbname."VKD";




if($row['physical_progress'] > 0 && $row['physical_progress'] <= 4)
{
    $is_site_selection_done=1;
    $ground_clearance_status=2;
    $tp_clearance_status=2;
    $tender_completed_status=2;
    $work_in_progress_status=0;
    $work_progress_last_status = 0;
    //$financial_progress_percent=0;
    $work_final_status = 2;
}
else
{
    $is_site_selection_done=1;
    $ground_clearance_status=1;
    $tp_clearance_status=1;
    $tender_completed_status=1;
    $work_in_progress_status=0;
    $work_progress_last_status = 0;
    $work_final_status = 5;
}


    echo $sql ="INSERT INTO `ivnm_work_details`(
        `ulbid`, 
        `work_type_id`, 
        `work_name`, 
        `is_site_selection_done`, 
        `if_selection_no_reason`, 
        `site_location`, 
        `site_area`, 
        `site_location_from_app`, 
        `latitude`, 
        `langitude`, 
        `ground_clearance_status`, 
        `tp_clearance_status`, 
        `tender_completed_status`, 
        `tcv_amount`,
         ecv_amount,
         work_in_progress_status,
        `work_progress_last_status`, 
        `financial_progress_percent`, 
        `physical_progress_percent`, 
        `work_created_date`, 
        `last_updated_date`, 
        `updated_at`, 
        `created_at`,
        work_final_status,
        remarks
        
        ) VALUES (
            '".$row['ulbid']."',
            '".$row['work_type']."',
            '".$workname."',
            '".$is_site_selection_done."',
            '',
            '".$row['location']."',
            '".$row['area']."',
            '',
            '0',
            '0',
            '".$ground_clearance_status."',
            '".$tp_clearance_status."',
            '".$tender_completed_status."',
            '".$row['tcv_amount']."',
            '".$row['ecv_amount']."',
            '".$work_in_progress_status."',
            '".$work_progress_last_status."',
            '0',
            '".$row['physical_progress']."',
            '".date('Y-m-d')."',
            '".date('Y-m-d H:i:s')."',
            '".date('Y-m-d H:i:s')."',
            '".date('Y-m-d H:i:s')."',
            '".$work_final_status."',
            '".$row['remarks']."'
            
            )";
            
            
            
            if(mysqli_query($conn,$sql))
            {
                $work_id = mysqli_insert_id($conn);
                if($row['physical_progress'] >= 5)
                {
                    echo $sql ="INSERT INTO `ivnm_workprogress_details`(
                         
                        `ulbid`, 
                        `work_type_id`, 
                        `work_id`, 
                        `current_amount`, 
                        `physical_progress_id`, 
                        `physical_progress_sortorder`, 
                        `work_status_id`, 
                        `financial_progress_percent`, 
                        `physical_progress_percent`, 
                        `pickup_location`, 
                        `latitude`, 
                        `langitude`, 
                        `active_status`, 
                        `date`, 
                        `updated_at`
                        ) VALUES (
                             '".$row['ulbid']."',
                             '".$row['work_type']."',
                            '".$work_id."',
                            '0',
                            '1',
                            '1',
                            '1',
                            '0',
                            '0',
                            '',
                            '0',
                            '0',
                            '1',
                            '".date('Y-m-d')."',
                            '".date('Y-m-d H:i:s')."'
                            )";
                            mysqli_query($conn,$sql);
                }
            }
            
            echo "<br>";
    
}

function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' )
        	{
        
        	    $dates = array();
        	    $current = strtotime($first);
        	    $last = strtotime($last);
        	    
        
        	    while( $current <= $last ) {
        	
        	        $dates[] = date($output_format, $current);
        	        $current = strtotime($step, $current);
        	    }
        	
        	    return $dates;
        	} 
        	
        	
/*$sql ="SELECT * FROM `ulbhouseholddata_old`";

$rs = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($rs))
{
   $sql2 ="SELECT * FROM `ward_mst` WHERE `ward_desc` LIKE '".$row['ward']."' and ulbid='".$row['ulbid']."'";
    
    $rs2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($rs2);
    echo $sql ="INSERT INTO `ulb_household_data`(
        `ward_id`, 
        `households`, 
        `comm_establishments`, 
        `institutions`, 
        `ulbid`, 
        `date`
        ) VALUES (
            
            '".$row2['ward_id']."',
            '".$row['houeholds']."',
            '".$row['comm_est']."',
            '".$row['institutions']."',
            '".$row['ulbid']."',
            '".date('Y-m-d')."'
            )";
            mysqli_query($conn,$sql);
}*/
$arr_dates=date_range('2021-08-01', '2021-08-31');
//$sql ="SELECT * FROM `ulb_household_data`";

/*$sql ="SELECT * FROM `ulb_household_data`";
$rs = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($rs))
{
/*echo $row['ulbid']."<br>";
    
    foreach($arr_dates as $key=>$val)
                            {*
    
    $target = $row['households'];
    $startno=$row['households']-1;
    $cleanedno = rand($startno,$target);
    $percent = number_format($cleanedno/$target*100,2);
    $date = date('Y-m-d');
    //$sql ="update ulb_household_data set household_cleaned='".$cleanedno."',percent='".$percent."',date='".$date."' where id='".$row['id']."'";
    echo $sql ="insert into ulb_cleaned_data(ulbid,ward_id,cleaned_count,percent,date)values('".$row['ulbid']."','".$row['ward_id']."','".$cleanedno."','".$percent."','".$date."')";
    echo "<br>";
    mysqli_query($conn,$sql);
    
                            /*}*
    
}*/
?>