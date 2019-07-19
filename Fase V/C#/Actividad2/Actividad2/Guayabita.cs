using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class Guayabita {
        private int cant;
        private string[] jugadores;
        private int pozo;
        private int apuesta;
        private int dado1;
        private int dado2;
        private int ganador;
        private Random rand;

        public Guayabita() {
            rand = new Random();
        }

        public void Ejecutar() {
            NumeroJugadores();
        }

        private void NumeroJugadores() {
            Console.WriteLine("Digite el número de jugadores (mínimo 2, máximo 6)");
            cant = int.Parse(Console.ReadLine());

            if (cant >= 2 && cant <= 6) {
                pozo = cant;
                jugadores = new string[cant];
                LlenarJugadores();
                Jugar();
            } else {
                Console.WriteLine("ERROR: No es posible jugar a la guayabita");
            }
        }

        private void LlenarJugadores() {
            Console.Clear();
            for (int i = 0; i < cant; i++) {
                Console.Write("Digite el nombre del jugador " + (i + 1) + " > ");
                jugadores[i] = Console.ReadLine();
            }
        }

        private void Jugar() {
            do {
                for (int i = 0; i < cant; i++) {
                    Console.Clear();
                    Console.WriteLine("Pozo: $" + pozo);
                    Console.WriteLine("Turno de " + jugadores[i]);
                    Console.WriteLine("Presione enter para lanzar el dado 1");
                    Console.ReadKey();
                    dado1 = rand.Next(1, 6);
                    DibujarDado(dado1);

                    if (dado1 == 1 || dado1 == 6) {
                        Console.WriteLine("¡Perdiste! Se suma una moneda al pozo");
                        pozo++;
                    } else {
                        Console.WriteLine("Digite un número entre 1 y " + pozo);
                        do {
                            apuesta = int.Parse(Console.ReadLine());
                            if (apuesta < 1 || apuesta > pozo) {
                                Console.WriteLine("ERROR: Digite un número entre 1 y " + pozo);
                            }
                        } while (apuesta < 1 || apuesta > pozo);

                        Console.WriteLine("Presione enter para lanzar el dado 2");
                        Console.ReadKey();
                        dado2 = rand.Next(1, 6);
                        DibujarDado(dado2);

                        if (dado2 > dado1) {
                            Console.WriteLine("¡Ganaste la apuesta!");
                            pozo -= apuesta;
                        } else {
                            Console.WriteLine("¡Perdiste! Se suma $" + apuesta + " al pozo");
                            pozo += apuesta;
                        }
                    }

                    if (pozo == 0) {
                        Console.WriteLine("Pozo: $" + pozo);
                        ganador = i;
                        break;
                    }

                    Console.ReadKey();
                }
            } while (pozo != 0);
            

            Console.WriteLine("------------------------------------");
            Console.WriteLine("El ganador es: " + jugadores[ganador]);
        }

        private void DibujarDado(int dado) {
            switch (dado) {
                case 1:
                    Console.WriteLine("[     ]\n[  o  ]\n[     ]");
                    break;
                case 2:
                    Console.WriteLine("[     ]\n[ o o ]\n[     ]");
                    break;
                case 3:
                    Console.WriteLine("[  o  ]\n[ o o ]\n[     ]");
                    break;
                case 4:
                    Console.WriteLine("[ o o ]\n[     ]\n[ o o ]");
                    break;
                case 5:
                    Console.WriteLine("[ o o ]\n[  o  ]\n[ o o ]");
                    break;
                case 6:
                    Console.WriteLine("[ o o ]\n[ o o ]\n[ o o ]");
                    break;
            }
        }
    }
}
