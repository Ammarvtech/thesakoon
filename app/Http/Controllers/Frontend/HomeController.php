<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\UserImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index()
    {
        $companies = User::where('type', 2)->where('status',1)->limit(8)->latest()->get();
        $services = Service::where('status', 1)
        ->where('is_active', 1)
        ->where('status', 1)
        ->where('is_home_page',1)
        ->orderBy('id', 'desc')
        ->limit(12)
        ->get();
        return view('frontend.index', compact('companies', 'services'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'message.required' => 'Message is required',
            ]);
            return back()->with('success', 'Message sent successfully');
        }
        return view('frontend.contact');
    }
    public function company_detail($id)
    {
        $company = User::find($id);
        // dd($company);
        $allEmployeesIds = User::where('parent_id', $id)->pluck('id');
        $allServices = Service::whereIn('user_id', $allEmployeesIds)->get();
        // $services = Service::where('user_id', $id)->get();
        $availableSlots = [];
        return view('frontend.company_detail', compact('company', 'allServices', 'availableSlots'));
    }
    public function services()
    {
        $services = Service::paginate(12);
        return view('frontend.services', compact('services'));
    }

    public function dashboard()
    {
        $loggedInUser = Auth::user();
        $allCompanyUsers = User::where('parent_id', $loggedInUser->id)->get();
        if($loggedInUser->type == 0){
            return redirect()->route('user_dashboard');
        }

        return view('frontend.dashboard', compact('allCompanyUsers'));
    }
    public function user_dashboard()
    {
        $loggedInUser = Auth::user();
        $bookings = Booking::where('customer_id', $loggedInUser->id)->orderBy('id','desc')->get();
        $totalBookings = Booking::where('customer_id', $loggedInUser->id)->count();
        return view('frontend.user_dashboard', compact('bookings', 'totalBookings'));
    }
    public function user_profile(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'nullable',
                'contact' => 'nullable',
                'password' => 'nullable',
                'confirm_password' => 'nullable|same:password',
            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be jpeg,png,jpg,gif,svg',
                'image.max' => 'Image should be less than 2MB',
                'address.required' => 'Address is required',
                'contact.required' => 'Contact is required',
            ]);

            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contact = $request->contact;
            if($request->password){
                $user->password = Hash::make($request->password);
            }

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
        $user = User::find(Auth::id());
        $loggedInUser = Auth::user();
        return view('frontend.user_profile', compact('user'));
    }
    public function profile(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required',
                'contact' => 'required',
                'detail' => 'required',
                'working_days' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be jpeg,png,jpg,gif,svg',
                'image.max' => 'Image should be less than 2MB',
                'address.required' => 'Address is required',
                'contact.required' => 'Contact is required',
                'detail.required' => 'Detail is required',
                'working_days.required' => 'Working Days is required',
                'start_time.required' => 'Start Time is required',
                'end_time.required' => 'End Time is required',
            ]);

            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contact = $request->contact;
            $user->detail = $request->detail;
            $user->working_days = json_encode($request->working_days);
            $user->start_time = $request->start_time;
            $user->end_time = $request->end_time;

            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $user->image = $name;
            }
            if($request->hasFile('saloon_images')){
                $saloon_images = $request->file('saloon_images');
                foreach($saloon_images as $image){
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                    $userImage = new UserImage();
                    $userImage->user_id = Auth::id();
                    $userImage->image = $name;
                    $userImage->save();
                }
            }
            $user->save();
            return back()->with('success', 'Profile updated successfully');
        }
        $user = User::find(Auth::id());
        $loggedInUser = Auth::user();
        if($loggedInUser->type == 0){
            return redirect()->route('user_profile');
        }
        // dd($user->saloon_images);
        $page_title = "Profile";
        return view('frontend.profile', compact('user', 'page_title'));
    }
    public function delete_image(Request $request)
    {
        $id = $request->id;
        $image = UserImage::find($id);
        $image->delete();
        return response()->json(['status' => 'success']);
    }
    public function bookings()
    {
        $loggedInUser = Auth::user();
        if($loggedInUser->type == 2){
            $allCompanyUsers = User::where('parent_id', $loggedInUser->id)->get();
            $bookings = Booking::whereIn('user_id', $allCompanyUsers->pluck('id'))->get();
        }
        if($loggedInUser->type == 1){
            $bookings = Booking::where('user_id', $loggedInUser->id)->get();
        }
        if($loggedInUser->type == 0){
            $bookings = Auth::user()->customerBookings;
        }
        return view('frontend.bookings', compact('bookings'));
    }
    public function book_service(Request $request, $id)
    {
        if($request->isMethod('post')){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'nullable',
                // 'date' => 'required',
                'time' => 'required',
                'day' => 'required',
            ],[
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                // 'date.required' => 'Date is required',
                'time.required' => 'Time is required',
                'address.required' => 'Address is required',
            ]);
            // check if we don't have a booking on the same date and time
            $booking = Booking::where('service_id', $id)->where('date', $request->date)->where('time', $request->time)->first();
            if($booking){
                return back()->with('error', 'Booking already exists on the same date and time');
            }
            $booking = new Booking();
            $booking->service_id = $id;
            $booking->customer_id = Auth::id();
            $booking->user_id = Service::find($id)->user_id;
            $booking->price = Service::find($id)->price;
            $booking->first_name = $request->first_name;
            $booking->last_name = $request->last_name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            // $booking->date = $request->date;
            $booking->time = $request->time;
            $booking->notes = $request->notes;
            $booking->status = 0;
            $booking->day = $request->day;
            $booking->save();

            // mail 
            // $bodyHtml = "Thanks your booking has been placed successfully";
            // $subject = "Booking Confirmation";
            // $email = $request->email;
        

            return redirect()->route('booking_success')->with('success', 'Booking done successfully');
        }
        $service = Service::find($id);
        $availableSlots = $this->generateSlots($service->user_id, $service->time);
        $mailBody = "Thanks your booking has been placed successfully";
        $mailSubject = "Booking Confirmation";
        $mail = $service->user->email;
        $headers = "From:info@thesakoon.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($mail, $mailSubject, $mailBody, $headers);

        return view('frontend.book_service', compact('service', 'availableSlots'));
    }
    public function generateSlots($userId, $serviceTime)
    {
        $user = User::find($userId);
        $workingDays = json_decode($user->working_days);
        $start_time = $user->start_time;
        $end_time = $user->end_time;
        $slots = [];
        foreach($workingDays as $day){
            $slots[$day] = [];
            $start = strtotime($start_time);
            $end = strtotime($end_time);
            while($start < $end){
                $slots[$day][] = date('H:i', $start);
                $start = strtotime('+'.$serviceTime.' minutes', $start);
            }
        }
        $futureBookings = Booking::where('user_id', $userId)->where('status',1)->get();
        // dd($slots);
        // dd($futureBookings);
        foreach($futureBookings as $booking){
            if(isset($slots[$booking->day])){
     
                $bookingTime = date('H:i', strtotime($booking->time));
                $key = array_search($bookingTime, $slots[$booking->day]);
                if($key !== false){
                    unset($slots[$booking->day][$key]);
                }
            }
        }
        return $slots;
    }
    public function booking_success()
    {
        return view('frontend.book_success');
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return back()->with('success', 'User deleted successfully');
    }
    public function edit_user(Request $request, $id)
    {
        abort(404);
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'type' => 'required',
            ],[
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'type.required' => 'Type is required',
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = $request->type;
            $user->save();
            return back()->with('success', 'User updated successfully');
        }
        $user = User::find($id);
        return view('frontend.edit_user', compact('user'));
    }
    public function delete_service($id)
    {
        $service = Service::find($id);
        $service->is_active = 0;
        $service->save();
        return back()->with('success', 'Service deleted successfully');
    }
    public function restore_service($id)
    {
        $service = Service::find($id);
        $service->is_active = 1;
        $service->save();
        return back()->with('success', 'Service restored successfully');
    }
    public function edit_service(Request $request, $id)
    {
        abort(404);
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
            ],[
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'description.required' => 'Description is required',
            ]);

            $service = Service::find($id);
            $service->name = $request->name;
            $service->price = $request->price;
            $service->description = $request->description;
            $service->save();
            return back()->with('success', 'Service updated successfully');
        }
        $service = Service::find($id);
        return view('frontend.edit_service', compact('service'));
    }
    public function approve_service($id)
    {
        $service = Service::find($id);
        $service->status = 1;
        $service->save();
        return back()->with('success', 'Service approved successfully');
    }
}
