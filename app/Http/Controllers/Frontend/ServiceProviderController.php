<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ServiceProviderController extends Controller
{
    public function index (Request $request)
    {
        $page_title = "Master Dashboard";
        $this->auth_check();
        $loggedInUser = Auth::user();
        $bookings = Booking::where('user_id', $loggedInUser->id)->orderBy('id', 'desc')->get();
        $totalBookings = Booking::where('user_id', $loggedInUser->id)->count();
        $totalEarnings = Booking::where('user_id', $loggedInUser->id)->sum('price');
        return view('service_provider.index', compact('page_title', 'bookings', 'totalBookings', 'totalEarnings'));
    }
    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 1;
        $booking->save();
        $maiBody = "Your booking has been approved";
        $headers = "From:info@thesakoon.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($booking->customer->email, "Booking Approved", $maiBody, $headers);
        return back()->with('success', 'Booking approved successfully');
    }
    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 2;
        $booking->save();
        $maiBody = "Your booking has been rejected";
        $headers = "From:info@thesakoon.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($booking->customer->email, "Booking Rejected", $maiBody, $headers);    
        return back()->with('success', 'Booking deleted successfully');
    }
    public function time_slots()
    {
        $page_title = "Time Slots";
        $timeSlots = TimeSlot::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $this->auth_check();
        return view('service_provider.time_slots.index', compact('page_title', 'timeSlots'));
    }
    public function add_time_slot(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'status' => 'required',
            ],[
                'start_time.required' => 'Start time is required',
                'end_time.required' => 'End time is required',
                'status.required' => 'Status is required',
            ]);

            $timeSlot = new TimeSlot();
            $timeSlot->user_id = Auth::id();
            $timeSlot->start_time = $request->start_time;
            $timeSlot->end_time = $request->end_time;
            $timeSlot->status = $request->status;
            $timeSlot->save();
            return back()->with('success', 'Time slot added successfully');
        }
        $page_title = "Add Time Slot";
        $this->auth_check();
        return view('service_provider.time_slots.add', compact('page_title'));
    }
    public function edit_time_slot($id, Request $request)
    {
        $timeSlot = TimeSlot::find($id);
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'status' => 'required',
            ],[
                'start_time.required' => 'Start time is required',
                'end_time.required' => 'End time is required',
                'status.required' => 'Status is required',
            ]);

            $timeSlot->start_time = $request->start_time;
            $timeSlot->end_time = $request->end_time;
            $timeSlot->status = $request->status;
            $timeSlot->save();
            return back()->with('success', 'Time slot updated successfully');
        }
        $page_title = "Edit Time Slot";
        $this->auth_check();
        return view('service_provider.time_slots.edit', compact('page_title', 'timeSlot'));
    }
    public function delete_time_slot($id)
    {
        $timeSlot = TimeSlot::find($id);
        $timeSlot->delete();
        return back()->with('success', 'Time slot deleted successfully');
    }
    public function services()
    {
        $page_title = "My Services";
        $loggedInUser = Auth::user();
        $services = Service::where('user_id', $loggedInUser->id)->orderBy('id', 'desc')->get();
        return view('service_provider.services.index', compact('services', 'page_title'));
    }
    public function add_service(Request $request)
    {
        $page_title = "Add Service";
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'time' => 'required',
                'description' => 'required',
            ],[
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'image.required' => 'Image is required',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be jpeg,png,jpg,gif,svg',
                'image.max' => 'Image should be less than 2MB',
                'description.required' => 'Description is required',
            ]);

            $service = new Service();
            $service->user_id = Auth::id();
            $service->name = $request->name;
            $service->price = $request->price;
            $service->user_id = Auth::id();
            $service->description = $request->description;
            $service->time = $request->time;
            $service->status = 0;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->save();
            return back()->with('success', 'Service added successfully');
        }
        return view('service_provider.services.add', compact('page_title'));
    }
    public function profile(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',    
                'address' => 'nullable',
                'working_days' => 'nullable|array',
                'start_time' => 'nullable',
                'end_time' => 'nullable',

            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be jpeg,png,jpg,gif,svg',
            ]);

            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->working_days = json_encode($request->working_days) ?? null;
            $user->start_time = $request->start_time ?? null;
            $user->end_time = $request->end_time ?? null;

            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $user->image = $name;
            }
            $user->save();
            return back()->with('success', 'Profile updated successfully');
        }
        $page_title = "Service Provider Profile";
        $this->auth_check();
        $user = Auth::user();
        $working_days = json_decode($user->working_days);

        return view('service_provider.profile', compact('page_title', 'user'));
    }
    public function approve_service($id)
    {
        $service = Service::find($id);
        $service->status = 1;
        $service->save();
        return back()->with('success', 'Service approved successfully');
    }
    public function auth_check(){
        if(Auth::check() && Auth::user()->type != 1){
            return redirect()->route('home');
        }
    }
    public function restore_service($id)
    {
        $service = Service::find($id);
        $service->is_active = 1;
        $service->save();
        return back()->with('success', 'Service restored successfully');
    }
   
}
