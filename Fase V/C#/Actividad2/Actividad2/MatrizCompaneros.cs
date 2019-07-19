using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class MatrizCompaneros {
        string[,] companeros;

        public MatrizCompaneros() {
            companeros = new string[5, 5];
        }

        public void Ejecutar() {
            Llenar();
            Imprimir();
        }

        private void Llenar() {
            for (int i = 0; i < 5; i++) {
                Console.WriteLine(".....");
                Console.WriteLine("Compañero " + (i + 1));
                Console.WriteLine("Digite el nombre");
                companeros[i, 0] = Console.ReadLine();
                Console.WriteLine("Digite el sexo");
                companeros[i, 1] = Console.ReadLine();
                Console.WriteLine("Digite la fecha de cumpleaños");
                companeros[i, 2] = Console.ReadLine();
                Console.WriteLine("Digite el estado civil");
                companeros[i, 3] = Console.ReadLine();
                Console.WriteLine("Digite el teléfono");
                companeros[i, 4] = Console.ReadLine();
            }

            Console.WriteLine(".....");

            Util.Tecla("mostrar la matriz de compañeros");
        }

        private void Imprimir() {
            Console.WriteLine("");
            for (int i = 0; i < 5; i++) {
                Console.WriteLine("-----------------------------------------");
                Console.WriteLine("Compañero " + (i + 1));
                Console.WriteLine("Nombre: " + companeros[i, 0]);
                Console.WriteLine("Sexo: " + companeros[i, 1]);
                Console.WriteLine("Fecha de cumpleaños: " + companeros[i, 2]);
                Console.WriteLine("Estado civil: " + companeros[i, 3]);
                Console.WriteLine("Teléfono: " + companeros[i, 4]);
                Console.ReadKey();
            }
            Console.WriteLine("-----------------------------------------");
        }
    }
}
