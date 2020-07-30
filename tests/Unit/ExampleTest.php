<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * @return void
     */
    public function testBasicTest()
    {
        $X = 5;

        $this->assertTrue(true);
    }

    public function store(Request $request)
    {

        $postData = $this->validateRequest();
        $postData['slug'] = $this->createSlug($this->checkSlug($request->title));
        $postData['user_id'] = auth()->user()->id;
        $postData['published'] = Carbon::now();

        if ($request->hasFile('image')) {
            $postData['image'] = $this->uploadImage($request->file('image'));
        }
        if (Post::create($postData)) {
            Session::flash('response', array('type' => 'success', 'message' => 'Post Added successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect()->route('admin.post.index');

    }

}
