<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data using Laravel's built-in validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // If the validation fails, return a JSON response with the errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        // If the validation passes, send the email and return a success response
        // Code to send the email goes here...

        return response()->json(['success' => 'Your message has been sent!']);
    }
}