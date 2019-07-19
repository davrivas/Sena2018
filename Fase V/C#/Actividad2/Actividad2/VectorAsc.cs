using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class VectorAsc {
        private int[] vector;

        public VectorAsc() {
            vector = new int[10];
        }

        public void Ejecutar() {
            Llenar();
            Ordenar();
            Imprimir();
        }

        private void Llenar() {
            int i = 0;
            foreach (int v in vector) {
                Console.Write("Digite el número " + (i+1) + " > ");
                vector[i] = int.Parse(Console.ReadLine());
                i++;
            }
        }

        private void Ordenar() {
            int temp = 0;
            for (int i = 0; i < 9; i++) {
                for (int j = 0; j < 9; j++) {
                    if (vector[j] > vector[j + 1]) {
                        temp = vector[j + 1];
                        vector[j + 1] = vector[j];
                        vector[j] = temp;
                    }
                }
            }
        }

        private void Imprimir() {
            Console.WriteLine("Elementos en orden ascendente");
            foreach (int v in vector) {
                Console.Write(v + " ");
            }
            Console.WriteLine("");
        }
    }
}
