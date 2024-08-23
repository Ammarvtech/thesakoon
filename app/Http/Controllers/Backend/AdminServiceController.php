<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class AdminServiceController extends Controller
{

    public function index()
    {
        $page_title = "All Services";
        $loggedInUser = Auth::user();
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.services.index', compact('services', 'page_title'));
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
    public function approve_service($id)
    {
        $service = Service::find($id);
        $service->status = 1;
        $service->save();

        $notification = new Notification();
        $notification->from_user_id = Auth::id();
        $notification->user_id = $service->user_id;
        $notification->title = 'Service Approved';
        $notification->description = 'Your service has been approved';
        $notification->type = 'service';
        $notification->link = route('my_services');
        $notification->icon = 'fa fa-check';
        $notification->color = 'success';
        $notification->save();

        $email = $service->user->email;
        $emailContent = [
            'title' =>  'Congratulations! Your service has been approved',
            'service_name' => $service->name,
            'service_price' => $service->price,
            'added_by' => null
        ];
        Mail::send('emails.add_service', $emailContent, function($message) use ($email){
            $message->to($email)
            ->subject('The Sakoon - Service Approved');
        });

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
