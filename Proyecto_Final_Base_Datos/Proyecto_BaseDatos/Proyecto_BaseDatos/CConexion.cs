using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Windows.Forms;
using static System.Net.Mime.MediaTypeNames;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Collections;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;
using System.IO;
using System.Drawing.Printing;
using System.Net;



namespace proyecto2
{
    public class CConexion
    {
        SqlConnection conex = new SqlConnection();
        string cadena = "Server=localhost\\SQLEXPRESS;Database=Tarea_baseDatos;Trusted_Connection=True;";



        //metodo de hacer conexion a la bd
        public SqlConnection establecerConexion()
        {
            try
            {
                conex.ConnectionString = cadena;
                conex.Open();
            }
            catch (Exception e)
            {
                MessageBox.Show("No se conecto correctamente a la base de datos, error:" + e.ToString());
            }
            return conex;
        }

        //metodo de cerrar conexion a la bd
        public void cerrarConexion()
        {
            conex.Close();
        }

        //metodo para insertar datos en la tabla products
        public void Products(System.Windows.Forms.TextBox Descripcion, NumericUpDown id_Marca, NumericUpDown id_Categoria, NumericUpDown precio)
        {
            try
            {
                String query = "INSERT INTO products (Descripcion, id_Marca, id_Categoria, precio, Imagen) values('" + Descripcion.Text.ToString() + "'," + id_Marca.Value + "," + id_Categoria.Value + "," + precio.Value + "," + "'Imagen');";
                SqlCommand cmd = new SqlCommand(query, establecerConexion());
                SqlDataReader dr = cmd.ExecuteReader();
                MessageBox.Show("Se inserto correctamente el producto ");
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se pudo insertar el registro" + ex);
            }
        }


        //metodo para mostrar el inventario a un datagrid
        public void GET_Inventario(DataGridView DATAGRIDiNVENTORY)
        {
            try
            {
                DATAGRIDiNVENTORY.DataSource = null;
                SqlDataAdapter adapter = new SqlDataAdapter("CargarInventario", establecerConexion());
                adapter.SelectCommand.CommandType = CommandType.StoredProcedure;
                DataTable dt = new DataTable();
                adapter.Fill(dt);
                DATAGRIDiNVENTORY.DataSource = dt;
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se logro cargar los registros al inventario : " + ex);
            }
        }


        //metodo para cargar los productos a un datagrid
        public void GET_Productos(DataGridView dataGridViewProductos)
        {
            try
            {
                dataGridViewProductos.DataSource = null;
                SqlDataAdapter adapter = new SqlDataAdapter("CargarProducto", establecerConexion());
                adapter.SelectCommand.CommandType = CommandType.StoredProcedure;
                DataTable dt = new DataTable();
                adapter.Fill(dt);
                dataGridViewProductos.DataSource = dt;
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se logro cargar los registros al productos : " + ex);
            }
        }



        //metodo para cargar los cliente a un combobox
        public void Clientes_compras(System.Windows.Forms.ComboBox comboBoxCLiente)
        {
            string query = "SELECT Nombre FROM customer";
            SqlConnection connection = establecerConexion();
            SqlCommand command = new SqlCommand(query, connection);
            SqlDataReader reader = command.ExecuteReader();

            while (reader.Read())
            {
                string nombreCliente = reader["Nombre"].ToString();
                comboBoxCLiente.Items.Add(nombreCliente);
            }
            reader.Close();
            connection.Close();
        }

        //metodo para cargar el precio del producto a la vez que se selecciona en el combo box
        public decimal Get_IdCliente(string nombreCliente)
        {
            decimal idClient = 0;
            string query = "SELECT CodigoCliente FROM customer WHERE Nombre = @nombre";
            using (SqlConnection connection = establecerConexion())
            {
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@nombre", nombreCliente);
                    object result = command.ExecuteScalar();
                    if (result != null && result != DBNull.Value)
                    {
                        idClient = Convert.ToDecimal(result);
                    }
                }
            }
            return idClient;
        }


        //metodo para cargar los productos a un combobox
        public void Prodcutos_compra(System.Windows.Forms.ComboBox ComboBoxnameproducts)
        {
            string query = "SELECT Descripcion FROM products";
            SqlConnection connection = establecerConexion();
            SqlCommand command = new SqlCommand(query, connection);       
            SqlDataReader reader = command.ExecuteReader();

            while (reader.Read())
            {
                string nombreProducto = reader["Descripcion"].ToString();
                ComboBoxnameproducts.Items.Add(nombreProducto);
            }
            reader.Close();
            connection.Close();

        }


        //metodo para cargar el precio del producto a la vez que se selecciona en el combo box
        public decimal GetPrecio_Producto(string nombreProducto)
        {
            decimal precio = 0;
            string query = "SELECT Precio FROM products WHERE Descripcion = @nombre";
            using (SqlConnection connection = establecerConexion())
            {
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@nombre", nombreProducto);
                    object result = command.ExecuteScalar();
                    if (result != null && result != DBNull.Value)
                    {
                        precio = Convert.ToDecimal(result);
                    }
                }
            }
            return precio;
        }


        //metodo para cargar a un textbox el id del producto al seleccionarlo en el combobox
        public decimal GetI_dProducto(string idProducto)
        {
            decimal id = 0;
            string query = "SELECT idProducto FROM products WHERE Descripcion = @nombre";
            using (SqlConnection connection = establecerConexion())
            {
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@nombre", idProducto);
                    object result = command.ExecuteScalar();
                    if (result != null && result != DBNull.Value)
                    {
                        id = Convert.ToDecimal(result);
                    }
                }
            }
            return id;
        }


        

      

        //metodo para insertar los productos a un combobox
        public int Numero_Factura()
        {
            string query = "SELECT MAX(Numero) FROM sales_h";
            SqlConnection connection = establecerConexion();
            SqlCommand command = new SqlCommand(query, connection);
            object reader = command.ExecuteScalar();
              int lastNumero = 0;
            if (reader != null && reader != DBNull.Value)
            {
             lastNumero = Convert.ToInt32(reader);

            }           
            connection.Close();
            return lastNumero;
        }



        //metodo para cargar los datos de la tabla sales_d

        public void Sales_D(NumericUpDown CantidadCompra, System.Windows.Forms.TextBox TextBoxIdProducto, System.Windows.Forms.TextBox NumeroSalesH, System.Windows.Forms.NumericUpDown textBoxSeriesSalesH)
        {
            int idProductoN;
            string text = TextBoxIdProducto.Text;
            int.TryParse(text, out idProductoN);

            int NumeroFactura;
            string text2 = NumeroSalesH.Text;
            int.TryParse(text2, out NumeroFactura);
            try
            {
                String query = "INSERT INTO sales_d (Cantidad, Articulo, Factura, Serie) VALUES(" + CantidadCompra.Value + "," + idProductoN + "," + NumeroFactura + ", " + textBoxSeriesSalesH.Value + ");";
                SqlCommand cmd = new SqlCommand(query, establecerConexion());
                SqlDataReader dr = cmd.ExecuteReader();
                MessageBox.Show("Se inserto correctamente la venta ");
                cerrarConexion();

                
            

                string querydos = "UPDATE inventory SET stock_in = stock_in-" + CantidadCompra.Value + ", outlets = outlets+"+ CantidadCompra.Value + " WHERE id_product = " + idProductoN + ";";
                SqlCommand cmdd = new SqlCommand(querydos, establecerConexion());
                SqlDataReader drd = cmdd.ExecuteReader();
                MessageBox.Show("Se modifico el stock ");
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se pudo insertar el registro" + ex);
            }
        }



        public void IncrementoStock(System.Windows.Forms.TextBox TextBoxIdProducto, System.Windows.Forms.NumericUpDown Cantidadagg)
        {
            int idprodudctoentero = Convert.ToInt32(TextBoxIdProducto.Text);
            try
            {
                MessageBox.Show("UPDATE inventory SET stock_in = stock_in+" + Cantidadagg.Value + ", entries = entries +" + Cantidadagg.Value + " WHERE id_product = " + idprodudctoentero + ";");
                string selectQuery = "UPDATE inventory SET stock_in = stock_in+" + Cantidadagg.Value + ", entries = entries +"+ Cantidadagg.Value+" WHERE id_product = " + idprodudctoentero + ";";
                SqlCommand cmd = new SqlCommand(selectQuery, establecerConexion());
                SqlDataReader dr = cmd.ExecuteReader();
                MessageBox.Show("Se actualizo correctamente el Stock");
                cerrarConexion();          
            }
            catch
            {
                MessageBox.Show("No actualizo el Stock");
            }
        }




        //Metodo para visualizar la factura en Html


        //metodo para insetar el nombre a un combobox
        public void Clientes_ventas(System.Windows.Forms.ComboBox comboBoxCLiente)
        {
            string query = "SELECT Nombre FROM customer";
            SqlConnection connection = establecerConexion();
            SqlCommand command = new SqlCommand(query, connection);
            SqlDataReader reader = command.ExecuteReader();

            while (reader.Read())
            {
                string nombreCliente = reader["Nombre"].ToString();
                comboBoxCLiente.Items.Add(nombreCliente);
            }
            reader.Close();
            connection.Close();
        }

        // metodo para cargar los datos de la tabla customer 
        public void Clientes(System.Windows.Forms.TextBox NombreCliente, System.Windows.Forms.TextBox DireccionCliente, System.Windows.Forms.TextBox CorreoCliente, System.Windows.Forms.TextBox NitCliente)
        {
            try
            {
                String query = "INSERT INTO customer (Nombre, Direccion, Correo, Nit) VALUES ('" + NombreCliente.Text.ToString() + "','" + DireccionCliente.Text.ToString() + "','" + CorreoCliente.Text.ToString() + "','" + NitCliente.Text.ToString() + "',);";
                SqlCommand cmd = new SqlCommand(query, establecerConexion());
                SqlDataReader dr = cmd.ExecuteReader();
                MessageBox.Show("Se inserto correctamente el producto ");
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se pudo insertar el registro" + ex);
            }
        }


        //metodo para cargar los datos de la tabla sales_h

        public void Sales_h(NumericUpDown textBoxSeriesSalesH, System.Windows.Forms.TextBox textBoxIdCliente)
        {
            int numero;
            string text = textBoxIdCliente.Text;
            int.TryParse(text, out numero);
            try
            {
                String query = "INSERT INTO sales_h (Serie, Fecha, Codigo_Cliente, Nit) VALUES(" + textBoxSeriesSalesH.Value + ",'" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "'," + numero + ", 1);";
                SqlCommand cmd = new SqlCommand(query, establecerConexion());
                SqlDataReader dr = cmd.ExecuteReader();
                MessageBox.Show("Se inserto correctamente el producto ");
                cerrarConexion();
            }
            catch (Exception ex)
            {
                MessageBox.Show("No se pudo insertar el registro" + ex);
            }
        }










    }
}

