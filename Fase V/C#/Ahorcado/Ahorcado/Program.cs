using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ahorcado {
    class Program {
        static void Main(string[] args) {
            Ahorcado a = new Ahorcado();
            int rep = 0;
            do {
                Console.WriteLine("Bienvenido al ahorcado");
                a.Ejecutar();

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = int.Parse(Console.ReadLine());
            } while (rep == 1);

            Console.WriteLine("-----------------------------");
            Console.WriteLine("Hecho por David Rivas 1365295");
            Console.ReadKey();
        }
    }
}
