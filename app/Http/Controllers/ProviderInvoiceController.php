<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class ProviderInvoiceController extends Controller
{
    public function updateAppointmentDate(Request $request, $invoice)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'appointment_date' => 'nullable|date',
        ]);
        
        // Find the invoice
        $invoice = Invoice::findOrFail($invoice);
        
        // Update the appointment date
        $invoice->appointment_date = $validated['appointment_date'];
        $invoice->save();
        
        // Redirect back with success message
        return back()->with('success', 'Appointment date updated successfully.');
    }
}