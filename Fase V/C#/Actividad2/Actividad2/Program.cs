using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Program {
        static void Main(string[] args) {
            Calculadora calc = new Calculadora();
            Fibonacci fibo = new Fibonacci();
            Factorial fact = new Factorial();
            NumerosAscDesc nad = new NumerosAscDesc();
            ParImpar serie = new ParImpar();
            VectorAsc va = new VectorAsc();
            VectorAscDesc vad = new VectorAscDesc();
            Guayabita gy = new Guayabita();
            MatrizCompaneros compas = new MatrizCompaneros();
            TienditaVenezolana tv = new TienditaVenezolana();
            int opc = 0, rep = 0;

            while (true) {
                Util.Bienvenido("a la **Actividad 2**");
                Console.WriteLine("Digite");
                Console.WriteLine("   1 para la calculadora");
                Console.WriteLine("   2 para la sucesión fibonacci");
                Console.WriteLine("   3 para el factorial");
                Console.WriteLine("   4 para los numeros asc y desc");
                Console.WriteLine("   5 para la serie par o impar");
                Console.WriteLine("   6 para el vector ascendente");
                Console.WriteLine("   7 para el vector ascendente o descendente");
                Console.WriteLine("   8 para la guayabita");
                Console.WriteLine("   9 para la matriz de compañeros");
                Console.WriteLine("  10 para la tienda venezolana");
                Console.WriteLine("Otro número para salir");
                opc = int.Parse(Console.ReadLine());

                switch (opc) {
                    case 1:
                        do {
                            Util.Bienvenido("a la calculadora");
                            calc.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1) ;
                        break;
                    case 2:
                        do {
                            Util.Bienvenido("a la sucesión fibonacci");
                            fibo.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 3:
                        do {
                            Util.Bienvenido("al factorial");
                            fact.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 4:
                        do {
                            Util.Bienvenido("a los números");
                            nad.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 5:
                        do {
                            Util.Bienvenido("a la serie par o impar");
                            serie.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 6:
                        do {
                            Util.Bienvenido("al vector ascendente");
                            va.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 7:
                        do {
                            Util.Bienvenido("al vector ascendente o descendente");
                            vad.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 8:
                           do {
                               Util.Bienvenido("a la guayabita");
                               gy.Ejecutar();
                               rep = Util.Repetir();
                           } while (rep == 1);
                        break;
                    case 9:
                        do {
                            Util.Bienvenido("a la matriz de compañeros");
                            compas.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
                        break;
                    case 10:
                        do {
                            tv.Ejecutar();
                            rep = Util.Repetir();
                        } while (rep == 1);
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
