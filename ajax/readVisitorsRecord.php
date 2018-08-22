<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
session_start();
    // include Database connection file 
    function nicetime($date)
{
    if(empty($date)) {
        return "Not Clocked out";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date       = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
	include("dbConnect.php");

	// Design initial table header 
	$data = '<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
					<thead>
						<tr style="background-color:#CCCCCC;">
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Identity</th>
                            <th>Item(s)</th>
                            <th>Time In</th>
                            <th>Clock In</th>
                            <th>Clock Out</th>
                            <th>Time Out</th>
                            <th>Options</th>
						</tr>
						<thead>';
	
	$query = "SELECT * FROM visitors";

	if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_array($result))
    	{
			
    		$data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['visitor_firstname'].'</td>
				<td>'.$row['visitor_lastname'].'</td>
				<td>'.$row['visitor_identity'].'</td>
				<td>'.$row['visitor_items'].'</td>
				<td>'.nicetime($row['date_stamp_in']).'</td>
                <td>'.$row['clock_in'].'</td>
                <td>'.$row['clock_out'].'</td>
                <td>'.nicetime($row['date_stamp_out']).'</td>

                <td>
					<button onclick="GetVisitorsDetails('.$row['visitor_id'].')" class="btn btn-danger">More</button>
				</td>
			
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No Visitor Items Yet!</td></tr>';
    }

	$data .= '</table>';
	$data .= '</div>';

    echo $data;
?>