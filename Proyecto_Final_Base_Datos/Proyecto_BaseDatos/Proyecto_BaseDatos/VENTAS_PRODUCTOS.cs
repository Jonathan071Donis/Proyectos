using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Drawing.Printing;


namespace proyecto2
{
    public partial class VENTAS_PRODUCTOS : Form
    {
        CConexion objetConexion;
        public VENTAS_PRODUCTOS()
        {
            InitializeComponent();
            objetConexion = new CConexion();

        }

        PrintDocument printDocument1;

        void Ventas_Load(object sender, EventArgs e)
        {
            objetConexion.GET_Productos(dataGridViewProductosMuestra);
            objetConexion.Prodcutos_compra(comboBoxnameproducts);
            objetConexion.Clientes_compras(comboBoxCLiente);
        }

        void BTNAGGPRODUCT_Click(object sender, EventArgs e)
        {
            objetConexion.Sales_h(textBoxSeriesSalesH, textBoxIdCliente);
            decimal numeroSalesH = objetConexion.Numero_Factura();
            NumeroSalesH.Text = numeroSalesH.ToString();
            objetConexion.Sales_D(CantidadCompra, TextBoxIdProducto, NumeroSalesH, textBoxSeriesSalesH);


            printDocument1 = new PrintDocument();
            PrinterSettings settings = new PrinterSettings();


            printDocument1.PrinterSettings = settings;
            printDocument1.PrintPage += CREARFACTURA;

            printDocument1.Print();
        }



        void comboBoxnameproducts_SelectedIndexChanged(object sender, EventArgs e)
        {
            string selectedProduct = comboBoxnameproducts.SelectedItem.ToString();
            decimal precio = objetConexion.GetPrecio_Producto(selectedProduct);
            decimal CodigoProducto = objetConexion.GetI_dProducto(selectedProduct);
            textBoxdelPrecio.Text = precio.ToString();
            TextBoxIdProducto.Text = CodigoProducto.ToString();
        }

        private void comboBoxCLiente_SelectedIndexChanged(object sender, EventArgs e)
        {
            string selectedClient = comboBoxCLiente.SelectedItem.ToString();
            decimal id = objetConexion.Get_IdCliente(selectedClient);
            textBoxIdCliente.Text = id.ToString();
        }

        private void dataGridViewpruebaclientes_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void textBoxSeriesSalesH_TextChanged(object sender, EventArgs e)
        {

        }

        private void NumeroSalesH_TextChanged(object sender, EventArgs e)
        {

        }

        public void CREARFACTURA(object sender, PrintPageEventArgs e)
        {
            Font font = new Font("Arial", 8);
            int ancho = 500;
            int y = 20;

            int Cantidad;
            string cantidacad = CantidadCompra.Text;
            int.TryParse(cantidacad, out Cantidad);

            int Total;
            string text2 = textBoxdelPrecio.Text;
            int.TryParse(text2, out Total);
            Total = Total * Cantidad;

            e.Graphics.DrawString(" __________________________Factura_Modulo_Ventas___________________________ ", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     -Factura No.:  " + NumeroSalesH.Text + "                          -", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     |------------------------------------------------------------|", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     -Cliente:  " + comboBoxCLiente.Text + "                           -", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     |------------------------------------------------------------|", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     -Fecha:  " + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "-", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     |------------------------------------------------------------|", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     -id     - Descripcion         - precio           - cantidad           - total       -", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                     |---|-------------------------|-------------------|------------------------|----------------------|", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));

            e.Graphics.DrawString("                                       " + TextBoxIdProducto.Text + "             " + comboBoxnameproducts.Text + "                  " + textBoxdelPrecio.Text + "                           " + cantidacad.ToString() + "             " + Total.ToString() + "                     ", font, Brushes.Black, new RectangleF(0, y += 20, ancho, 20));
        }

        private void dataGridViewProductosMuestra_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
