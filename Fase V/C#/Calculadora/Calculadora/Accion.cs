using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Calculadora {
    class Accion {
        private double num1, num2;
        private bool punto, op;
        private int igual;

        public Accion() {
            this.punto = false;
            this.op = false;
        }

        public double Num1 { get => num1; set => num1 = value; }
        public double Num2 { get => num2; set => num2 = value; }
        public bool Punto { get => punto; set => punto = value; }
        public bool Op { get => op; set => op = value; }
        public int Igual { get => igual; set => igual = value; }

        public void LimpiarPunto() {
            punto = false;
        }

        public void LimpiarNums() {
            igual = 0;
            num1 = 0;
            num2 = 0;
            op = false;
            LimpiarPunto();
        }
    }
}
