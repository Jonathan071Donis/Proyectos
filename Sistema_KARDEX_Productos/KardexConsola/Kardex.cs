using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace KardexConsola
{
	public static class Kardex
	{

		public static Movimiento[] movimientos = new Movimiento[1];
		public static Transaccion[] transacciones = new Transaccion[1];
		public static Producto[] productos = new Producto[1];

		public static Transaccion transaccion;
		public static Movimiento movimiento;
		public static Producto producto; 
		
		public static void Ingresar_Movimietos(Int16 num_movimiento, string fecha_documento, Int16 num_documento,Int16 codigo,string nombre_producto, string descripcion, decimal Precio)
		{
			for (int i = 0; i < movimientos.Length; i++)
			{
				Movimiento movi = new Movimiento();


			
				movi.Codigo = codigo;
				movi.Nombre_producto = nombre_producto;
				movi.Descripcion = descripcion;
				movi.Precio = Precio; 
				movimientos[i] = movi;
				i++;
			}
		}
		public static void Ingresar_Transacciones(string fecha_transaccion, string descripcion, string tipo, int total_transacciones)
		{
			for (int i = 0; i < transacciones.Length; i++)
			{
				Transaccion transa = new Transaccion();
				transa.Fecha_Transaccion = fecha_transaccion;
				transa.Descripcion_transaccion = descripcion;
				transa.Tipo_transaccion = tipo;
				transa.Total_transacciones = total_transacciones;
				transacciones[i] = transa;
				i++;
			}
		}







		public static void MostrarKardex()
        {
			
			for(int t =0; t<transacciones.Length; t++)
            { 
				Console.WriteLine("codigo producto "+movimientos[i].Codigo);
				Console.WriteLine("Descripcion producto "+movimientos[i].Descripcion);
				Console.WriteLine("nombre "+movimientos[i].Nombre_producto);
				Console.WriteLine("precio "+movimientos[i].Precio);
				Console.WriteLine("numDocumento "+movimientos[i].Numero_Documento);
				Console.WriteLine("numero movimiento "+movimientos[i].Numero_Movimiento);
				Console.WriteLine("fecha documento "+movimientos[i].Fecha_documento);
				Console.WriteLine("fecha transaccion "+transacciones[i].Fecha_Transaccion);
				Console.WriteLine("descripcion transaccion "+transacciones[i].Descripcion_transaccion);
				Console.WriteLine("Tipo  transaccion "+transacciones[i].Tipo_transaccion);
				Console.WriteLine("total transacciones "+transacciones[i].Total_transacciones);
				
			}
			


        }
	}
}
