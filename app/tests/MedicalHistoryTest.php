<?php

use App\Models\MedicalHistory;
use \PHPUnit\Framework\TestCase;

final class MedicalHistoryTest extends TestCase
{
    public function testCanCRUD(): void
    {
        //create
        $medical = MedicalHistory::create("aa", "aaa", "aaaa");

        $this->assertIsInt($medical->id);

        $medical->medications = "aaaaaaaaaa";

        // update
        $medical->save();
        // read
        $medical = $medical->byId($medical->id);

        $this->assertEquals($medical->medications, "aaaaaaaaaa");
        //delete
        $medical->delete();

        $medical = $medical->byId($medical->id);

        $this->assertNull($medical);
    }
}
