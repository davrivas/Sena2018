using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ahorcado {
    class Ahorcado {
        private string[] jugadores, letras;
        private IList<char> yaHechas;
        private string palabra;
        private int intentos, puntos, dibujo;
        private char letra;
        private bool ganar;

        public Ahorcado() {
            jugadores = new string[2];
            yaHechas = new List<char>();
        }

        public void Ejecutar() {
            ganar = false;
            dibujo = 0;
            puntos = 0;
            IngresarJugadores();
            IngresarPalabra();
            Jugar();
        }

        private void Jugar() {
            do {
                Console.Clear();
                Console.WriteLine("Jugador 2: " + jugadores[1] + " | Intentos: " + intentos);

                MostrarDibujo();
                MostrarLetras();

                Console.WriteLine("Digite la letra a adivinar");
                letra = char.Parse(Console.ReadLine());
                intentos--;
                RevisarLetra();

                if (puntos == palabra.Length) {
                    ganar = true;
                    break;
                }

                if (intentos > 0) {
                    Console.WriteLine("Digite una tecla para continuar");
                    Console.ReadLine();
                }
            } while (intentos > 0);

            Console.WriteLine((ganar ? "Ganó" + (intentos == 0 ? ", le quedaron " + intentos + " intentos" : "") : "Perdió"));
        }

        private void RevisarLetra() {
            bool revisar = false;
            for (int i = 0; i < palabra.Length; i++) {
                if (letra == palabra[i]) {
                    revisar = true;
                    letras[i] = Convert.ToString(letra);
                    puntos++;
                }
            }
            
            dibujo = (revisar) ? dibujo : (dibujo + 1);
            Console.WriteLine((revisar ? "Está bien": "Se equivocó"));
        }

        private void MostrarDibujo() {
            if (dibujo > 0) {
                if (intentos > (Convert.ToInt32((palabra.Length + 5) / 2)) && intentos <= (palabra.Length + 5)) {
                    Console.WriteLine(" O\n\n");
                } else if (intentos > (Convert.ToInt32((palabra.Length + 5) / 3)) && intentos <= (Convert.ToInt32((palabra.Length + 5) / 2))) {
                    Console.WriteLine(" O\n |\n");
                } else if (intentos > 1 && intentos <= (Convert.ToInt32((palabra.Length + 5) / 3))) {
                    Console.WriteLine(" O\n |\n/");
                } else if (intentos == 1) {
                    Console.WriteLine(" O\n |\n/ \\");
                }
            }
        }

        private void MostrarLetras() {
            foreach (string l in letras) {
                Console.Write(l + " ");
            }
            Console.WriteLine("");
        }

        private void IngresarPalabra() {
            Console.Clear();
            Console.WriteLine("Jugador 1 (" + jugadores[0] + "), por favor ingrese la palabra a adivinar");
            palabra = Console.ReadLine();
            intentos = palabra.Length + 5;
            letras = new string[palabra.Length];
            for (int i = 0; i < letras.Length; i++) {
                letras[i] = "_";
            }
        }

        private void IngresarJugadores() {
            Console.Clear();
            for (int i = 0; i < jugadores.Length; i++) {
                Console.WriteLine("Ingrese el nombre del jugador " + (i + 1));
                jugadores[i] = Console.ReadLine();
            }
        }
    }
}
