<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index (Request $request)
    {
        $data = $request->all();
        if(isset($data['saloon']) || isset($data['from']) || isset($data['to']) || isset($data['status'])){
            $bookings = new Booking();
            if($request->saloon){
                $masters_ids = User::where('parent_id', $request->saloon)->get();
                $masters_ids = $masters_ids->pluck('id')->toArray();
                if($masters_ids && count($masters_ids) > 0){
                    $bookings = $bookings->whereIn('user_id', $masters_ids);
                }else{
                    $bookings = $bookings->where('user_id', 0);
                }
            }
            if($request->from){
                $bookings = $bookings->where('date', '>=', $request->from);
            }
            if($request->to){
                $bookings = $bookings->where('date', '<=', $request->to);
            }
            if($request->status){
                $bookings = $bookings->where('status', $request->status);
            }
            $bookings = $bookings->orderBy('id', 'desc')->get();

        }else{
            $bookings = Booking::orderBy('id', 'desc')->get();
        }

        $page_title = "Admin Dashboard";
        $this->auth_check();
        $loggedInUser = Auth::user();
        $totalBookings = Booking::count();
        $totalEarnings = Booking::sum('price');
        $salons = User::where('type', 2)->get();
        return view('admin.index', compact('page_title', 'bookings', 'totalBookings', 'totalEarnings', 'salons'));
    }
    public function saloons()
    {
        $page_title = "All Saloons";
        $this->auth_check();
        $data = User::where('type', 2)->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('data', 'page_title'));
    }
    public function masters()
    {
        $page_title = "All Masters";
        $this->auth_check();
        $data = User::where('type', 1)->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('data', 'page_title'));
    }
    public function add_masters(Request $request)
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

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = 1;
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
                // dd($user->image);
            }
            $user->save();
            return back()->with('success', 'Master added successfully');
        }
        $page_title = "Add Master";
        $this->auth_check();
        $user = User::find(1);
        $working_days = json_decode($user->working_days);

        return view('admin.users.create', compact('page_title', 'user'));
    }
    public function edit_masters($id, Request $request)
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

            $user = User::find($id);
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
            return back()->with('success', 'Master updated successfully');
        }
        $page_title = "Edit Master";
        $this->auth_check();
        $user = User::find($id);
        $working_days = json_decode($user->working_days);

        return view('admin.users.edit', compact('page_title', 'user'));
    }
    public function customers()
    {
        $page_title = "All Customers";
        $this->auth_check();
        $data = User::where('type', 0)->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('data', 'page_title'));
    }
    public function bookings()
    {
        $page_title = "All Bookings";
        $this->auth_check();
        $bookings = Booking::where('status','!=',2)->orderBy('id', 'desc')->get();
        return view('admin.bookings.index', compact('bookings', 'page_title'));
    }
    public function view_booking($id)
    {
        $page_title = "View Booking";
        $this->auth_check();
        $booking = Booking::find($id);
        return view('admin.bookings.show', compact('booking', 'page_title'));
    }
    public function edit_booking($id, Request $request)
    {
        $page_title = "Edit Booking";
        $this->auth_check();
        $booking = Booking::find($id);
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'status' => 'required',
            ],[
                'status.required' => 'Status is required',
            ]);
            $booking->status = $request->status;
            $booking->save();
            return back()->with('success', 'Booking updated successfully');
        }
        return view('admin.bookings.edit', compact('booking', 'page_title'));
    }
    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return back()->with('success', 'Booking deleted successfully');
    }
    public function restore_booking($id)
    {
        $booking = Booking::find($id);
        $booking->is_active = 1;
        $booking->save();
        return back()->with('success', 'Booking restored successfully');
    }

    public function services()
    {
        $page_title = "My Services";
        $loggedInUser = Auth::user();
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.services.index', compact('services', 'page_title'));
    }
    public function edit_user($id){
        $page_title = "Edit User";
        $this->auth_check();
        $user = User::where('id',$id)->first();
        $working_days = json_decode($user->working_days);

        return view('admin.users.edit', compact('page_title', 'user'));
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully');
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
            $service->user_id = $request->user_id;
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
        $page_title = "Admin Profile";
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
   
}
