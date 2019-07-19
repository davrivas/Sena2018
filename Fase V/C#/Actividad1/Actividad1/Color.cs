using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Color {
        public void Ejecutar() {
            int rep = 0, color1 = 0, color2 = 0;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a los colores");

                Opciones(1);
                color1 = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine(NombreColor(color1, true));

                Opciones(2);
                color2 = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine(NombreColor(color2, true));

                ValidarColores(color1, color2);

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }

        private void Opciones(int cn) {
            Console.WriteLine("Digite para el color " + cn);
            Console.WriteLine("1 para amarillo");
            Console.WriteLine("2 para azul");
            Console.WriteLine("3 para rojo");
        }

        private void ValidarColores(int c1, int c2) {
            if ((c1 < 1 || c1 > 3) || (c2 < 1 || c2 > 3)) {
                Console.WriteLine("No se puede hacer combinación");
            } else {
                if (c1 == c2) {
                    Console.WriteLine("Los colores son iguales");
                } else {
                    string comb = "La combinación da: ";

                    Console.WriteLine("Color 1: " + NombreColor(c1, false));
                    Console.WriteLine("Color 2: " + NombreColor(c2, false));

                    if ((c1 == 1 && c2 == 2) || (c2 == 1 && c1 == 2)) {
                        comb += "Verde";
                    } else if ((c1 == 1 && c2 == 3) || (c2 == 1 && c1 == 3)) {
                        comb += "Naranja";
                    } else {
                        comb += "Morado";
                    }

                    Console.WriteLine(comb);
                }
            }
        }

        private string NombreColor(int c, bool esc) {
            string nc = (esc == true) ? "Escogió el " : "";

            switch (c) {
                case 1:
                    nc += "Amarillo";
                    break;
                case 2:
                    nc += "Azul";
                    break;
                case 3:
                    nc += "Rojo";
                    break;
                default:
                    nc = (esc == true) ? "Color no válido" : "";
                    break;
            }

            return nc;
        }
    }
}
