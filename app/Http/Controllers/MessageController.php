<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

use Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Twilio\Rest\Client;

use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sms-blast');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $sid = 'AC9eda852d2054096821b4e7c4031e0c8c';
        $token = '7b9ab2a83cda7332c666cd18fe7405cf';
        $client = new Client($sid, $token);

        foreach (User::all() as $user) {
            if ($user->number) {

                $client->messages->create(
                    // the number you'd like to send the message to
                    '+63' . ltrim($user->number, '0'),
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+15855844760',
                        // the body of the text message you'd like to send
                        'body' => $request->value
                    ]
                );
                
            }
        }

        $message = Message::create([
            'value' => $request->value,
        ]);

        return response()->json([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    public function next(Request $request)
    {

        foreach (User::all() as $user) {
           
        }


        return response()->json([
            'reload' => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
