using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Calculadora {
    public partial class Calculadora : Form {
        private Accion a;

        public Calculadora() {
            InitializeComponent();
            this.a = new Accion();
            SetZero();
        }

        public void SetZero() {
            textBoxAbajo.Text = "0";
        }
        
        public void LimpiarCompleto() {
            a.LimpiarPunto();
            SetZero();
        }

        private void Button1_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "1";
            } else {
                textBoxAbajo.Text += "1";
            }
        }

        private void Button2_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "2";
            } else {
                textBoxAbajo.Text += "2";
            }
        }

        private void Button3_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "3";
            } else {
                textBoxAbajo.Text += "3";
            }
        }

        private void Button4_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "4";
            } else {
                textBoxAbajo.Text += "4";
            }
        }

        private void Button5_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "5";
            } else {
                textBoxAbajo.Text += "5";
            }
        }

        private void Button6_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "6";
            } else {
                textBoxAbajo.Text += "6";
            }
        }

        private void Button7_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "7";
            } else {
                textBoxAbajo.Text += "7";
            }
        }

        private void Button8_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "8";
            } else {
                textBoxAbajo.Text += "8";
            }
        }

        private void Button9_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = "9";
            } else {
                textBoxAbajo.Text += "9";
            }
        }

        private void Button0_Click(object sender, EventArgs e) {
            if (!textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text += "0";
            }
        }

        private void ButtonPlus_Click(object sender, EventArgs e) {
            a.Igual = 1;
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                a.Num1 += a.Num2;
            }
            textBoxArriba.Text = a.Num1 + " + ";
            LimpiarCompleto();
        }

        private void ButtonMinus_Click(object sender, EventArgs e) {
            a.Igual = 2;
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                a.Num1 -= a.Num2;
            }
            textBoxArriba.Text = a.Num1 + " - ";
            LimpiarCompleto();
        }

        private void ButtonTimes_Click(object sender, EventArgs e) {
            a.Igual = 3;
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                a.Num1 *= a.Num2;
            }
            textBoxArriba.Text = a.Num1 + " * ";
            LimpiarCompleto();
        }

        private void ButtonDividedBy_Click(object sender, EventArgs e) {
            a.Igual = 4;
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                if (a.Num2 == 0) {
                    textBoxArriba.Text = "ERROR: división por 0";
                } else {
                    a.Num1 /= a.Num2;
                    textBoxArriba.Text = a.Num1 + " / ";
                }
            }
            LimpiarCompleto();
        }

        private void ButtonPercentage_Click(object sender, EventArgs e) {
            a.Igual = 5;
            a.Num2 = double.Parse(textBoxAbajo.Text);
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num1 = (a.Num1 * a.Num2) / 100;
                textBoxArriba.Text = a.Num1 + " % ";
            }
            LimpiarCompleto();
        }

        private void ButtonSqrt_Click(object sender, EventArgs e) {
            a.Igual = 6;
            if (!a.Op) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = true;
            } else {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                a.Num1 = Math.Sqrt(a.Num1 = a.Num2);
                textBoxArriba.Text = a.Num1 + "";
            }
            LimpiarCompleto();
        }

        private void Button1DivX_Click(object sender, EventArgs e) {
            a.Igual = 7;
            if (!a.Op) {
                a.Num2 = double.Parse(textBoxAbajo.Text);
                if (a.Num2 == 0) {
                    textBoxArriba.Text = "ERROR: división por 0";
                } else {
                    a.Num1 = 1 / a.Num2;
                    textBoxArriba.Text = a.Num1 + "";
                }
                a.Op = true;
            } else {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Op = false;
            }
            LimpiarCompleto();
        }

        private void ButtonEquals_Click(object sender, EventArgs e) {
            if (a.Op) {
                a.Num2 = double.Parse(textBoxAbajo.Text);

                switch (a.Igual) {
                    case 1:
                        a.Num1 += a.Num2;
                        textBoxArriba.Text = a.Num1 + " + ";
                        a.LimpiarPunto();
                        break;
                    case 2:
                        a.Num1 -= a.Num2;
                        textBoxArriba.Text = a.Num1 + " - ";
                        a.LimpiarPunto();
                        break;
                    case 3:
                        a.Num1 *= a.Num2;
                        textBoxArriba.Text = a.Num1 + " * ";
                        a.LimpiarPunto();
                        break;
                    case 4:
                        if (a.Num2 == 0) {
                            textBoxArriba.Text = "ERROR: división por 0";
                        } else {
                            a.Num1 /= a.Num2;
                            textBoxArriba.Text = a.Num1 + " / ";
                        }
                        a.LimpiarPunto();
                        break;
                    case 5:
                        a.Num1 = (a.Num1 * a.Num2) / 100;
                        textBoxArriba.Text = a.Num1 + "";
                        a.LimpiarPunto();
                        break;
                    case 6:
                        a.Num1 = Math.Sqrt(a.Num1 = a.Num2);
                        textBoxArriba.Text = a.Num1 + "";
                        a.LimpiarPunto();
                        break;
                    case 7:
                        if (a.Num2 == 0) {
                            textBoxArriba.Text = "ERROR: división por 0";
                        } else {
                            a.Num1 = 1 / a.Num2;
                            textBoxArriba.Text = a.Num1 + "";
                        }
                        a.LimpiarPunto();
                        break;
                }
            }
        }

        private void ButtonC_Click(object sender, EventArgs e) {
            textBoxArriba.Text = "";
            a.LimpiarNums();
            LimpiarCompleto();
        }

        private void ButtonCE_Click(object sender, EventArgs e) {
            LimpiarCompleto();
        }

        private void ButtonDot_Click(object sender, EventArgs e) {
            if (textBoxAbajo.Text.Equals("0") && !a.Punto) {
                textBoxAbajo.Text = "0.";
                a.Punto = true;
            } else if (!a.Punto) {
                textBoxAbajo.Text += ".";
                a.Punto = true;
            }
        }

        private void ButtonPlusMinus_Click(object sender, EventArgs e) {
            if (!a.Punto) {
                a.Num1 = double.Parse(textBoxAbajo.Text);
                a.Num1 = a.Num1 * (-1);
                textBoxAbajo.Text = a.Num1 + "";
            } else {
                a.Punto = false;
            }
        }

        private void ButtonBckSpc_Click(object sender, EventArgs e) {
            if (!textBoxAbajo.Text.Equals("0")) {
                textBoxAbajo.Text = textBoxAbajo.Text.Remove(textBoxAbajo.Text.Length - 1);
                if (textBoxAbajo.Text.Length.Equals(0)) {
                    textBoxAbajo.Text = "0";
                }
            }
        }

        private void Calculadora_FormClosing(object sender, FormClosingEventArgs e) {
            MessageBox.Show("Hecho por David Rivas 1365295");
        }
    }
}
