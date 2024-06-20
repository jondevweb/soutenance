<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_table_has_expected_columns()
    {
        // Vérifiez que la table 'users' existe
        $this->assertTrue(Schema::hasTable('users'));

        // Vérifiez que les colonnes attendues existent dans la table 'users'
        $expectedColumns = ['id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];
        $actualColumns = Schema::getColumnListing('users');

        foreach ($expectedColumns as $column) {
            $this->assertTrue(in_array($column, $actualColumns));
        }
    }

    /** @test */
    public function entreprises_table_has_expected_columns()
    {
        // Vérifiez que la table 'entreprises' existe
        $this->assertTrue(Schema::hasTable('entreprises'));

        // Vérifiez que les colonnes attendues existent dans la table 'entreprises'
        $expectedColumns = ['id', 'raison_sociale', 'siret', 'adresse_administrative'];
        $actualColumns = Schema::getColumnListing('entreprises');

        foreach ($expectedColumns as $column) {
            $this->assertTrue(in_array($column, $actualColumns));
        }
    }

    /** @test */
    public function client_user_table_has_expected_columns()
    {
        // Vérifiez que la table 'user_entreprise' (table pivot) existe
        $this->assertTrue(Schema::hasTable('client_user'));

        // Vérifiez que les colonnes attendues existent dans la table 'user_entreprise'
        $expectedColumns = ['user_id', 'client_id'];
        $actualColumns = Schema::getColumnListing('client_user');

        foreach ($expectedColumns as $column) {
            $this->assertTrue(in_array($column, $actualColumns));
        }

        // Vérifiez que les clés étrangères sont correctement définies
        $this->assertTrue(Schema::hasColumn('client_user', 'user_id'));
        $this->assertTrue(Schema::hasColumn('client_user', 'client_id'));
    }
}