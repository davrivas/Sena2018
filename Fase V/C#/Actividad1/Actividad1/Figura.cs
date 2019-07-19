using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Figura {
        public void Ejecutar() {
            int rep = 0, fig = 0;
            double b = 0, h = 0, r = 0, a = 0, p = 0;
            bool valido = true;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a la figura");


                Console.WriteLine("Digite");
                Console.WriteLine("1 Para círculo");
                Console.WriteLine("2 Para rectángulo");
                fig = Convert.ToInt32(Console.ReadLine());

                switch (fig) {
                    case 1:
                        Console.WriteLine("Escogió el círculo");

                        Console.WriteLine("Digite el radio del círculo (en metros)");
                        r = Convert.ToDouble(Console.ReadLine());

                        if (r <= 0) {
                            valido = false;
                        } else {
                            valido = true;
                            a = Math.PI * r;
                            p = 2 * r;
                        }
                        break;
                    case 2:
                        Console.WriteLine("Escogió el rectángulo");

                        Console.WriteLine("Digite la base del rectángulo (en metros)");
                        b = Convert.ToDouble(Console.ReadLine());

                        Console.WriteLine("Digite la altura del rectángulo (en metros)");
                        h = Convert.ToDouble(Console.ReadLine());

                        if (b <= 0 || h <= 0) {
                            valido = false;
                        } else {
                            valido = true;
                            a = b * h;
                            p = 2 * (b + h);
                        }
                        break;
                    default:
                        Console.WriteLine("ERROR: opción inválida");
                        break;
                }

                if (fig == 1 || fig == 2) {
                    if (valido) {
                        Console.WriteLine("Área: " + a + "m^2");
                        Console.WriteLine("Perímetro: " + p + "m");
                    } else {
                        Console.WriteLine("ERROR: No existen áreas o perímetros menores o iguales a cero");
                    }

                }

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }
    }
}
