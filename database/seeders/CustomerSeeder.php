<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\CreditCard;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Customer::insert([
            ['full_name' => 'Ayomi Sandarekha', 'email' => 'ayomi@gmail.com', 'phone' => '0712345678', 'address' => 'Monaragala'],
            ['full_name' => 'Test User 1', 'email' => 'test1@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 2', 'email' => 'test2@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 3', 'email' => 'test3@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 4', 'email' => 'test4@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 5', 'email' => 'test5@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 6', 'email' => 'test6@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 7', 'email' => 'test7@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 8', 'email' => 'test8@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 9', 'email' => 'test9@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 10', 'email' => 'test10@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 11', 'email' => 'test11@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 12', 'email' => 'test12@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 13', 'email' => 'test13@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],
            ['full_name' => 'Test User 14', 'email' => 'test14@gmail.com', 'phone' => '0712345678', 'address' => 'Colombo'],

        ]);
        CreditCard::insert([
            ['card_number' => encrypt('6011000991300009'), 'type' => encrypt('Discover'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Ayomi'), 'customer_id' => 1],
            ['card_number' => encrypt('5425233430109903'), 'type' => encrypt('Master'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 1'), 'customer_id' => 2],
            ['card_number' => encrypt('4263982640269299'), 'type' => encrypt('Visa'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 2'), 'customer_id' => 3],
            ['card_number' => encrypt('378282246310005'), 'type' => encrypt('Amex'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 3'), 'customer_id' => 4],
            ['card_number' => encrypt('6011000991300009'), 'type' => encrypt('Discover'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 4'), 'customer_id' => 5],
            ['card_number' => encrypt('5425233430109903'), 'type' => encrypt('Master'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 5'), 'customer_id' => 6],
            ['card_number' => encrypt('4263982640269299'), 'type' => encrypt('Visa'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 6'), 'customer_id' => 7],
            ['card_number' => encrypt('378282246310005'), 'type' => encrypt('Amex'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 7'), 'customer_id' => 8],
            ['card_number' => encrypt('6011000991300009'), 'type' => encrypt('Discover'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 8'), 'customer_id' => 9],
            ['card_number' => encrypt('5425233430109903'), 'type' => encrypt('Master'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 9'), 'customer_id' => 10],
            ['card_number' => encrypt('4263982640269299'), 'type' => encrypt('Visa'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 10'), 'customer_id' => 11],
            ['card_number' => encrypt('378282246310005'), 'type' => encrypt('Amex'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 11'), 'customer_id' => 12],
            ['card_number' => encrypt('6011000991300009'), 'type' => encrypt('Discover'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 12'), 'customer_id' => 13],
            ['card_number' => encrypt('5425233430109903'), 'type' => encrypt('Master'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 13'), 'customer_id' => 14],
            ['card_number' => encrypt('4263982640269299'), 'type' => encrypt('Visa'), 'csv' => encrypt('123'), 'expired_date' => encrypt('03/25'), 'name_on_card' => encrypt('Test 14'), 'customer_id' => 15],

        ]);

    }
}
