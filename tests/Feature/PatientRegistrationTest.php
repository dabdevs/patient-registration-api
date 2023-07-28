<?php

namespace Tests\Feature;

use App\Events\PatientRegistered;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientRegistrationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test patient registration API endpoint.
     *
     * @return void
     */
    public function testPatientRegistration()
    {
        // Mock patient data
        $patient = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'document_photo' => base64_encode(file_get_contents(public_path('test_photo.jpg'))), // Replace 'test_photo.jpg' with the path to a sample photo for testing
        ];

        // Send a POST request to the patient registration endpoint
        $response = $this->json('POST', '/api/patients', $patient);

        // Assert that the response has a successful status code (e.g., 200)
        $response->assertStatus(200);

        // Assert that the patient was stored in the database
        $this->assertDatabaseHas('patients', [
            'name' => $patient['name'],
            'email' => $patient['email'],
            'phone_number' => $patient['phone_number'],
            'document_photo' => $patient['document_photo']
        ]);

        
        $this->expectsNotification($patient, PatientRegistered::class);
    }

    /**
     * Test getting a patient by ID.
     *
     * @return void
     */
    public function testGetPatientById()
    {
        // Create a sample patient in the database (assuming you have a Patient model)
        $patient = Patient::factory()->create();

        // Send a GET request to the get patient endpoint
        $response = $this->json('GET', '/api/patients/' . $patient->id);

        // Assert that the response has a successful status code (e.g., 200)
        $response->assertStatus(200);

        // Optionally, you can assert that the response contains the correct patient data
        $response->assertJson([
            'id' => $patient->id,
            'name' => $patient->name,
            'email' => $patient->email,
            'phone_number' => $patient->phone_number,
            'document_photo' => $patient->document_photo
        ]);
    }
}
