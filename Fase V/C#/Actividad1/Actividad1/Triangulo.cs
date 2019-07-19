using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Triangulo {
        public void Ejecutar() {
            int opcion = 0, rep = 0;
            double v1 = 0, v2 = 0, v3 = 0, largo = 0;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a los triangulos");

                Console.WriteLine("Digite");
                Console.WriteLine("1 para ángulos");
                Console.WriteLine("2 para lados");
                opcion = Convert.ToInt16(Console.ReadLine());

                switch (opcion) {
                    case 1:
                        Console.WriteLine("Usted escogió ángulos");
                        v1 = AnguloLado(v1, 1, "ángulo");
                        v2 = AnguloLado(v2, 2, "ángulo");
                        v3 = AnguloLado(v3, 3, "ángulo");

                        // Si la suma de todos los angulos es igual a 180
                        if (v1 + v2 + v3 == 180) {
                            // Halla el ángulo más largo
                            largo = LargoAL(largo, v1, v2, v3);

                            // Comprobamos el ángulo más largo
                            if (largo == 90) { // Si es igual a 90°
                                Console.WriteLine("Su triangulo es rectángulo");
                            } else if (largo < 90) { // Si es menor a 90°
                                Console.WriteLine("Su triangulo es acutángulo.");
                            } else { // Si es mayor a 90°
                                Console.WriteLine("Su triangulo es obtusángulo");
                            }
                        } else {
                            Console.WriteLine("ERROR: no es un triangulo");
                        }
                        break;
                    case 2:
                        Console.WriteLine("Usted escogió lados");

                        v1 = AnguloLado(v1, 1, "lado");
                        v2 = AnguloLado(v2, 2, "lado");
                        v3 = AnguloLado(v3, 3, "lado");

                        // Se comprueba el lado más largo
                        largo = LargoAL(largo, v1, v2, v3);

                        /*
                         * Si la suma de los dos lados más cortos es mayor a la
                         * longitud del lado más largo
                         */

                        if (largo < v1 + v2 || largo < v1 + v3 || largo < v2 + v3) {
                            if (v1 == v2 && v1 == v3 && v2 == v3) { // Si todos los lados son iguales
                                Console.WriteLine("Su triangulo es equilatero");
                            } else if (v1 != v2 && v1 != v3 && v2 != v3) {
                                // Si todos los lados son diferentes
                                Console.WriteLine("Su triangulo es escaleno");
                            } else {
                                // Si dos de sus lados son iguales
                                Console.WriteLine("Su triangulo es isósceles");
                            }
                        } else {
                            Console.WriteLine("ERROR: no es un triangulo");
                        }
                        break;
                    default:
                        Console.WriteLine("ERROR: opción inválida");
                        break;
                }

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }

        // Para evitar lineas de código al solicitar angulos o lados
        private double AnguloLado(double dato, int num, string tipoDato) {
            Console.WriteLine("Digite el " + tipoDato + " " + num);
            dato = Convert.ToDouble(Console.ReadLine());
            return dato;
        }

        // Para comprobar el lado o ángulo más largo
        private double LargoAL(double largo, double x, double y, double z) {
            /*
             * Se pone como ángulo o lado más largo la variable v3 para luego 
             * comprobarla con  v1 y v2
             */
            largo = z;

            // Luego se comprueba cual es el ángulo o lado mas largo
            if (largo < x) {
                z = largo;
                largo = x;
                x = z;
            }

            if (largo < y) {
                z = largo;
                largo = y;
                y = z;
            }

            return largo;
        }
    }
}
