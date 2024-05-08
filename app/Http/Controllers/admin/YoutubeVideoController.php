<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\YoutubeVideo;
use Storage;

class YoutubeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Youtube Videos List';
        return view('admin.youtube-videos.list',['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Add New Youtube Videos';
        return view('admin.youtube-videos.add',['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'video_source' => 'required',
            'thumbnail' => 'required|image',
            'title' => 'required',
            'description' => 'nullable'
        ]);
    
        // Store the thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    
        // Now, you can save other data to the database, including the path to the thumbnail
        $video = new YouTubeVideo();
        $video->video_source = $request->video_source;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->thumbnail = $thumbnailPath; // Save the path to the thumbnail
        $video->status = true;
        $video->save();
    
        return redirect()->route('youtube-videos.index')->with('success', 'Video uploaded successfully!');

    }
    
    
    public function ajaxList(Request $request){
         $draw = $request->get('draw');
         $start = $request->get("start");
         $rowperpage = $request->get("length"); // Rows display per page

         $columnIndex_arr = $request->get('order');
         $columnName_arr = $request->get('columns');
         $order_arr = $request->get('order');
         $search_arr = $request->get('search');

         $columnIndex = $columnIndex_arr[0]['column']; // Column index
         $columnName = $columnName_arr[$columnIndex]['data']; // Column name
         $columnSortOrder = $order_arr[0]['dir']; // asc or desc
   
         $searchValue = $search_arr['value']; // Search value

         // Total records
        
         
		 $totalRecords = YouTubeVideo::select('count(*) as allcount','youtube_videos');
		 
         if(!empty($searchValue)){
            $totalRecords->where('youtube_videos.title', 'like', '%' .$searchValue . '%');
            $totalRecords->orWhere('youtube_videos.video_source', 'like', '%' .$searchValue . '%');
            $totalRecords->orWhere('youtube_videos.created_at', 'like', '%' .$searchValue . '%');
         }
         
         $totalRecords = $totalRecords->count();

         $totalRecordswithFilter = YouTubeVideo::select('count(*) as allcount','youtube_videos');
         if(!empty($searchValue)){
             
            $totalRecordswithFilter->where('youtube_videos.title', 'like', '%' .$searchValue . '%');
            $totalRecordswithFilter->orWhere('youtube_videos.video_source', 'like', '%' .$searchValue . '%');
            $totalRecordswithFilter->orWhere('youtube_videos.created_at', 'like', '%' .$searchValue . '%');
         }
         
         $totalRecordswithFilter = $totalRecordswithFilter->count();

         // Fetch records
		$records = YouTubeVideo::orderBy($columnName,$columnSortOrder);
		if(!empty($searchValue)){
		    $records->where('youtube_videos.title', 'like', '%' .$searchValue . '%');
            $records->orWhere('youtube_videos.video_source', 'like', '%' .$searchValue . '%');
            $records->orWhere('youtube_videos.created_at', 'like', '%' .$searchValue . '%');
		}

		$records->select('youtube_videos.*');
		$records->skip($start);
		$records->take($rowperpage);
		$records = $records->get();
        
         $data_arr = array();
         $sno = $start+1;
         $i=1;
         foreach($records as $record){
                $title = $record->title;
                $thumbnail = '<img src="/storage/'.$record->thumbnail.'" style="height:150px">';
                $video_source = '<iframe style="height:150px" class="iframe" src="'.$record->video_source.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>';
                $description = $record->description; 
                $slno = $i++;
                $action = array();
                if(1){
                  $edit="<a href='youtube-videos/edit/".base64_encode($record->id)."' class='notPrintable btn btn-xs btn-info'><i class='fas fa-pen'></i></a>";
                }else{
                    $edit = '';
                }
                
                if(1){
                  $remove = "<a href='youtube-videos/delete/".base64_encode($record->id)."' class='notPrintable btn btn-xs btn-danger' onclick='return myConfirm();'><i class='fas fa-times'></i></a>";
                }else{
                    $remove ='';
                }
               
                $btn = $record->status == 1 ? 'warning':'primary';
                $btn_text = $record->status == 1 ? 'Active' : 'Inactive';
                $status = "<a href='youtube-videos/status/".base64_encode($record->id)."/".base64_encode($record->status)."' class='btn btn-xs btn-{$btn}'>{$btn_text}</a>";
                           
                $action[] = $edit." ".$remove;
                $data_arr[] = array(
                  "id" => $sno++,
                  "title" => ucfirst($title),             
                  "thumbnail" => $thumbnail,
                  "video_source" => $video_source,
                  'status' => $status,
                  'action' => $action
                );
             }

             $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
             );

             echo json_encode($response);
             exit;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = YouTubeVideo::find(base64_decode($id));
        $title = 'Edit Youtube Videos';
        return view('admin.youtube-videos.edit',['title' => $title,'video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'video_source' => 'nullable',
            'thumbnail'    => 'nullable|image',
            'title'        => 'nullable',
            'description'  => 'nullable'
        ]);
    
        $video = YouTubeVideo::find(base64_decode($request->id));
        if(isset($request->thumbnail)){
            $oldPath = $video->thumbnail;
            
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $video->thumbnail = $thumbnailPath; // Save the path to the thumbnail
            }
        }
        $video->video_source = $request->video_source;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->status = true;
        $video->save();
    
        return redirect()->route('youtube-videos.index')->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $video = YouTubeVideo::find(base64_decode($id));
        $video->delete();
        return redirect()->route('youtube-videos.index')->with('success', 'Video deleted successfully!');
    }
}
