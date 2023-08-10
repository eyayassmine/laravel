<?php

namespace Database\Factories;

use App\Models\Credit;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credit>
 */
class CreditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Credit::class;


    public function definition() : array
    {
        // Assuming you have clients and users in your database, get existing client and user IDs
        $client = Client::inRandomOrder()->first();
        $clientId = $client ? $client->id : null;

        $user = User::inRandomOrder()->first();
        $userId = $user ? $user->id : null;

        return [
            'id_client' => $clientId,
            'id_user' => $userId,
            'typec' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
            'montant' => $this->faker->randomFloat(3, 100, 1000),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'duree' => $this->faker->numberBetween(12, 60),
            'remboursement' => $this->faker->randomElement(['Monthly', 'Weekly', 'Biweekly']),
            'ref_bancaire' => $this->faker->creditCardNumber,
            'nb_chevaux' => $this->faker->numberBetween(100, 500),
        ];
    }
}

