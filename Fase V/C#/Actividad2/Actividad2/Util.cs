using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Util {
        public static void Bienvenido(string app) {
            Console.Clear();
            Console.WriteLine("Bienvenido(a) " + app);
        }
        public static int Repetir() {
            int rep = 0;
            Console.WriteLine("Para repetir digite 1");
            rep = int.Parse(Console.ReadLine());
            return rep;
        }

        public static void Tecla(string cont) {
            Console.Clear();
            Console.WriteLine("Presione una tecla para " + cont);
            Console.ReadKey();
            Console.Clear();
        }
    }
}
