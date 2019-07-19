using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Dado {
        public void Ejecutar() {
            Random rnd = new Random();
            int rep = 0, dado1 = 0, dado2 = 0, contFich = 0;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a los dados\n");
                Console.WriteLine("Lance los dados");
                Console.ReadKey();

                do {
                    dado1 = rnd.Next(1, 6);
                    dado2 = rnd.Next(1, 6);
                    DibujarDado(dado1);
                    Console.WriteLine("");
                    DibujarDado(dado2);

                    if (dado1 == dado2) {
                        Console.WriteLine("Sacó par");
                        contFich++;
                    }

                    if (contFich <= 2) {
                        Console.WriteLine("Lance de nuevo");
                        Console.ReadKey();
                    }

                    Console.WriteLine("");
                } while (contFich <= 2);

                Console.WriteLine("Saque una ficha");
                Console.ReadKey();

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }

        private void DibujarDado(int dado) {
            switch (dado) {
                case 1:
                    Console.WriteLine("[     ]\n[  o  ]\n[     ]");
                    break;
                case 2:
                    Console.WriteLine("[     ]\n[ o o ]\n[     ]");
                    break;
                case 3:
                    Console.WriteLine("[  o  ]\n[ o o ]\n[     ]");
                    break;
                case 4:
                    Console.WriteLine("[ o o ]\n[     ]\n[ o o ]");
                    break;
                case 5:
                    Console.WriteLine("[ o o ]\n[  o  ]\n[ o o ]");
                    break;
                case 6:
                    Console.WriteLine("[ o o ]\n[ o o ]\n[ o o ]");
                    break;
            }
        }
    }
}
