using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class VectorAscDesc {
        private int[] vector;
        private int tam;
        private int opc;
        private string orden;
        private int temp;

        public VectorAscDesc() {

        }

        public void Ejecutar() {
            Posiciones();
        }

        private void Posiciones() {
            int cant = 0;
            Console.WriteLine("Digite la cantidad de posiciones del vector");
            cant = int.Parse(Console.ReadLine());

            if (cant > 0) {
                vector = new int[cant];
                tam = vector.Length;
                Llenar();
                OrdenAscDesc();
            } else {
                Console.WriteLine("ERROR: no es posible crear el vector");
            }
        }

        private void Llenar() {
            int i = 0;
            foreach (int v in vector) {
                Console.Write("Digite el número " + (i + 1) + " > ");
                vector[i] = int.Parse(Console.ReadLine());
                i++;
            }
        }

        private void OrdenAscDesc() {
            Console.WriteLine("Digite");
            Console.WriteLine("1 para ordenar el vector de manera ascendente");
            Console.WriteLine("2 para ordenar el vector de manera descendente");
            opc = int.Parse(Console.ReadLine());

            switch (opc) {
                case 1:
                case 2:
                    temp = 0;
                    for (int i = 0; i < (tam - 1); i++) {
                        for (int j = 0; j < (tam - 1); j++) {
                            if (opc == 1) {
                                if (vector[j] > vector[j + 1]) {
                                    Ordenar(j);
                                }
                            } else {
                                if (vector[j] < vector[j + 1]) {
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
            temp = vector[j + 1];
            vector[j + 1] = vector[j];
            vector[j] = temp;
        }

        public void Mostrar() {
            string orden = (opc == 1) ? "ascendente" : "descendente";
            Console.WriteLine("Numeros ordenados de manera " + orden);
            foreach (int v in vector) {
                Console.Write(v + " ");
            }
            Console.WriteLine("");
        }
    }
}
