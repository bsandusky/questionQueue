<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test */
    public function answersBelongToQuestionTest() 
    {
        //Given we have an instance of Question
        $question = factory('App\Question')->create();
        
        //And multiple instances of Answer
        $answers = factory('App\Answer', 10)->create(['question_id' => $question->id]);

        // The number of answers belonging to the question should match
        $this->assertEquals(10, $question->answers->count());
    }
}
