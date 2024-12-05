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
        $items = Item::with(['category', 'manufacturer'])->get(); // Assuming relationships exist
    
        $totalPrice = $items->sum(function ($item) {
            return $item->item_price * $item->item_quantity;
        });
    
        $data = [
            'items' => $items, // Pass the collection of items
            'total_price' => $totalPrice,
        ];
    
        $pdf = PDF::loadView('report', $data);
        return $pdf->download('item.pdf');
    }
    
}
