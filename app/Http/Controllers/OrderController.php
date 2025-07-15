<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Exports\OrdersExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller 
{
	public function userOrders()
	{
		$orders = auth()->user()->orders()->latest()->get();
		return view('orders.user', compact('orders'));
	}

	public function download(Order $order)
	{
		$pdf = Pdf::loadView('pdf.order', compact('order'));
		return $pdf->download('pedido-'.$order->id.'.pdf');
	}

	public function exportExcel()
	{
		return Excel::download(new OrdersExport, 'pedidos.xlsx');
	}

	public function print(Order $order)
	{
		return view('orders.print', compact('order'));
	}
} 