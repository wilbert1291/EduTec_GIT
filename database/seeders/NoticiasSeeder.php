<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\noticias;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noticia1 = Noticias::create([
            'vch_Titulo' => 'Bienvenida',
            'vch_Contenido' => 'Nos da mucho gusto que entren a nuestro sitio web, aquí podran encontrar muchas cosas para su comodidad. Esperamos que todo sea de su agrado.',
            'vch_Imagen' => 'imagen2.jpg',
        ]);

        $noticia2 = Noticias::create([
            'vch_Titulo' => '¿A que nos dedicamos?',
            'vch_Contenido' => 'La organización “EduTec” se dedica a brindar servicios educativos para ayudar que las instituciones de nivel Primaria impartan y obtenga una mejora con la asignatura de Ingles a través de nuestros cursos en línea con nuevos métodos de enseñanza. ',
            'vch_Imagen' => 'imagen1.jpg',
        ]);

        $noticia3 = Noticias::create([
            'vch_Titulo' => '¿Como iniciar?',
            'vch_Contenido' => 'Para comenzar tienen que tener claro que las instituciones deben de registrar previamente sus datos en el boton de arriba que dice "Registrarse" apartir de ahí solicitar un paquete para comenzar.',
            'vch_Imagen' => 'imagen3.jpg',
        ]);
    }
}
