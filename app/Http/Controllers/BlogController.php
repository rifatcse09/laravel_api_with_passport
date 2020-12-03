<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get list of blogs
        $blogs = Blog::all();
        $message = 'Blogs retrieved successfully.';
        $status = true;

        $response = [
            'success' => true,
            'data'    => $blogs,
            'message' => $message,
        ];

        //Call function for response data
       // $response = $this->response($status, $blogs, $message);
       // return $response;
        return response()->json( $response, 200);
    }
}
