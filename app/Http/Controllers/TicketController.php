<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $user_role = $user->roles()->first();
        if ($user_role->name == 'Super Admin'){
            $data = Ticket::orderBy('id', 'DESC')->get();
        }else{
            $data = Ticket::where('user_id', Auth::user()->id)->orwhere('owner_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        }

        return view('pages.tickets.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'name')->all();
        return view('pages.tickets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start_in' => 'required',
            'end_in' => 'required'
        ]);
        $input = $request->all();
        $start_in = Carbon::parse($request->start_in);
        $end_in = Carbon::parse($request->end_in);
        $input['start_in'] = $start_in->format('Y-m-d H:m:s');
        $input['end_in'] = $end_in->format('Y-m-d H:m:s');
        $input['owner_id'] = Auth::user()->id;

        $ticket = Ticket::create($input);
        $user = $ticket->user->toarray();

        \Mail::send('pages.tickets.mails.create_ticket', $input, function($message) use ($user) {
            $message->to($user['email']);
            $message->from('no-reply@email.com');
            $message->subject( trans('main_trans.confirm_email'));
        });

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ticket::find($id);
        return view('pages.tickets.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ticket::find($id);
        $start_in = Carbon::parse($data->start_in);
        $end_in = Carbon::parse($data->end_in);
        $starts_in = $start_in->format('Y-m-d\TH:m');
        $ends_in = $end_in->format('Y-m-d\TH:m');

        return view('pages.tickets.edit',compact('data', 'starts_in', 'ends_in'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $start_in = Carbon::parse($request->start_in);
        $end_in = Carbon::parse($request->end_in);
        $input['start_in'] = $start_in->format('Y-m-d H:m:s');
        $input['end_in'] = $end_in->format('Y-m-d H:m:s');
        $ticket = Ticket::find($id);
        $ticket->update($input);
        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('tickets.index')
            ->with('success','Ticket deleted successfully');
    }

    public function updateStatus(Request $request, $id){
//        dd($request->all());
        $data = Ticket::find($id);
        $data->status = $request->status;
        $data->save();
        $user = $data->user;
        $data = $data->toarray();

        \Mail::send('pages.tickets.mails.create_ticket', $data, function($message) use ($user) {
            $message->to($user['email']);
            $message->from('no-reply@email.com');
            $message->subject( trans('main_trans.confirm_email'));
        });

        return redirect()->route('tickets.index')
            ->with('success','Ticket status updated successfully');
    }
}