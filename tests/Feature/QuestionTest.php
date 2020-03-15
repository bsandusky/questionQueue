<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function questionEmptyTest()
    {
        //Given we have no questions in the database
        //When user visits the questions page
        $response = $this->get('/questions');

        //They should an empty state
        $response->assertSeeText('There are no questions yet.');
    }

    /** @test */
    public function questionIndexTest()
    {
        //Given we have at least one question in the database
        $question = factory('App\Question')->create();

        //When user visits the questions index page
        $response = $this->get('/questions');

        //They should be able to read the question
        $response->assertSee($question->text);
    }

    /** @test */
    public function questionShowTest()
    {
        //Given we have at least one question in the database
        $question = factory('App\Question')->create();

        //When user visits the question show page
        $response = $this->get('/questions/1');

        //They should be able to read the question
        $response->assertSee($question->text);
    }
    
    /** @test */
    public function questionManyTest()
    {
        //Given we have more than 10 question in the database
        $question = factory('App\Question', 20)->create();

        //When user visits the questions index page
        $response = $this->get('/questions');

        //The page should be paginated
        $response->assertSeeTextInOrder(['Previous', 'Next']);
    }
}
