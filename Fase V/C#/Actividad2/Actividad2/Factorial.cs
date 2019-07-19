using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Factorial {
        private int fact;
        private int num;

        public Factorial() {
            
        }

        public void Ejecutar() {
            PedirNum();
            ValidarFactorial();
        }

        private void PedirNum() {
            Console.WriteLine("Digite un número entre 0 y 150");
            num = int.Parse(Console.ReadLine());
        }

        private void ValidarFactorial() {
            if (num > 150) {
                Console.WriteLine("Factorial infinito");
            } else if (num < 0) {
                Console.WriteLine("No es posible hallar factorial");
            } else if (num == 0) {
                Console.WriteLine("0 != 1");
            } else {
                HallarFactorial();
            }
        }

        private void  HallarFactorial() {
            fact = 1;

            for (int i = 1; i <= num; i++) {
                fact = fact * i;
            }
            Console.WriteLine(num + "! = " + fact);
        }
    }
}
