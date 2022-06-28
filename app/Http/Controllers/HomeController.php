<?php

namespace App\Http\Controllers;
use App\Models\ChatConvo;
use App\Models\Group;
use App\Models\GroupParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\BlockUser;
use App\Models\PlanSubscription;
use App\Models\Subscribed;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Carbon\Carbon;
use App\Models\Packages;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conversation = ChatConvo::where('sender_id',Auth::user()->id)->orwhere('reciever_id',Auth::user()->id)->orderBy('id','DESC')->get();
         $count_conversation = ChatConvo::where('sender_id',Auth::user()->id)->orwhere('reciever_id',Auth::user()->id)->count();
        $all_group = GroupParticipant::where('participant_id',Auth::user()->id)->orderBy('id','DESC')->get();
        $all_group_count = GroupParticipant::where('participant_id',Auth::user()->id)->count();

        return view('home',compact('conversation','count_conversation','all_group','all_group_count'));
    }

    public function conversation($id,$name){

         $conversation = ChatConvo::where('sender_id',Auth::user()->id)
         ->orwhere('reciever_id',Auth::user()->id)
         ->orderBy('id','DESC')
         ->get();
         $count_conversation = ChatConvo::where('sender_id',Auth::user()->id)->orwhere('reciever_id',Auth::user()->id)->count();
         $contact_details = User::where('id',$id)->first();
         $check_already_block = BlockUser::where('block_from',Auth::user()->id)
         ->where('block_to',$id)
         ->orwhere('block_to',Auth::user()->id)
         ->where('block_from',$id)->first();

        return view('conversation',compact('id','name','conversation','count_conversation','contact_details','check_already_block'));
    }

    public function send_message(Request $request, $id){

        $count_conversation = ChatConvo::where('sender_id',Auth::user()->id)->where('reciever_id',$id)->orwhere('sender_id',$id)->orwhere('reciever_id',Auth::user()->id)->count();
        if($count_conversation == 0){
            if($request->hasFile('files')){

                $attechment  = $request->file('files');

                    $img_2 =  time().$attechment->getClientOriginalName();
                    $attechment->move(public_path('message_media'),$img_2);

                    $image_name = explode('.', $img_2);
                    $extention = end($image_name);
                    $extention = Str::lower($extention);

                    if($extention == "png"){

                        $type = 'image';
                    }
                    elseif($extention == "jpg"){
                        $type = 'image';
                    }
                    elseif($extention == "mp4"){
                        $type = 'video';
                    }

                    elseif($extention == "jpeg"){
                        $type = 'image';
                    }else{

                        $type = "document";
                    }
            }
            $create_chat = new ChatConvo();
            $create_chat->sender_id = Auth::user()->id;
            $create_chat->reciever_id = $id;
            $create_chat->message = $request->message;
            $create_chat->file = $type ?? '';
            $create_chat->save();
        $contact = User::where('id',$id)->first();

           $this->send_message_to_user(['id'=>$id,'file_type'=>$type ?? '','link'=>'/Conversation/'.$id.'/'.$contact->name.' ', 'message'=>$request->message,'files'=>$img_2 ?? '']);

        }else{

             if($request->hasFile('files')){

                $attechment  = $request->file('files');

                    $img_2 =  time().$attechment->getClientOriginalName();
                    $attechment->move(public_path('message_media'),$img_2);

                    $image_name = explode('.', $img_2);
                    $extention = end($image_name);
                    $extention = Str::lower($extention);

                    if($extention == "png"){

                        $type = 'image';
                    }
                    elseif($extention == "jpg"){
                        $type = 'image';
                    }
                    elseif($extention == "mp4"){
                        $type = 'video';
                    }

                    elseif($extention == "jpeg"){
                        $type = 'image';
                    }else{

                        $type = "document";
                    }
            }

                    ChatConvo::where('sender_id',Auth::user()->id)->where('reciever_id',$id)->orwhere('sender_id',$id)->orwhere('reciever_id',Auth::user()->id)->update(array(
                    'sender_id' => Auth::user()->id,
                    'reciever_id' => $id,
                    'file' => $type ?? '',
                    'message' => $request->message,

                    ));
           $contact = User::where('id',$id)->first();

           $this->send_message_to_user(['id'=>$id,'file_type'=>$type ?? '','link'=>'/Conversation/'.$id.'/'.$contact->name.' ', 'message'=>$request->message,'files'=>$img_2 ?? '']);

        }

    }

    public function block($id){

    $count_already_block = BlockUser::where('block_from',Auth::user()->id)->where('block_to',$id)->count();
        if($count_already_block > 0){

            BlockUser::where('block_from',Auth::user()->id)->where('block_to',$id)->update(array(
                    'block_from' =>Auth::user()->id,
                     'block_to' =>$id,
                     'is_blocked' => 1
            ));
           $contact = User::where('id',$id)->first();

           $this->block_user(['id'=>$id,'req_fro'=>'block']);


        }else{

            $block = new BlockUser;
            $block->block_from = Auth::user()->id;
            $block->block_to = $id;
            $block->is_blocked = 1;
            $block->save();
            $this->block_user(['id'=>$id,'req_fro'=>'block']);

        }
        return redirect()->back();
    }

    public function unblock($id){

        BlockUser::where('block_from',Auth::user()->id)->where('block_to',$id)->delete();
           $this->block_user(['id'=>$id,'req_fro'=>'un_blocked']);
        return redirect()->back();

    }


    public function create_group(Request $request){

               $groups = new Group();

               if($request->hasFile('files')){
                   $attechment  = $request->file('files');
                   $img_2 =  time().$attechment->getClientOriginalName();
                   $attechment->move(public_path('group_thumb'),$img_2);
                }
                $groups->group_name = $request->group_name;
                $groups->group_thumb = $img_2;
                $groups->last_msg_nam = '';
                $groups->group_privacy = $request->group_privacy;
                $groups->group_host = Auth::user()->id;
                $groups->save();

                $group_members = new GroupParticipant();
                $group_members->group_id = $groups->id;
                $group_members->participant_id = Auth::user()->id;
                $group_members->save();
                return response()->json([$groups->id]);



           }

    public function add_member(Request $request,$id){
          $group_members = new GroupParticipant;
          $group_members->group_id = $request->group_id;
          $group_members->participant_id = $id;
          $group_members->save();
    }

    public function group($id,$name){

        $group_details = Group::where('id',$id)->first();
        $count_members = GroupParticipant::where('group_id',$id)->count();
        $member = GroupParticipant::where('group_id',$id)->get();
        return view('group',compact('id','name','group_details','count_members','member'));
    }

    public function leave_group($id){

        GroupParticipant::where('participant_id',Auth::user()->id)
        ->where('group_id',$id)
        ->delete();
        return redirect('/home');
    }

    public function make_host($id,$member_id){

        Group::where('id',$id)->update(array(
            'group_host'=>$member_id
        ));

        return redirect()->back();
    }

    public function kick_out($member_id,$id){

        GroupParticipant::where('participant_id',$member_id)->where('group_id',$id)->delete();
         $this->block_user(['id'=>$member_id,'req_fro'=>'kick_out']);

        return redirect()->back();

    }


    public function send_message_to_group(Request $request,$id){

        $group_details = Group::where('id',$id)->first();

           if($request->hasFile('files')){

                $attechment  = $request->file('files');

                    $img_2 =  time().$attechment->getClientOriginalName();
                    $attechment->move(public_path('message_media'),$img_2);

                    $image_name = explode('.', $img_2);
                    $extention = end($image_name);
                    $extention = Str::lower($extention);

                    if($extention == "png"){

                        $type = 'image';
                    }
                    elseif($extention == "jpg"){
                        $type = 'image';
                    }
                    elseif($extention == "mp4"){
                        $type = 'video';
                    }

                    elseif($extention == "jpeg"){
                        $type = 'image';
                    }else{

                        $type = "document";
                    }
            }
        Group::where('id',$id)->update(array(
            'group_last_message' => $request->message,
            'last_msg_nam' => $request->last_msg_from,
        ));
         $this->send_group_message(['group_id'=>$id,'group_name' => $group_details->group_name,'message'=>$request->message,'file_type'=>$type ?? '','link'=>'/Group/'.$id.'/'.str_replace(" ","-",$group_details->name).' ','files'=>$img_2 ?? '']);

    }

    public function payforsubscribe($package_id){
        
        $package_details = Packages::where('id',$package_id)->first();

    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();

    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('successTransaction',$package_details->id),
            "cancel_url" => route('cancelTransaction'),
        ],
        "purchase_units" => [
            0 => [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "".$package_details->pacakge_price.".00"
                ]
            ]
        ]
    ]);

    if (isset($response['id']) && $response['id'] != null) {

        // redirect to approve href
        foreach ($response['links'] as $links) {
            if ($links['rel'] == 'approve') {
                return redirect()->away($links['href']);
            }
        }

        return redirect()
            ->route('createTransaction')
            ->with('error', 'Something went wrong.');

    } else {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'Something went wrong.');
    }
    }
    public function successTransaction(Request $request,$id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $package_details = Packages::where('id',$id)->first();
            if($package_details->pacakge_valid == "6 month"){
                $carbon = Carbon::now();
                $expiry_data = $carbon->adddays(180);
            }
            if($package_details->pacakge_valid == "2 month"){
                $carbon = Carbon::now();
                $expiry_data = $carbon->adddays(60);
            }
            if($package_details->pacakge_valid == "1 month"){
                $carbon = Carbon::now();
                $expiry_data = $carbon->adddays(30);
            }
            if($package_details->pacakge_valid == "1 day"){
                $carbon = Carbon::now();
                $expiry_data = $carbon->adddays(1);
            }
            $subscribe = new Subscribed;
            $subscribe->user_id = Auth::user()->id;
            $subscribe->package_id = $id;
            $subscribe->is_active = 1;
            $subscribe->expiry_data = $expiry_data;
            
            $subscribe->save();
    
            return redirect()
                ->route('home')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

   
    public function package_expiration(){
        $check_subscription = Subscribed::where('is_active',1)->get();
        foreach($check_subscription as $check_subscriptions){
                if(Carbon::now()->format('Y-m-d') == $check_subscriptions->expiry_data){
                    Subscribed::where('id',$check_subscriptions->id)->update(array(
                        'is_active' => 0
                    ));
                }
        }
    }

    public function change_profile_pic(Request $request){

        if($request->hasFile('files')){
            $attechment  = $request->file('files');
            $img_2 =  time().$attechment->getClientOriginalName();
            $attechment->move(public_path('/assets/media/avatar/'),$img_2);
        }
        User::where('id',Auth::user()->id)->update(array(
            'avatar' => $img_2
        ));
        return response()->json([
            'res' => 'success'
        ]);
    }

    public function update_profile_info(Request $request){
        User::where('id',Auth::user()->id)->update(array(
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'dob' => $request->dob,
            'name' => $request->name,
        ));
        $user = User::find(Auth::user()->id);
        return response()->json([
            'res' =>$user
        ]);
    }

}
