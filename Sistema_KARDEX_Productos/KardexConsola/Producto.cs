using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace KardexConsola
{
	public class Producto
	{
		public Int16 Codigo { get; set; }
		public string Nombre_producto { get; set; } 
		public string Descripcion { get; set; }
		public decimal Precio { get; set; }

		public Producto()
		{

		}
	}
}
