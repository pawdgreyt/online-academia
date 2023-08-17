<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $thumbnail_file = null;

        $course = new Courses;

        $thumbnail_file = $request->file('thumbnail');
        $request->validate([
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $thumbPath = '/course/';

        $extension = $thumbnail_file->getClientOriginalExtension();
        $imageName = 'courseThumbnail' . time() . '.' . $extension;

        $course->title = $request->input('title');
        $course->instructor = $request->input('instructor');
        $course->thumbnail = $thumbPath . $imageName;
        $course->rating = 0;
        $course->orig_price = $request->input('current_price');
        $course->current_price = $request->input('current_price');
        $course->overview = $request->input('course_overview');

        $thumbnail_file->move(public_path() . $thumbPath, $imageName);
        if ($course->save()) {
            $episodes = $request->input('episodes');
            $episodesfile = $request->file('episodes');

            if($episodes){
                foreach ($episodes as $index => $episode) {
                    // Handle thumbnail image upload
                    if (isset($episodesfile[$index]['thumbnail'])) {
                        $thumbnailFile = $episodesfile[$index]['thumbnail'];
                        
                        // Get the original extension of the uploaded thumbnail
                        $extension = $thumbnailFile->getClientOriginalExtension();
                        
                        // Generate a unique name for the thumbnail
                        $thumbnailName = 'episodeThumbnail' . $index . time() . '.' . $extension;
                        
                        // Move the thumbnail file to the appropriate directory
                        $thumbnailFile->move(public_path('/videos/thumbnails/'), $thumbnailName);
                        
                        $thumbnailNamePath = '/videos/thumbnails/' . $thumbnailName;
                    } else {
                        $thumbnailNamePath = "";
                    }

                    // Handle video upload
                    if (isset($episodesfile[$index]['video'])) {
                        $videoFile = $episodesfile[$index]['video'];
                        
                        // Get the original extension of the uploaded video
                        $extension = $videoFile->getClientOriginalExtension();
                        
                        // Generate a unique name for the video
                        $videoName = 'episodeName' . $index . time() . '.' . $extension;
                        
                        // Move the video file to the appropriate directory
                        $videoFile->move(public_path('/videos/'), $videoName);
                        
                        $videoPath = '/videos/' . $videoName;
                    } else {
                        $videoPath = "";
                    }

                    // Insert the episode data into the database
                    DB::table('course_episodes')->insert([
                        'course_id' => $course->id,
                        'episode_number' => $index + 1,
                        'episode_title' => $episode['title'],
                        'episode_description' => $episode['description'],
                        'episode_thumbnail' => $thumbnailNamePath,
                        'episode_video' => $videoPath,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            return redirect()->route('course.show', $course['id']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        return Inertia::render('Course', [
            'course' => Courses::select('courses.*')
                ->find($id),
            'episodes' => DB::table('course_episodes')->where('course_id', $id)->get()
        ]);
    }

    public function watchepisode($id){
        $episode_details = DB::table('course_episodes')->find($id);

        return Inertia::render('WatchEpisode', [
            'episode_details' => DB::table('course_episodes')->select('course_episodes.*','courses.instructor')
                ->join('courses', 'course_episodes.course_id', '=', 'courses.id')
                ->where('course_episodes.id',$id)->first(),
            'other_episodes' => DB::table('course_episodes')->where('course_id', $episode_details->course_id)->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Courses::find($id); // Getting the course details by id

        $course_id = $course->id; // $course->id is same with $id

        $course_episodes = DB::table('course_episodes')->where('course_id', $course_id)->get(); // Course Episodes
        // delete all episodes
        if ($course_episodes) {
            foreach ($course_episodes as $episode) {
                // delete the episode thumbnail
                if (file_exists(public_path() . $episode->episode_thumbnail)) {
                    unlink(public_path() . $episode->episode_thumbnail);
                }
                // delete the episode video
                if (file_exists(public_path() . $episode->episode_video)) {
                    unlink(public_path() . $episode->episode_video);
                }

                // delete the database record
                DB::table('course_episodes')->where('id', $episode->id)->delete();
            }
        }

        // course thumbnail delete
        if (file_exists(public_path() . $course->thumbnail)) {
            unlink(public_path() . $course->thumbnail);
        }

        $course->delete(); // delete the course in the actual database
        return redirect()->route('manageCourses');
    }
}
