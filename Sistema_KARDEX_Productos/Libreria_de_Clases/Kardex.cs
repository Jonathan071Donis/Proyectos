using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Libreria_de_Clases
{
	public static class Kardex
	{

		public static Movimiento[] movimientos = new Movimiento[1];
		public static Transaccion[] transacciones = new Transaccion[1];


		public static Transaccion transaccion;
	
		static int a;
		static int i;


		public static void Ingresar_Movimietos(int num_movimiento, string fecha_documento, int num_documento)
		{
			for (int i = 0; i < movimientos.Length; i++)
			{
				Movimiento movi = new Movimiento();
				movi.Numero_Documento = num_documento;
				movi.Fecha_documento = fecha_documento;
				movi.Numero_Movimiento = num_movimiento;
				movimientos[i] = movi;
			}
		}

		public static void Ingresar_Transacciones(string fecha_transaccion, string descripcion, string tipo)
		{
			for (int i = 0; i < transacciones.Length; i++)
			{
				Transaccion transa = new Transaccion();
				transa.Fecha_Transaccion = fecha_transaccion;
				transa.Descripcion_transaccion = descripcion;
				transa.Tipo_transaccion = tipo;
				transacciones[i] = transa;
			}
		}
		
		
		
	}
}
