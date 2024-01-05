
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
    public partial class AdminStok : Form
    {
        CConexion objetConexion;
        public AdminStok()
        {
            InitializeComponent();
            objetConexion = new CConexion();

        }

        private void AdminStok_Load(object sender, EventArgs e)
        {
            objetConexion.Prodcutos_compra(comboBoxnameproductsADMIN);
        }

        private void AGREGAR_Click(object sender, EventArgs e)
        {
            objetConexion.IncrementoStock(TextBoxIdProductoADMIN,CantidadaggADMIN);
            
        }

        private void comboBoxnameproductsADMIN_SelectedIndexChanged(object sender, EventArgs e)
        {
            string selectedProduct = comboBoxnameproductsADMIN.SelectedItem.ToString();
            decimal precio = objetConexion.GetPrecio_Producto(selectedProduct);
            decimal CodigoProducto = objetConexion.GetI_dProducto(selectedProduct);
            textBoxdelPrecioADMIN.Text = precio.ToString();
            TextBoxIdProductoADMIN.Text = CodigoProducto.ToString();
        }

        private void CantidadaggADMIN_ValueChanged(object sender, EventArgs e)
        {

        }

        private void Stock_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
