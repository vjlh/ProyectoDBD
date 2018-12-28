<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UsersSeeders::class);
        $this->call(PaisesSeeders::class);
        $this->call(CiudadesSeeders::class);
        $this->call(HospedajesSeeders::class);
        $this->call(HabitacionesSeeders::class);
        $this->call(RestriccionesSeeders::class);
        $this->call(PromocionesSeeders::class);
        $this->call(PaquetesSeeders::class);
        $this->call(AvionesSeeders::class);
        $this->call(BeneficiosSeeders::class);
        $this->call(SegurosSeeders::class);
        $this->call(TransportesSeeders::class);
        $this->call(AdministradoresSeeders::class);
        $this->call(HistorialesSeeders::class);
        $this->call(PasajerosSeeders::class);
        $this->call(EquipajesSeeders::class);
        $this->call(ReservasSeeders::class);
        $this->call(AsientosSeeders::class);
        $this->call(AeropuertosSeeders::class);
        $this->call(TicketsSeeders::class); 
        $this->call(VuelosSeeders::class);
        $this->call(Beneficios_SegurosSeeders::class);
        $this->call(Habitaciones_ReservasSeeders::class);
        $this->call(Pasajeros_ReservasSeeders::class);
        $this->call(Transportes_ReservasSeeders::class);
    }
}
