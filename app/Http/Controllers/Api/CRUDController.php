<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CRUDRepository;
use Auth;

class CRUDController extends Controller
{
    //注入dao依賴
    protected $CRUDRepo;

    public function __construct(CRUDRepository $CRUDRepo)
    {
        $this->CRUDRepo = $CRUDRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->CRUDRepo->index();
        //使用id=1 的user login
        Auth::loginUsingId(1);
        if (!auth()->check()) {
            return response()->json(['status' => 'error', 'message' => 'you are not login!',], 404);
        }
        return response()->json(['status' => 'success', 'check' => auth()->user(), 'posts' => $posts]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'content');
        $post = $this->CRUDRepo->create($data);
        return response()->json(['status' => 'success', 'post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->CRUDRepo->find($id);
        return response()->json(['status' => 'success', 'post' => $post]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('title', 'content');
        $post = $this->CRUDRepo->update($id, $data);
        if ($post) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Post Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->CRUDRepo->delete($id);
        if ($result) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Post Not Found'], 404);
    }
}
