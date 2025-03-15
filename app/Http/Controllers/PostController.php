<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\youtube;
use App\Models\Banner;
use App\Models\YoutubePost;
// use App\Models\massrequestlist;
// use App\Models\daywiselist;
use App\Models\ScheduleList;
use App\Models\Parishprist;
use App\Models\Requestlist;
use Illuminate\Support\Facades\Crypt;
use DB;
class PostController extends Controller
{
    public function post()
    {
        return view("posts.post");
    }
    public function postsave(Request $request)
    {
        dd($request);
        $url = "https://api.youtube.com";
        $uniqueFileName = "";
       
        if ($request->hasFile("file")) {
            $uniqueFileName =
                time() . "_" . $request->file("file")->getClientOriginalName();
            $request->file->move(public_path("uploads"), $uniqueFileName);
        }

        //   dd($uniqueFileName);
        $data = new post();

        $data->post_name = $request->p_name;
        $data->post_description = $request->description;
        $data->file_path = $uniqueFileName;
        $data->url = $url;
        $data->save();

        if ($data) {
            toastr()->success("Added successfully");
            return redirect()->route("postindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("postindex");
        }
    }

    public function index()
    {
        $posts = Post::paginate(5);
        return view("posts.postindex", compact("posts"));
    }
    public function editpost(Request $request)
    {
        $sql = Post::find($request->id);
        if ($sql) {
            return view("posts.postedit", compact("sql"));
        }
    }

    public function postupdate(Request $request)
    {
        $id = $request->id;

        $sql = Post::find($id);
        // dd($sql);
        if ($request->hasFile("file")) {
            if ($sql->file_path != null || !empty($request->file_path)) {
                $filePath = public_path("uploads/" . $sql->file_path);
                unlink($filePath);
            }
            $originalFileName = $request->file("file")->getClientOriginalName();
            $customFileName = time() . "_" . $originalFileName;
            $request
                ->file("file")
                ->move(public_path("uploads"), $customFileName);
        } else {
            $customFileName = $sql->file_path;
        }

        //dd($customFileName);
        $sql->post_name = $request->p_name;
        $sql->post_description = $request->description;
        $sql->status = $request->status;
        if ($customFileName !== null) {
            $sql->file_path = $customFileName;
        }
        $sql->update();

        if ($sql) {
            toastr()->success("Post Updated Successfully");
            return redirect()->route("postindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("postindex");
        }
    }



    // for youtube posts

    //massrequest List
    public function massrequestList()
    {
        return view("massrequestlist.requestlist");
    }
    public function massrequestListin(Request $request)
    {
        $data = new Requestlist();
        $data->short_code = $request->short_code;
        $data->RequestList = $request->r_name;
        $data->status = $request->status;
        $data->Order_List = $request->Order_List;
        $data->updated_at = null;
        $data->save();
        if ($data) {
            toastr()->success("Added Successfully");
            return redirect()->route("massrequestListindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("massrequestListindex");
        }
    }
    public function massrequestListindex()
    {
        $posts = Requestlist::orderBy("Order_List", "asc")->paginate(8);
        return view("massrequestlist.massrequestlistindex", compact("posts"));
    }
    public function massrequestedit(Request $request)
    {
        $id = $request->id;
        $posts = Requestlist::find($id);
        return view("massrequestlist.massrequestlistedit", compact("posts"));
    }
    public function massrequesteditin(Request $request)
    {
        //    dd($request);
        try {
            $sql = Requestlist::where("id", $request->id)->update([
                "short_code" => $request->short_code,
                "RequestList" => $request->r_name,
                "status" => $request->status,
                "Order_List" => $request->Order_List,
            ]);
            if ($sql) {
                toastr()->success("Udated successfully");
                return redirect()->route("massrequestListindex");
            } else {
                toastr()->warning("Something went wrong");
                return redirect()->route("massrequestListindex");
            }
        } catch (Exception $e) {
            echo "Message: " . $e->getMessage();
        }

        // if($sql){
        //     dd('updated successfully');
        // }else{
        //     dd('something went wrong');
        // }
    }

    //daywise list
    public function schedulelist()
    {
        return view("schedule.schedule");
    }
    public function schedulepost(Request $request)
    {
        $data = new ScheduleList();
        $data->ScheduleList = $request->r_name;
        $data->Status = $request->Status;
        $data->save();

        if ($data) {
            toastr()->success("Added successfully");
            return redirect()->route("scheduleindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("scheduleindex");
        }
    }
    public function scheduleindex()
    {
        $posts = ScheduleList::all();
        //  dd($posts);
        return view("schedule.scheduleindex", compact("posts"));
    }
    public function scheduledit(Request $request)
    {
        $id = $request->id;
        $posts = ScheduleList::find($id);
        return view("schedule.scheduledit", compact("posts"));
    }
    public function scheduleditpost(Request $request)
    {
        $today_date = date("Y-m-d H:i:s");
        try {
            $sql = ScheduleList::where("id", $request->id)->update([
                "ScheduleList" => $request->ScheduleList,
                "Status" => $request->Status,
                "Updated_at" => $today_date,
            ]);
            if ($sql) {
                toastr()->success("Udated successfully");
                return redirect()->route("scheduleindex");
            } else {
                toastr()->warning("Something went wrong");
                return redirect()->route("scheduleindex");
            }
        } catch (\Exception $e) {
        }
    }
    // public function updatestatusdaywise(Request $request){
    //     // dd($request);
    //     // dd($request->status);
    //         if($request->status == 'Inactive'){
    //             $upadatestatus = 'Inactive';

    //         }else{
    //             $upadatestatus = 'Active';
    //         }
    //         $sql = DB::table('daywiselists')
    //                 ->where('id',$request->id)
    //                 ->update([
    //                     'status'=>$upadatestatus
    //                 ]);
    //           if($sql){
    //             dd('updated successfully');
    //           }else{
    //             dd('something went wrong');
    //           }

    // }
    public function scheduledelete(Request $request)
    {
        $id = $request->id;
        $post = ScheduleList::find($id)->delete();
        if ($post) {
            toastr()->success("Deleted successfully");
            return redirect()->route("scheduleindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("scheduleindex");
        }
    }

    public function parishprists(){
        return view("parish.parish");
    }
    public function parishpost(Request $request){
        $url = "https://api.youtube.com";
        $uniqueFileName = "";
        if ($request->hasFile("file")) {
            $uniqueFileName =
                time() . "_" . $request->file("file")->getClientOriginalName();
            $request->file->move(public_path("parishprist"), $uniqueFileName);
        }

        //   dd($uniqueFileName);
        $data = new parishprist();
        $data->name = $request->p_name;
        $data->period = $request->period;
        $data->description = $request->description;
        $data->orderlist = $request->orderlist;
        $data->prist_type = $request->prist_type;
        $data->status = $request->status;
        $data->file = $uniqueFileName;
        // $data->url = $url;
        $data->save();

        if ($data) {
            toastr()->success("Added successfully");
            return redirect()->route("postindex");
        } else {
            toastr()->warning("Something went wrong");
            return redirect()->route("postindex");
        }

    }
    public function parishlist(){
        $parishlist = Parishprist::paginate(10);
        return view('parish.parishlist',compact('parishlist'));
    }
    public function editparish(Request $request){
        $parishid= $request->id;
        $sql = Parishprist::find($parishid);
        if($sql) {
            return view('parish.editparish',compact('sql'));
        }

    }
    public function updateparish(Request $request){
        $id = $request->id;
        $sql = Parishprist::find($id);
        $customFileName = '';
        // $requestfile =
        if ($request->hasFile("file")) {
            if ($sql->file != null || !empty($request->file('file'))) {
                $filePath = public_path("parishprist/" . $sql->file);
                unlink($filePath);
            }
            $originalFileName = $request->file("file")->getClientOriginalName();
            $customFileName = time() . "_" . $originalFileName;
            $request
                ->file("file")
                ->move(public_path("parishprist"), $customFileName);
        } else {
            $customFileName = $sql->file_path;
        }

        $sql->name = $request->p_name;
        $sql->period = $request->period;
        $sql->description = $request->description;
        $sql->orderlist = $request->orderlist;
        $sql->prist_type = $request->prist_type;
        $sql->status = $request->status;
        $sql->file = $customFileName;
        $sql->update();
        if($sql){
            toastr()->success('Updated Successfully');
            return redirect()->route('parishlist');
          }else{
            toastr()->warning('something went wrong');
            return redirect()->route('parishlist');
          }



    }


    // banners
    public function createbanners(){

        return view('banner.addbanners');
    }
      // ==============Start of banner list =================//
    public function savebanner(Request $request){
          // Validation rules
          $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file validation
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Get the original filename without the extension
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            
            // Append the current timestamp to the original filename
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
        
            // Define the path to store the file in the public directory
            $destinationPath = public_path('banner');
        
            // Move the file to the public/banner folder
            $file->move($destinationPath, $filename);
        
            // Save banner details in the database
            Banner::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
                'is_active' => 0,
                'file_path' => 'banner/' . $filename, // Store relative path to the banner
            ]);
        }
        
        

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Banner created successfully!');


    }

    // get banners
    public function getbanners(){
        $bannerlist = Banner::where('is_active',1)->paginate(8);
        return view('banner.bannerlist', compact('bannerlist'));
    }
    public function bannerview(Request $request){
        $id = $request->id;
        $banner = Banner::find($id);
        if(!($banner)){
            return redirect()->back()->with('error', 'Banner Not found!');
        }

        return view('banner.viewbanner', compact('banner'));
    }

    // update banner
    public function updateBanner(Request $request)
    {
        // Find the banner by ID
        $id = $request->id;
        $banner = Banner::findOrFail($id);
    
        // Handle file upload if a file is provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Get the original filename without the extension
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
            // Append the current timestamp to the original filename
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
    
            // Define the path to store the file in the public directory
            $destinationPath = public_path('banner');
    
            // Move the file to the public/banner folder
            $file->move($destinationPath, $filename);
    
            // Optionally: delete the old file if it exists
            if ($banner->file_path && file_exists(public_path($banner->file_path))) {
                unlink(public_path($banner->file_path)); // Delete old file
            }
    
            // Update the file path in the database
            $banner->file_path = 'banner/' . $filename;
        }
    
        // Update the other fields in the database
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->description = $request->description;
        // $banner->is_active = $request->is_active ?? $banner->is_active; // Optional, default to existing value
    
        // Save the updated banner
        $banner->save();
    
        // Return a success response (you can adjust based on your requirement)
        return redirect()->back()->with('success', 'Banner updated successfully!');
    }

       // delete banner
       public function destroybanner(Request $request,$id){
        // dd('delete_banner');
        $post = Banner::findOrFail($id);
        if(!$post){
            return redirect()->back()->with('error', 'Banner not found');
        }

        // Optionally: If the post has an associated file or image, you can delete it from storage here
        if ($post->file_path && file_exists(public_path($post->file_path))) {
            unlink(public_path($post->file_path)); // Delete the file
        }
    
        // Delete the post from the database
        $post->delete();
    
        return redirect()->back()->with('success', 'Deleted Post successfully!');
    }

    // post
    public function createpost() {
        return view('dashboard.createpost');
    }
    public function savepost(Request $request){
              // Validation rules
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:2048', // Validate file
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('posts');
            $file->move($destinationPath, $filename);
           
        } else {
            $filename = null;
        }

        // Save post details in the database
        Post::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'date' => $request->date,
            'file' =>  'posts/' . $filename, // Store file path in database
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }

      // get posts
      public function getposts(){
        $posts = Post::where('is_active', 1)->paginate(8);
        return view('posts.postindex', compact('posts'));
    }
    public function viewpost(Request $request){
        $id = $request->id;
        $posts = Post::find($id);
        if(!($posts)){
            return redirect()->back()->with('error', 'Post Not found!');
        }

        return view('posts.viewpost', compact('posts'));
    }
    
    public function updatepost(Request $request){
        $id = $request->id;
        $banner = Post::findOrFail($id);
    
        // Handle file upload if a file is provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Get the original filename without the extension
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
            // Append the current timestamp to the original filename
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
    
            // Define the path to store the file in the public directory
            $destinationPath = public_path('posts');
    
            // Move the file to the public/banner folder
            $file->move($destinationPath, $filename);
    
            // Optionally: delete the old file if it exists
            if ($banner->file && file_exists(public_path($banner->file))) {
                unlink(public_path($banner->file)); // Delete old file
            }
    
            // Update the file path in the database
            $banner->file = 'posts/' . $filename;
        }
    
        // Update the other fields in the database
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->description = $request->description;
        // $banner->is_active = $request->is_active ?? $banner->is_active; // Optional, default to existing value
    
        // Save the updated banner
        $banner->save();
    
        // Return a success response (you can adjust based on your requirement)
        return redirect()->back()->with('success', 'Post updated successfully!');

    }

      // delete banner
       public function destroypost(Request $request,$id){
        $post = Post::findOrFail($id);
        if(!$post){
            return redirect()->back()->with('error', 'Post not found');
        }

        // Optionally: If the post has an associated file or image, you can delete it from storage here
        if ($post->file_path && file_exists(public_path($post->file_path))) {
            unlink(public_path($post->file_path)); // Delete the file
        }
    
        // Delete the post from the database
        $post->delete();
    
        return redirect()->back()->with('success', 'Deleted Post successfully!');
    }

    public function createyoutube(){
        return view('youtube.createyoutube');
    }
    public function saveyoutube(Request $request){

         // Validation rules
        //  dd($request);
         $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'date' => 'required|date',
            'is_active' => 'nullable|boolean',
            'sponsor' => 'nullable|max:255',
            'intention' => 'nullable|string',
            'provider' => 'required|in:divyavani,catholichub',
            'youtube_url' => 'required|url', // Validate URL
        ]);

        // Extract the YouTube ID from the URL
        $youtubeId = $this->extractYoutubeId($request->youtube_url);

        // Save YouTube post details in the database
        YoutubePost::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'date' => $request->date,
            'is_active' => $request->is_active ?? false,
            'sponsor' => $request->sponsor,
            'intention' => $request->intention,
            'provider' => $request->provider,
            'youtube_id' => $youtubeId, // Store the YouTube ID
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'YouTube post created successfully!');
    }
      // get posts
      public function getyoutube(){
        $yotubelists = YoutubePost::paginate(8);
        // dd($yotubelists);
        return view('youtube.youtubelist', compact('yotubelists'));
    }

    public function viewyoutube(Request $request){
        $id = $request->id;
       
        $youtube = YoutubePost::find($id);
        if(!($youtube)){
            return redirect()->back()->with('error', 'Post Not found!');
        }

        return view('youtube.viewyoutube', compact('youtube'));

    }

    public function updateyoutube(Request $request){
                // Find the YouTube post by ID
                $youtubePost = YouTubePost::findOrFail($request->id);

                // Update the record with the new data
                $youtubeId = $this->extractYoutubeId($request->youtube_url);
                $youtubePost->update([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'date' => $request->date,
                    'is_active' => $request->is_active ?? false,
                    'sponsor' => $request->sponsor,
                    'intention' => $request->intention,
                    'provider' => $request->provider,
                    'youtube_id' => $youtubeId, // Store the YouTube ID
                ]);

                return redirect()->back()->with('success', 'YouTube Post updated successfully!');


    }

    public function destroyotube(Request $request,$id){
        $post = YouTubePost::findOrFail($id);
        if(!$post){
            return redirect()->back()->with('error', 'Post not found');
        }
        $post->delete();
    
        return redirect()->back()->with('success', 'Deleted Post successfully!');

    }


    // parishprists
    public function createparishprist(){
            
        return view('parishprist.createparist');
    }

    public function parishpristlist(){
        $pristlists = Parishprist::orderBy(DB::raw('YEAR(end_year)'), 'desc')->paginate(5);
        return view('parishprist.pristlist', compact('pristlists'));
    }

    public function saveparishprist(Request $request){
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'start_year' => 'nullable|date',
            'end_year' => 'nullable|date',
            // 'profile' => 'required|file',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // dd($file);
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('parishprists');
            $file->move($destinationPath, $filename);
           
        } else {
            $filename = null;
        }

        if(!empty($request->is_present)){
            $is_present = $request->is_present;
        }else{
            $is_present = 0;
        }

           // Save post details in the database
       $parishcreat =    Parishprist::create([
                'name' => $request->name,
                'start_year' => $request->start_year,
                'end_year' => $request->end_year,
                'is_present' => $is_present,
                'profile' =>  'parishprists/' . $filename, // Store file path in database
            ]);

        if($parishcreat){
            return redirect()->back()->with('success', 'Added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');

        }
    }

    public function viewprists(Request $request){
        
        $id = $request->id;
        $originalId = Crypt::decryptString($id);
        $pristdetails = Parishprist::find($originalId);
        if($pristdetails){
             return view('parishprist.updateprist',compact('pristdetails'));
        }

    }
    public function updateprist(Request $request){
        // added some changes
        $id = $request->id;
        
        $updateprist = Parishprist::findOrFail($id);
    
        // Handle file upload if a file is provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Get the original filename without the extension
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
            // Append the current timestamp to the original filename
            $filename = time() . '_' . $originalName . '.' . $file->getClientOriginalExtension();
    
            // Define the path to store the file in the public directory
            $destinationPath = public_path('parishprists');
    
            // Move the file to the public/banner folder
            $file->move($destinationPath, $filename);
    
            // Optionally: delete the old file if it exists
            if ($updateprist->profile && file_exists(public_path($updateprist->profile))) {
                unlink(public_path($updateprist->profile)); // Delete old file
            }
    
            // Update the file path in the database
            $updateprist->profile = 'parishprists/' . $filename;
        }
        if(!empty($request->is_present)){
            $is_present = $request->is_present;
        }else{
            $is_present = 0;
        }
        // Update the other fields in the database
        $updateprist->name = $request->name;
        $updateprist->start_year = $request->start_year;
        $updateprist->end_year = $request->end_year;
        $updateprist->is_present =  $is_present;
    
    
        // Save the updated updateprist
        $updateprist->save();
        if($updateprist){
            return redirect()->back()->with('success', 'updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }

      

    }
    private function extractYoutubeId($url)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }


    
}
