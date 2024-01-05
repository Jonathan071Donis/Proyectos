using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ToolTip;

namespace proyecto2
{
    public partial class Vista_Inventario : Form
    {

        CConexion objetConexion;
        public Vista_Inventario()
        {
            InitializeComponent();

            objetConexion = new CConexion();

        objetConexion.GET_Inventario(DATAGRIDiNVENTARY);
            objetConexion.GET_Productos(dataGridViewProductosMuestra);
            
        }

        public void BTNAGGPRODUCT_Click(object sender, EventArgs e)
        {
            objetConexion.Products(DESCRIPCIONPRODUCT, IDMARCAPRODUCT, IDCATEGORIAPRODUCT, PRECIO);
            objetConexion.GET_Inventario(DATAGRIDiNVENTARY);
            objetConexion.GET_Productos(dataGridViewProductosMuestra);


        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void STOCK_Click(object sender, EventArgs e)
        {
            AdminStok admin = new AdminStok();
            admin.Show();
        }

        private void dataGridViewProductos_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }
    }
}
