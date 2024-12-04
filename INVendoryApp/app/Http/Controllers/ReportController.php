<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import the DOMPDF facade
use App\Models\Item; // Replace with your model
use App\Models\Manufacturer;


class ReportController extends Controller
{
    public function generateReport()
    {
        $item= Item::all();

        $totalPrice = $item->sum(function ($item){
            return $item->item_price * $item->item_quantity;
        });

        
        $data = [
            'item_name' => $item,
            'item_price' => 'item price',
            'item_quantity' => 'item quantity',
            'category_id' => 'category id',
            'manufacturer_id' => 'manufactuere id',
            'total_price' => $totalPrice,
        ];

        $pdf = PDF::loadView('report', $data);
        return $pdf->download('item.pdf');
    }
}
