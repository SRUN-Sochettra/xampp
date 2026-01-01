<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$vendorDetailsSearchSql = 'SELECT * FROM vendor';
	$vendorDetailsSearchStatement = $conn->prepare($vendorDetailsSearchSql);
	$vendorDetailsSearchStatement->execute();

	$output = '<table id="vendorReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>អត្តសញ្ញាណប័ណ្ណអ្នកផ្គត់ផ្គង់</th>
						<th>ឈ្មោះពេញ</th>
						<th>អាសយដ្ឋានអ៊ីមែល</th>
						<th>ទូរស័ព្ទចល័ត</th>
						<th>ទូរស័ព្ទទី២</th>
						<th>អាសយដ្ឋាន</th>
						<th>អាសយដ្ឋាន 2</th>
						<th>ក្រុង</th>
						<th>ខេត្ត</th>
						<th>ស្ថានភាព</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $vendorDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		$output .= '<tr>' .
						'<td>' . $row['vendorID'] . '</td>' .
						'<td>' . $row['fullName'] . '</td>' .
						'<td>' . $row['email'] . '</td>' .
						'<td>' . $row['mobile'] . '</td>' .
						'<td>' . $row['phone2'] . '</td>' .
						'<td>' . $row['address'] . '</td>' .
						'<td>' . $row['address2'] . '</td>' .
						'<td>' . $row['city'] . '</td>' .
						'<td>' . $row['district'] . '</td>' .
						'<td>' . $row['status'] . '</td>' .
					'</tr>';
	}
	
	$vendorDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
							<th>អត្តសញ្ញាណប័ណ្ណអ្នកផ្គត់ផ្គង់</th>
							<th>ឈ្មោះពេញ</th>
							<th>អាសយដ្ឋានអ៊ីមែល</th>
							<th>ទូរស័ព្ទចល័ត</th>
							<th>ទូរស័ព្ទទី២</th>
							<th>អាសយដ្ឋាន</th>
							<th>អាសយដ្ឋាន 2</th>
							<th>ក្រុង</th>
							<th>ខេត្ត</th>
							<th>ស្ថានភាព</th>
						</tr>
					</tfoot>
				</table>';
	echo $output;
?>