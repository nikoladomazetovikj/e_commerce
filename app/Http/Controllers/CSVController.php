<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CSVController extends Controller
{
    public function adminCustomersReport()
    {
        $fileName = 'customers_payments.csv';

        $data =  $query = DB::table('online_payments', 'op')
            ->select('op.id',
                's.name as seed_name',
                'c.friendly_name as category_name',
                'op.quantity',
                'op.total_price',
                DB::raw('DATE(op.created_at) AS date')
            )
            ->join('seeds AS s', 's.id', '=', 'op.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->orderBy('date', 'desc')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Order N.', 'Seed', 'Category', 'Quantity', 'Price', 'Date');

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $d) {
                $row['Order N.']  = $d->id;
                $row['Seed'] = $d->seed_name;
                $row['Category'] = $d->category_name;
                $row['Quantity'] = $d->quantity;
                $row['Price'] = $d->total_price;
                $row['Date'] = $d->date;

                fputcsv($file, array($row['Order N.'], $row['Seed'], $row['Category'], $row['Quantity'],
                    $row['Price'], $row['Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
