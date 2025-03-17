<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPaid;

class PaymentController extends Controller
{
    public function store(StorePaymentRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        return DB::transaction(function () use ($data, $user) {
            if($user->balance > $data['amount']){
                $payment = Payment::create([
                    'amount' => $data['amount'],
                    'address' => $data['address'],
                    'user_id' => $user->id,
                    'order_id' => $data['order_id']
                ]);

                $payment->order->is_paid = true;
                $payment->user->decrement('balance', $data['amount']);
                $payment->push();

                Mail::to($user->email)->send(new OrderPaid($payment->order));
                return redirect()->route('orders.index')->with('message', 'Order paid successfully');
            }
            else {
                return back()->withErrors(['balance' => 'User balance is not enough!!']);
            }
        });

    }
}
