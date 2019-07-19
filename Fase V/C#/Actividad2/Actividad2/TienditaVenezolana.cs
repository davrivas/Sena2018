using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Actividad2 {
    class TienditaVenezolana {
        private object[,] productos;
        private object[,] factura;
        private string buscar;
        private string cant;
        private bool iva;
        private int prodPed;

        public TienditaVenezolana() {
            productos = new object[10, 4];
            prodPed = 0;
            LlenarProductos();
        }

        public void Ejecutar() {
            factura = new object[11, 7];
            PedirProductos();
            MostrarFactura();
        }

        private void PedirProductos() {
            int pedir = 0;            

            for (int i = 0; i < 10; i++) {
                Util.Bienvenido("la tienda venezolana");
                MostrarProductos();

                do {
                    Console.WriteLine("Digite el ID del producto " + (i + 1));
                    buscar = Console.ReadLine();

                    if (!BuscarProducto(i)) {
                        Console.WriteLine("No disponible");
                    }
                } while (!BuscarProducto(i));

                Console.WriteLine("Digite la cantidad a llevar");
                cant = Console.ReadLine();
                CompletarFactura(i);
                prodPed++;

                if (i != 9) {
                    Console.WriteLine("Digite 1 para pedir otro producto");
                    pedir = int.Parse(Console.ReadLine());
                }

                if (pedir != 1) {
                    break;
                }
            }
        }

        private bool BuscarProducto(int prod) {
            for (int i = 0; i < 10; i++) {
                if (buscar.Equals(productos[i, 0])) {
                    factura[prod, 1] = productos[i, 0];
                    factura[prod, 2] = productos[i, 1];
                    factura[prod, 4] = productos[i, 2];
                    iva = (productos[i, 3].Equals("si")) ? true : false;
                    return true;
                }
            }

            return false;
        }

        private void CompletarFactura(int i) {
            factura[i, 0] = (i + 1);
            factura[i, 3] = cant;
            if (iva) {
                factura[i, 5] = (Convert.ToDouble(factura[i, 4]) * Convert.ToInt32(cant)) * 0.16;
            } else {
                factura[i, 5] = 0;
            }
            factura[i, 6] = (Convert.ToDouble(factura[i, 4]) * Convert.ToInt32(cant)) + Convert.ToDouble(factura[i, 5]);
        }

        private void MostrarFactura() {
            double total = 0;

            Console.Clear();
            Console.WriteLine("Factura");
            Console.WriteLine("----------");
            Console.WriteLine("Item | ID | Producto | Cantidad | Val. unit. | IVA | Total");

            for (int i = 0; i < prodPed; i++) {
                Console.WriteLine(factura[i, 0] + " | " + factura[i, 1] + " | " + factura[i, 2]
                    + " | " + factura[i, 3] + " | " + factura[i, 4] + " | " + factura[i, 5]
                     + " | " + factura[i, 6]);
                total += Convert.ToDouble(factura[i, 6]);
                Console.WriteLine("");
            }

            Console.WriteLine("------");
            Console.WriteLine("Total a pagar:   $" + total);
        }

        private void LlenarProductos() {
            productos[0, 0] = "1001"; productos[0, 1] = "arroz"; productos[0, 2] = 1000; productos[0, 3] = "no";
            productos[1, 0] = "1002"; productos[1, 1] = "lenteja"; productos[1, 2] = 1200; productos[1, 3] = "si";
            productos[2, 0] = "1003"; productos[2, 1] = "frijol"; productos[2, 2] = 1500; productos[2, 3] = "si";
            productos[3, 0] = "1004"; productos[3, 1] = "alverja"; productos[3, 2] = 700; productos[3, 3] = "si";
            productos[4, 0] = "1005"; productos[4, 1] = "zanahoria"; productos[4, 2] = 500; productos[4, 3] = "no";
            productos[5, 0] = "1006"; productos[5, 1] = "guayaba"; productos[5, 2] = 800; productos[5, 3] = "no";
            productos[6, 0] = "1007"; productos[6, 1] = "mora"; productos[6, 2] = 1000; productos[6, 3] = "si";
            productos[7, 0] = "1008"; productos[7, 1] = "papas"; productos[7, 2] = 300; productos[7, 3] = "no";
            productos[8, 0] = "1009"; productos[8, 1] = "maizitos"; productos[8, 2] = 700; productos[8, 3] = "si";
            productos[9, 0] = "1010"; productos[9, 1] = "chicle"; productos[9, 2] = 100; productos[9, 3] = "no";
        }

        private void MostrarProductos() {
            Console.WriteLine("ID | Producto | Val. unit | IVA");
            for (int i = 0; i < 10; i++) {
                Console.WriteLine(productos[i, 0] + " | " + productos[i, 1] + 
                    " | $" + productos[i, 2] + " | " + productos[i, 3]);
            }
        }
    }
}
