<?php
namespace Strategies\Import;

use Interfaces\Import\ImportStrategyInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 
use Models\Order;

class PhpspreadsheetStrategy implements ImportStrategyInterface
{
    public function __construct()
    {
        $this->order = new Order();
    }

    public function import()
    {
        $reader = new Xlsx(); 
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
        $worksheet = $spreadsheet->getActiveSheet();  
        $worksheet_arr = $worksheet->toArray(); 

        // Remove header row 
        unset($worksheet_arr[0]); 

        foreach($worksheet_arr as $row){ 
            $data['e'] =  $row[0];
            $data['date'] =  $row[1];
            $data['name'] =  $row[2];
            $data['address'] =  $row[3];
            $data['product_name'] = $row[4];
            $data['quantity'] =  $row[5];
            $data['price'] =  $row[6];
            $data['sub_total'] =  $row[7];
            $data['total'] =  $row[8];

            //insert order data using model
            $this->order->saveOrder($data);
        } 
    }
}
