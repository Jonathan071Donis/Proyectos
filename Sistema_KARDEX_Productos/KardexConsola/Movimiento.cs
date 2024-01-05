using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace KardexConsola
{
	public class Movimiento:Producto
	{
		public Int16 Numero_Movimiento { get; set; }
		public string Fecha_documento { get; set; } 
		public Int16 Numero_Documento { get; set; }

		public Movimiento()
		{

		}



	}
}
