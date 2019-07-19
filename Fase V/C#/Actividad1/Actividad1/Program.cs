using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Program {
        static void Main(string[] args) {
            Color c = new Color();
            Dado dd = new Dado();
            Division dv = new Division();
            Figura f = new Figura();
            Multiplicacion m = new Multiplicacion();
            NumeroAleatorio na = new NumeroAleatorio();
            Resta r = new Resta();
            Suma s = new Suma();
            Tienda tn = new Tienda();
            Triangulo tr = new Triangulo();
            int opc = 0;

            while (true) {
                Console.Clear();
                Console.WriteLine("Bienvenido a la **Actividad 1**");
                Console.WriteLine("Digite");
                Console.WriteLine("1 para la suma");
                Console.WriteLine("2 para la resta");
                Console.WriteLine("3 para la multiplicación");
                Console.WriteLine("4 para la división");
                Console.WriteLine("5 para los colores");
                Console.WriteLine("6 para la figura");
                Console.WriteLine("7 para la tienda");
                Console.WriteLine("8 para el número aleatorio");
                Console.WriteLine("9 para los dados");
                Console.WriteLine("10 para los triángulos");
                Console.WriteLine("Otro número para salir");
                opc = int.Parse(Console.ReadLine());

                switch (opc) {
                    case 1:
                        s.Ejecutar();
                        break;
                    case 2:
                        r.Ejecutar();
                        break;
                    case 3:
                        m.Ejecutar();
                        break;
                    case 4:
                        dv.Ejecutar();
                        break;
                    case 5:
                        c.Ejecutar();
                        break;
                    case 6:
                        f.Ejecutar();
                        break;
                    case 7:
                        tn.Ejecutar();
                        break;
                    case 8:
                        na.Ejecutar();
                        break;
                    case 9:
                        dd.Ejecutar();
                        break;
                    case 10:
                        tr.Ejecutar();
                        break;
                    default:
                        Console.WriteLine("-----------------------------");
                        Console.WriteLine("Hecho por David Rivas 1365295");
                        Console.ReadKey();
                        Environment.Exit(0);
                        break;
                }
            }
        }
    }
}
