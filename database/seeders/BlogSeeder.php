<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'blog_title'    => 'Tendencias de Colores en la Decoración de Interiores para 2024',
                'blog_author'   => 'José Suarez',
                'blog_article'  => 'Cada año, las tendencias de colores en decoración de interiores cambian, y 2024 no es la excepción. Este año, se destacan tonos que evocan calma, naturaleza y sofisticación. Los colores pastel, como el azul celeste y el rosa suave, están ganando popularidad, pero también lo hacen tonos más cálidos y terrosos, como el terracota y el beige. Estos colores no solo aportan una sensación de frescura y tranquilidad, sino que también permiten jugar con los contrastes y crear espacios equilibrados.

                El verde oliva es otro color que se está destacando, tanto en paredes como en detalles decorativos, gracias a su capacidad de conectar con la naturaleza y su versatilidad en diferentes estilos. Si quieres renovar tu hogar con las últimas tendencias, puedes optar por incorporar estos colores en tus paredes, muebles o accesorios. Los tonos metálicos, como el oro y el cobre, también están presentes para darle un toque de elegancia a cualquier habitación.',
                'created_at'    => now()
            ],
            [
                'blog_title'    => 'Cómo Crear un Estilo Minimalista en tu Hogar',
                'blog_author'   => 'Helena Dominguez',
                'blog_article'  => 'El minimalismo sigue siendo una de las tendencias más populares en la decoración de interiores. Este estilo se basa en la simplicidad, la funcionalidad y la belleza de lo esencial. Para lograr un hogar minimalista, comienza por decluttering o eliminar lo que no es necesario. El exceso de muebles y adornos puede hacer que un espacio se vea recargado y desordenado. Opta por muebles de líneas sencillas y evita el uso excesivo de colores.

                La paleta de colores en un ambiente minimalista suele ser neutra: blancos, grises, beige y negros. También se da mucha importancia a la calidad de los materiales, como madera natural, mármol o metales pulidos. No olvides la iluminación, que debe ser suave y natural. Los accesorios en un hogar minimalista deben ser pocos, pero cuidadosamente seleccionados, como plantas en macetas sencillas o cuadros modernos con espacios amplios entre ellos.',
                'created_at'    => now()
            ],
            [
                'blog_title'    => 'Consejos para Decorar Espacios Pequeños sin Sacrificar Estilo',
                'blog_author'   => 'José Suarez',
                'blog_article'  => 'Vivir en un espacio pequeño no significa que tengas que sacrificar estilo ni funcionalidad. Hay varias estrategias que puedes emplear para maximizar el uso del espacio sin perder la estética. Lo primero es elegir muebles multifuncionales, como sofás cama o mesas extensibles, que te permitan aprovechar al máximo cada rincón.

                Usar espejos es otro truco eficaz para hacer que una habitación pequeña parezca más grande y luminosa. Coloca espejos grandes en paredes estratégicas para reflejar la luz natural y dar la sensación de amplitud. Además, el uso de estanterías flotantes o colgantes puede ayudarte a organizar sin ocupar espacio en el suelo. Los tonos claros para las paredes también son recomendables, ya que amplifican la luz y crean una sensación de mayor espacio.',
                'created_at'    => now()
            ],

            [
                'blog_title'    => 'El Estilo Industrial: Cómo Integrarlo en tu Casa',
                'blog_author'   => 'Evan Freüe',
                'blog_article'  => 'El estilo industrial ha ganado mucha popularidad en los últimos años, especialmente en lofts y apartamentos urbanos. Este estilo se caracteriza por el uso de materiales crudos y la exposición de elementos arquitectónicos como ladrillos, tuberías y vigas de acero. Para integrar el estilo industrial en tu hogar, empieza por incorporar muebles de metal y madera sin tratar. Las lámparas de estilo vintage o industrial, con bombillas expuestas, también son una excelente adición.

                Los colores predominantes en el estilo industrial son los tonos grises, negros, y marrones oscuros, aunque también se pueden añadir acentos en colores más vibrantes para dar vida al ambiente. El concreto pulido en los pisos o paredes y el uso de texturas rugosas son esenciales para este estilo. Además, los espacios abiertos y las grandes ventanas permiten que la luz natural fluya, resaltando la belleza de los materiales.',
                'created_at'    => now()
            ],

            [
                'blog_title'    => 'Cómo Incorporar Plantas en la Decoración de tu Hogar',
                'blog_author'   => 'Evan Freüe',
                'blog_article'  => 'Las plantas no solo son un excelente elemento decorativo, sino que también aportan bienestar al ambiente. Incorporarlas en la decoración de interiores puede transformar un espacio, dándole frescura y vitalidad. Si no tienes mucha experiencia en jardinería, empieza con plantas fáciles de cuidar, como las suculentas, los cactus o las plantas de aire.
                
                Puedes colocarlas en macetas de diferentes tamaños y materiales: desde terracota hasta cerámica o incluso macetas de vidrio. Una tendencia popular es colgar plantas en macetas flotantes o en estanterías altas para dar un toque de elegancia. Las plantas también son perfectas para decorar rincones vacíos o sobre muebles como mesas y estanterías. Además, las plantas colgantes como la hiedra o el pothos pueden ser utilizadas para darle un estilo más natural y relajado a cualquier habitación.',
                'created_at'    => now()
            ],
        ]);
    }
}
