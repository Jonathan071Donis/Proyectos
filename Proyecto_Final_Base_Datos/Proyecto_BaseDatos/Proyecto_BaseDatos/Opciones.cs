using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace proyecto2
{
    public partial class Opciones : Form
    {
        public Opciones()
        {
            InitializeComponent();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void buttonTienda_Click(object sender, EventArgs e)
        {
            Vista_Inventario form1 = new Vista_Inventario();
            form1.Show();

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void COMPRAR_Click(object sender, EventArgs e)
        {
            VENTAS_PRODUCTOS ventas = new VENTAS_PRODUCTOS();
            ventas.Show();
        }

        private void buttonCliente_Click(object sender, EventArgs e)
        {
           
        }

        private void Opciones_Load(object sender, EventArgs e)
        {

        }
    }
}
