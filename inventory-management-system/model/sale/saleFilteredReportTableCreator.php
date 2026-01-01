<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$uPrice = 0;
	$qty = 0;
	$totalPrice = 0;
	
	if(isset($_POST['startDate'])){
		$startDate = htmlentities($_POST['startDate']);
		$endDate = htmlentities($_POST['endDate']);
		
		$saleFilteredReportSql = 'SELECT * FROM sale WHERE saleDate BETWEEN :startDate AND :endDate';
		$saleFilteredReportStatement = $conn->prepare($saleFilteredReportSql);
		$saleFilteredReportStatement->execute(['startDate' => $startDate, 'endDate' => $endDate]);

		$output = '<table id="saleFilteredReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>អត្តសញ្ញាណប័ណ្ណនៃការលក់</th>
							<th>លេខកូដទំនិញ</th>
							<th>អត្តសញ្ញាណប័ណ្ណអតិថិជន</th>
							<th>ឈ្មោះអតិថិជន</th>
							<th>ឈ្មោះទំនិញ</th>
							<th>កាលបរិច្ឆេទលក់</th>
							<th>ការបញ្ចុះតម្លៃ %</th>
							<th>បរិមាណ</th>
							<th>តម្លៃឯកតា</th>
							<th>តម្លៃសរុប</th>
						</tr>
					</thead>
					<tbody>';
		
		// Create table rows from the selected data
		while($row = $saleFilteredReportStatement->fetch(PDO::FETCH_ASSOC)){
			$uPrice = $row['unitPrice'];
			$qty = $row['quantity'];
			$discount = $row['discount'];
			$totalPrice = $uPrice * $qty * ((100 - $discount)/100);
		
			$output .= '<tr>' .
							'<td>' . $row['saleID'] . '</td>' .
							'<td>' . $row['itemNumber'] . '</td>' .
							'<td>' . $row['customerID'] . '</td>' .
							'<td>' . $row['customerName'] . '</td>' .
							'<td>' . $row['itemName'] . '</td>' .
							'<td>' . $row['saleDate'] . '</td>' .
							'<td>' . $row['discount'] . '</td>' .
							'<td>' . $row['quantity'] . '</td>' .
							'<td>' . $row['unitPrice'] . '</td>' .
							'<td>' . $totalPrice . '</td>' .
						'</tr>';
		}
		
		$saleFilteredReportStatement->closeCursor();
		
		$output .= '</tbody>
						<tfoot>
							<tr>
								<th>សរុប</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
					</table>';
		echo $output;
	}
?>


