using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Fibonacci {
        private int cant;
        private int a;
        private int b;
        private int c;

        public Fibonacci() {
            a = -1;
            b = 1;
        }

        public void Ejecutar() {
            PedirCant();
            Sucesion();
        }

        private void PedirCant() {
            Console.WriteLine("Digite la cantidad de números de la sucesión fibonacci");
            cant = Int32.Parse(Console.ReadLine());
        }

        private void Sucesion() {
            if (cant > 0) {
                for (int i = 0; i < cant; i++) {
                    c = a + b;
                    Console.WriteLine("* " + c);
                    a = b;
                    b = c;
                }
            } else {
                Console.WriteLine("ERROR: no es posible mostrar sucesión");
            }            
        }
    }
}
