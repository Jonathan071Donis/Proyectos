using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Libreria_de_Clases
{
	public class Transaccion
	{
		public string Fecha_Transaccion { get; set; }
		public string Descripcion_transaccion { get; set; }
		public string Tipo_transaccion { get; set; }
		public int Total_transacciones { get; set; }

		public Transaccion()
		{

		}
	}
}
