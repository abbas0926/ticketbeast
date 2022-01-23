<?php

namespace Tests\Feature;

use App\Models\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
       use DatabaseMigrations; 
        /** @test */
        public function user_can_view_concert_listing()
        {
            //Arrange
       $concert= Concert::create([
           'title' =>'the best show',
           'subtitle'=>'The best show you will see in your life',
           'date'=>Carbon::parse('December 1, 2013 8:00 pm'),
           'ticket_price'=>'3250',
           'venue'=>'the Halloui City',
           'city'=>'Soumaa',
           'zip' =>'09047',
        
        ]);
            //Act
        $this->visit('/concerts/'.$concert->id);
            //Assert

        $this->see('the best show');
        $this->see('The best show you will see in your life');
        $this->see('December 1, 2013 8:00 pm');
        $this->see('3250');
        $this->see('the Halloui City');
        $this->see('Soumaa');
        $this->see('09047');
        }
}
