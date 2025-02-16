<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

public function generateInvoicePDF($invoiceId)
{
    $invoice = Invoice::find($invoiceId);
    $pdf = PDF::loadView('invoicePDF', compact('invoice'));
    return $pdf->download('invoice_'.$invoice->transaction_number.'.pdf');
}
