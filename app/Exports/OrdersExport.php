<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::with('user')->get()->map(function ($order) {
            return [
                'ID' => $order->id,
                'Cliente' => $order->user->name,
                'Email' => $order->user->email,
                'Total' => $order->total,
                'Estado' => $order->status,
                'Fecha' => $order->created_at->format('Y-m-d H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Cliente', 'Email', 'Total', 'Estado', 'Fecha'];
    }
}