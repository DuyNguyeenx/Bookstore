<?php
function uploadFile($nameFolder, $file) {
    $fileName = time().'_'.$file->getClientOriginalName();
    return $file->storeAs($nameFolder,$fileName,'public');
}
function formatNumberPrice($number)
{
	return number_format($number, 0, '.', ',') . " đ";
}
function formatDate($date)
{
	if ($date != null) {
		return date('h:i | d-m-Y', strtotime($date));
	}
}
?>
