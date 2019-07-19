using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class ParImpar {
        private int num1;
        private int num2;
        private int opc;
        private string serie;

        public ParImpar() {

        }

        public void Ejecutar() {
            PedirNums();
            EscogerSerie();
            MostrarSerie();
        }

        private int PedirNum(string numStr) {
            int num = 0;
            Console.WriteLine("Digite el número " + numStr);
            num = int.Parse(Console.ReadLine());
            return num;
        }

        private void PedirNums() {
            num1 = PedirNum("1");
            num2 = PedirNum("2");
        }

        private void EscogerSerie() {
            Console.WriteLine("Digite");
            Console.WriteLine("0 para serie par");
            Console.WriteLine("1 para serie impar");
            opc = int.Parse(Console.ReadLine());
            serie = (opc == 0) ? "par" : "impar";
        }

        private void MostrarSerie() {
            if (num1 > num2) {
                int temp = num1;
                num1 = num2;
                num2 = temp;
            }

            switch (opc) {
                case 0:
                case 1:
                    Console.WriteLine("Serie " + serie);
                    for (int i = num1; i <= num2; i++) {
                        if (i % 2 == opc) {
                            Console.Write(i + " ");
                        }
                    }
                    Console.WriteLine("");
                    break;
                default:
                    Console.WriteLine("ERROR: opción inválida");
                    break;
            }
        }
    }
}
