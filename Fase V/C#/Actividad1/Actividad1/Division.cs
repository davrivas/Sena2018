using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Division {
        public void Ejecutar() {
            int rep = 0;
            double num1 = 0, num2 = 0, res = 0;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a la división");

                Console.WriteLine("Digite el número 1");
                num1 = Convert.ToDouble(Console.ReadLine());

                Console.WriteLine("Digite el número 2");
                num2 = Convert.ToDouble(Console.ReadLine());

                if (num2 == 0) {
                    Console.WriteLine("ERROR: No se puede dividir por 0");
                } else {
                    res = num1 / num2;
                    Console.WriteLine(num1 + " / " + num2 + " = " + res);
                }

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }
    }
}
