using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class NumeroAleatorio {
        public void Ejecutar() {
            Random rnd = new Random();
            int rep = 0, num = 0, cant = 0;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ al número aleatorio");

                Console.WriteLine("Digite un número mayor a 0");
                num = Convert.ToInt32(Console.ReadLine());

                if (num > 0) {
                    Console.WriteLine("Digite la cantidad de veces que se repitan " +
                    "los número aleatorios");
                    cant = Convert.ToInt32(Console.ReadLine());

                    if (cant > 0) {
                        Console.WriteLine("Números de 0 a " + num);
                        for (int i = 0; i < cant; i++) {
                            Console.WriteLine("* " + rnd.Next(num));
                        }
                    } else {
                        Console.WriteLine("ERROR: no se puede generar números");
                    }
                } else {
                    Console.WriteLine("ERROR: número no válido");
                }

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }
    }
}
