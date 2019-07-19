using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Calculadora {
        private int opc;
        private double num1;
        private double num2;
        private double res;

        public Calculadora() {

        }

        public void Ejecutar() {
            PedirOpc();
            Calc();
        }

        private void PedirOpc() {
            Console.WriteLine("Digite");
            Console.WriteLine("1 para suma");
            Console.WriteLine("2 para resta");
            Console.WriteLine("3 multiplicación");
            Console.WriteLine("4 para división");
            Console.WriteLine("5 para potencia");
            Console.WriteLine("6 para porcentaje");
            opc = int.Parse(Console.ReadLine());
        }

        private void Calc() {
            switch (opc) {
                case 1:
                    PedirNums();
                    res = num1 + num2;
                    MostrarRes("+");
                    break;
                case 2:
                    PedirNums();
                    res = num1 - num2;
                    MostrarRes("-");
                    break;
                case 3:
                    PedirNums();
                    res = num1 * num2;
                    MostrarRes("*");
                    break;
                case 4:
                    PedirNums();
                    if (num2 == 0) {
                        Console.WriteLine("ERROR: división por 0");
                    } else {
                        res = num1 / num2;
                        MostrarRes("/");
                    }
                    break;
                case 5:
                    PedirNums();
                    res = Math.Pow(num1, num2);
                    MostrarRes("^");
                    break;
                case 6:
                    PedirNums();
                    res = (num1 * num2) / 100;
                    Console.WriteLine(num2 + "% de " + num1 + " = " + res);
                    break;
                default:
                    Console.WriteLine("ERROR: opción inválida");
                    break;
            }
        }

        private double PedirNum(string numLetra) {
            double num = 0;
            Console.WriteLine("Digite el número " + numLetra);
            num = double.Parse(Console.ReadLine());
            return num;
        }

        private void PedirNums() {
            num1 = PedirNum("1");
            num2 = PedirNum("2");
        }

        private void MostrarRes(string oper) {
            Console.WriteLine(num1 + " " + oper + " " + num2 + " = " + res);
        }
    }
}
