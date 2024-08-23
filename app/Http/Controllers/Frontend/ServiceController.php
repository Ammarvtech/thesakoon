<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ServiceController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();
        if($loggedInUser->type == 2){
            $allCompanyUsers = User::where('parent_id', $loggedInUser->id)->get();
            $services = Service::whereIn('user_id', $allCompanyUsers->pluck('id'))->get();
        }
        if($loggedInUser->type == 1){
            $services = Service::where('user_id', $loggedInUser->id)->get();
        }
        return view('frontend.my_services', compact('services'));
    }
    public function add_service(Request $request)
    {
        if($request->isMethod('post')){
            // validate the form
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'time' => 'required',
            ],[
                'name.required' => 'Name is required',
                'price.required' => 'Price is required',
                'image.required' => 'Image is required',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be jpeg,png,jpg,gif,svg',
                'image.max' => 'Image should be less than 2MB',
                'description.required' => 'Description is required',
                'time.required' => 'Time is required',
            ]);

            $service = new Service();
            $service->user_id = Auth::id();
            $service->name = $request->name;
            $service->price = $request->price;
            $service->user_id = Auth::id();
            $service->description = $request->description;
            $service->time = $request->time;
            $service->status = 0;
            $service->is_home_page = 0;

            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $service->image = $name;
            }
            $service->save();

            $email = config('app.admin_email');
            $emailContent = [
                'title' =>  'A new service has been added',
                'service_name' => $request->name,
                'service_price' => $request->price,
                'added_by' => Auth::user()->name,
            ];
            Mail::send('emails.add_service', $emailContent, function($message) use ($email){
                $message->to($email)
                ->subject('The Sakoon - New Service Added');
            });
            $adminUsers = User::where('type', 3)->get();
            foreach($adminUsers as $adminUser){
                $notification = new Notification();
                $notification->from_user_id = Auth::id();
                $notification->user_id = $adminUser->id;
                $notification->title = 'New Service Added';
                $notification->description = 'A new service has been added by '.Auth::user()->name;
                $notification->type = 'service';
                $notification->link = route('admin.services');
                $notification->icon = 'fa fa-plus';
                $notification->color = 'success';
                $notification->save();
            }
            return back()->with('success', 'Service added successfully. admin will approve it soon');
        }
        return view('frontend.add_service');
    }
}