<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    private function getData($category=null, $search=null)
    {
        $news = News::query();

        if ($category) {
            if ($category == 'school') {
                $news->where('newsable_type', 'App\Models\School')->where('status', 1)->where('newsable_id', auth()->user()->schools()->first()->id);
            } elseif($category == 'department') {
                $news->where('newsable_type', 'App\Models\Department')->where('status', 1)->where('newsable_id', auth()->user()->departments()->first()->id);
            }
        } else {
            $news->where('status', 1)
            ->orWhere('newsable_type', 'App\Models\School')
            ->where('newsable_id', auth()->user()->schools()->first()->id)
            ->orWhere('newsable_type', 'App\Models\Department')
            ->where('newsable_id', auth()->user()->departments()->first()->id);
        }
        if ($search) {
            $news->search($search);
        }

        return $news->paginate(10);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');

        $news = $this->getData($category, $search);

        if ($news->count() > 0) {
            $context = [
                'status' => true,
                'message' => 'Data berita ditemukan',
                'news' => $news,
            ];

            return response()->json($context, 200);
        } else {
            $context = [
                'status' => false,
                'message' => 'Data berita tidak ditemukan',
                'news' => [],
            ];

            return response()->json($context, 204);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
