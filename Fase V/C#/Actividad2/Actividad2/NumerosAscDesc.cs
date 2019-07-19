using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class NumerosAscDesc {
        private int[] numeros;
        private int opc;
        private int tam;
        private int temp;

        public NumerosAscDesc() {
            numeros = new int[3];
        }

        public void Ejecutar() {
            PedirNums();
            AscDesc();
        }

        private void PedirNums() {
            int i = 0;
            foreach (int num in numeros) {
                Console.WriteLine("Digite valor " + (i+1));
                numeros[i] = int.Parse(Console.ReadLine());
                i++;
            }
        }

        private void AscDesc() {
            Console.WriteLine("Digite");
            Console.WriteLine("1 para ordenar los números de manera ascendente");
            Console.WriteLine("2 para ordenar los números de manera descendente");
            opc = int.Parse(Console.ReadLine());

            switch (opc) {
                case 1:
                case 2:
                    temp = 0;
                    for (int i = 0; i < 2; i++) {
                        for (int j = 0; j < 2; j++) {
                            if (opc == 1) {
                                if (numeros[j] > numeros[j + 1]) {
                                    Ordenar(j);
                                }
                            } else {
                                if (numeros[j] < numeros[j + 1]) {
                                    Ordenar(j);
                                }
                            }                            
                        }
                    }
                    Mostrar();
                    break;
                default:
                    Console.WriteLine("ERROR: opción inválida");
                    break;
            }
        }

        private void Ordenar(int j) {
            temp = numeros[j + 1];
            numeros[j + 1] = numeros[j];
            numeros[j] = temp;
        }

        public void Mostrar() {
            string orden = (opc == 1) ? "ascendente" : "descendente";
            Console.WriteLine("Numeros ordenados de manera " + orden);
            foreach (int num in numeros) {
                Console.Write(num + " ");
            }
            Console.WriteLine("");
        }
    }
}
