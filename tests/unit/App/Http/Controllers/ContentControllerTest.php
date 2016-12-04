<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContentControllerTest extends \TestCase
{
    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->make();
        $this->actingAs($user);
    }

    public function testContentIndexRouteShouldBeAvailable()
    {
        $response = $this->call('GET', route('content.index'));
        $this->assertResponseOk();
    }

    public function testContentFormRouteShouldBeAvailable()
    {
        $response = $this->call('GET', route('content.form'));
        $this->assertResponseOk();
    }

    public function testContentSaveShouldInvokeEloquentSave()
    {
        $input = [
            'title' => 'Content Title',
            'text' => 'Content Text',
            'caption' => 'Content Caption'
        ];

        $this->makeContentSaveRequest($input);
    }

    public function testContentSaveShouldRedirectedToIndexOnSuccess()
    {
        $input = [
            'title' => 'Content Title',
            'text' => 'Content Text',
            'caption' => 'Content Caption'
        ];

        $this->makeContentSaveRequest($input);
        $this->assertRedirectedToRoute('content.index');
    }

    public function testContentSaveShouldCheckTitleAndTextAsRequired()
    {
        $input = [
            'title' => '',
            'text' => '',
            'caption' => 'Content Caption'
        ];

        $this->makeContentSaveRequest($input);
        $this->assertTrue(Session::has('errors'));
        $this->assertArrayHasKey('title', Session::get('errors')->messages());
        $this->assertArrayHasKey('text', Session::get('errors')->messages());
    }

    private function makeContentSaveRequest($input)
    {
        if ($input['title'] == '' || $input['text'] == '')
        {
            return $this->call('POST', route('content.save'), $input);
        }

        $mockContent = \Mockery::mock(\App\Content::class);
        $mockContent->shouldReceive('setAttribute')->with('title', $input['title'])->once();
        $mockContent->shouldReceive('setAttribute')->with('text', $input['text'])->once();
        $mockContent->shouldReceive('setAttribute')->with('caption', $input['caption'])->once();
        $mockContent->shouldReceive('save')->once();
        $this->app->instance('App\Content', $mockContent);
        $response = $this->call('POST', route('content.save'), $input);

        return $response;
    }
}
