<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function answerEmptyTest()
    {
        //Given we have at least one question in the database
        //And the question has no answers
        $question = factory('App\Question')->create();

        //When user visits the questions page
        $response = $this->get('/questions/1');

        //They should an empty state
        $response->assertSeeText('There are no responses to this question yet.');
    }
    
    /** @test */
    public function answerShowTest()
    {
        //Given we have at least one question in the database
        $question = factory('App\Question')->create();
        //And the question has at least one answer in the database
        $answer = factory('App\Answer')->create(['question_id' => $question->id]);

        //When user visits the questions page
        $response = $this->get('/questions/1');

        //They should an empty state
        $response->assertSee($answer->text);
    }
}
