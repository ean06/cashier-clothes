<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF; // Assuming you're using a PDF package like barryvdh/laravel-dompdf

class InvoiceController extends Controller
{
    public function generateInvoicePDF($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);

        if (!$invoice) {
            // Handle case where invoice is not found
            return redirect()->route('invoices.index')->with('error', 'Invoice not found.');
        }

        // Load the invoice data into the PDF view
        $pdf = PDF::loadView('invoicePDF', compact('invoice'));

        // Download the generated PDF
        return $pdf->download('invoice_'.$invoice->transaction_number.'.pdf');
    }
}
