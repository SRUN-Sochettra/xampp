<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$initialStock = 0;
	$baseImageFolder = '../../data/item_images/';
	$itemImageFolder = '';
	
	if(isset($_POST['itemDetailsItemNumber'])){
		
		$itemNumber = htmlentities($_POST['itemDetailsItemNumber']);
		$itemName = htmlentities($_POST['itemDetailsItemName']);
		$discount = htmlentities($_POST['itemDetailsDiscount']);
		$quantity = htmlentities($_POST['itemDetailsQuantity']);
		$unitPrice = htmlentities($_POST['itemDetailsUnitPrice']);
		$status = htmlentities($_POST['itemDetailsStatus']);
		$description = htmlentities($_POST['itemDetailsDescription']);
		
		// Check if mandatory fields are not empty
		if(!empty($itemNumber) && !empty($itemName) && isset($quantity) && isset($unitPrice)){
			
			// Sanitize item number
			$itemNumber = filter_var($itemNumber, FILTER_SANITIZE_STRING);
			
			// Validate item quantity. It has to be a number
			if(filter_var($quantity, FILTER_VALIDATE_INT) === 0 || filter_var($quantity, FILTER_VALIDATE_INT)){
				// Valid quantity
			} else {
				// Quantity is not a valid number
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលលេខបរិមាណឱ្យបានត្រឹមត្រូវ។</div>';
				exit();
			}
			
			// Validate unit price. It has to be a number or floating point value
			if(filter_var($unitPrice, FILTER_VALIDATE_FLOAT) === 0.0 || filter_var($unitPrice, FILTER_VALIDATE_FLOAT)){
				// Valid float (unit price)
			} else {
				// Unit price is not a valid number
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលលេខតម្លៃឯកតាឱ្យបានត្រឹមត្រូវ។</div>';
				exit();
			}
			
			// Validate discount only if it's provided
			if(!empty($discount)){
				if(filter_var($discount, FILTER_VALIDATE_FLOAT) === false){
					// Discount is not a valid floating point number
					echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលលេខប្រាក់ឯកតាឱ្យបានត្រឹមត្រូវ។</div>';
					exit();
				}
			}
			
			// Create image folder for uploading images
			$itemImageFolder = $baseImageFolder . $itemNumber;
			if(is_dir($itemImageFolder)){
				// Folder already exist. Hence, do nothing
			} else {
				// Folder does not exist, Hence, create it
				mkdir($itemImageFolder);
			}
			
			// Calculate the stock values
			$stockSql = 'SELECT stock FROM item WHERE itemNumber=:itemNumber';
			$stockStatement = $conn->prepare($stockSql);
			$stockStatement->execute(['itemNumber' => $itemNumber]);
			if($stockStatement->rowCount() > 0){
				//$row = $stockStatement->fetch(PDO::FETCH_ASSOC);
				//$quantity = $quantity + $row['stock'];
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>ទំនិញមាននៅក្នុង DB ហើយ។ សូមចុចប៊ូតុង <strong>Update</strong> ដើម្បីធ្វើការធ្វើបច្ចុប្បន្នភាព។ ឬប្រើលេខកូដទំនិញផ្សេងទៀត។</div>';
				exit();
			} else {
				// Item does not exist, therefore, you can add it to DB as a new item
				// Start the insert process
				$insertItemSql = 'INSERT INTO item(itemNumber, itemName, discount, stock, unitPrice, status, description) VALUES(:itemNumber, :itemName, :discount, :stock, :unitPrice, :status, :description)';
				$insertItemStatement = $conn->prepare($insertItemSql);
				$insertItemStatement->execute(['itemNumber' => $itemNumber, 'itemName' => $itemName, 'discount' => $discount, 'stock' => $quantity, 'unitPrice' => $unitPrice, 'status' => $status, 'description' => $description]);
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>ទំនិញត្រូវបានបញ្ចូលទៅក្នុងមូលដ្ឋានទិន្នន័យ។</div>';
				exit();
			}

		} else {
			// One or more mandatory fields are empty. Therefore, display a the error message
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលទំនិញទាំងអស់ដែលត្រូវបានសម្គាល់ដោយ (*)</div>';
			exit();
		}
	}
?>