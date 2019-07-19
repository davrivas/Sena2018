using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad1 {
    class Tienda {
        public void Ejecutar() {
            string nombre = "";
            int rep = 0, cant = 0, cf = 0;
            double vu = 0, total = 0, iva = 0;
            bool cfb = true;

            do {
                Console.Clear();
                Console.WriteLine("Bienvenid@ a la tienda");

                Console.WriteLine("Digite el nombre del artículo");
                nombre = Console.ReadLine();

                Console.WriteLine("Digite el valor unitario");
                vu = Convert.ToDouble(Console.ReadLine());

                Console.WriteLine("Digite la cantidad a llevar");
                cant = Convert.ToInt32(Console.ReadLine());

                Console.WriteLine("Digite 1 si es de la canasta familiar, de lo contrario otro número");
                cf = Convert.ToInt32(Console.ReadLine());

                total = vu * cant;

                if (cf == 1) {
                    cfb = true;
                    iva = total * 0.16;
                    total += iva;
                } else {
                    cfb = false;
                }

                Console.WriteLine("---------------------");
                Console.WriteLine("Resumen de la compra");
                Console.WriteLine("Nombre del artículo: " + nombre);
                Console.WriteLine((cfb == true) ?
                    "Es de la canasta familiar"
                    : "No es de la canasta familiar");
                Console.WriteLine("Cantidad: " + cant);
                Console.WriteLine("Valor unitario: $" + vu);
                Console.Write((cfb == true) ? "IVA: $" + iva + "\n" : "");
                Console.WriteLine("Total: $" + total);
                Console.WriteLine("---------------------");

                Console.WriteLine("Digite 1 para repetir el programa");
                rep = Convert.ToInt32(Console.ReadLine());
            } while (rep == 1);
        }
    }
}
